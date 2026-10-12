<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Jugadores Controller
 *
 * @property \App\Model\Table\JugadoresTable $Jugadores
 */
class JugadoresController extends AppController
{
    /**
     * Lista de jugadores
     */
    public function index()
    {
        $query = $this->Jugadores->find()
            ->contain(['Equipos']);

        $jugadores = $this->paginate($query);

        $this->set(compact('jugadores'));
    }

    /**
     * Ver información de un jugador
     */
    public function view($id = null)
{
    $jugadore = $this->Jugadores->get(
        $id,
        contain: [
            'Equipos',
            'Goles' => [
                'Jornadas'
            ],
            'Incidencias'
        ]
    );

    /*
     * Totalizar goles del jugador
     */
    $totalGoles = 0;

    foreach ($jugadore->goles as $gol) {
        $totalGoles += (int)$gol->cantidad;
    }

    $this->set(compact(
        'jugadore',
        'totalGoles'
    ));
}

    /**
     * Registrar jugador
     */
    public function add()
    {
        $jugadore = $this->Jugadores->newEmptyEntity();

        if ($this->request->is('post')) {

            $data = $this->request->getData();

            /*
             * Obtener fotografía enviada
             */
            $imagen = $data['fotografia'] ?? null;

            /*
             * Si se cargó correctamente una imagen
             */
            if (
                $imagen &&
                $imagen->getError() === UPLOAD_ERR_OK
            ) {

                /*
                 * Crear nombre único para la fotografía
                 */
                $nombreArchivo =
                    time() . '_' .
                    $imagen->getClientFilename();

                /*
                 * Ruta donde se guardará
                 */
                $rutaDestino =
                    WWW_ROOT .
                    'img' .
                    DS .
                    'jugadores' .
                    DS .
                    $nombreArchivo;

                /*
                 * Guardar fotografía
                 */
                $imagen->moveTo($rutaDestino);

                /*
                 * Guardar nombre en la base de datos
                 */
                $data['fotografia'] = $nombreArchivo;

            } else {

                unset($data['fotografia']);
            }

            /*
             * Pasar datos a la entidad
             */
            $jugadore = $this->Jugadores->patchEntity(
                $jugadore,
                $data
            );

            /*
             * Guardar jugador
             */
            if ($this->Jugadores->save($jugadore)) {

                $this->Flash->success(
                    __('Jugador registrado correctamente.')
                );

                return $this->redirect([
                    'action' => 'index'
                ]);
            }

            $this->Flash->error(
                __('No se pudo registrar el jugador. Intente nuevamente.')
            );
        }

        /*
         * Catálogo de equipos
         */
        $equipos = $this->Jugadores
            ->Equipos
            ->find('list', limit: 200)
            ->all();

        $this->set(compact(
            'jugadore',
            'equipos'
        ));
    }

    /**
     * Editar jugador
     */
    public function edit($id = null)
    {
        $jugadore = $this->Jugadores->get(
            $id,
            contain: []
        );

        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {

            $data = $this->request->getData();

            /*
             * Obtener nueva fotografía
             */
            $imagenNueva =
                $data['fotografia_nueva'] ?? null;

            /*
             * Si se seleccionó una nueva fotografía
             */
            if (
                $imagenNueva &&
                $imagenNueva->getError() === UPLOAD_ERR_OK
            ) {

                /*
                 * Crear nombre nuevo
                 */
                $nombreArchivo =
                    time() . '_' .
                    $imagenNueva->getClientFilename();

                /*
                 * Ruta de destino
                 */
                $rutaDestino =
                    WWW_ROOT .
                    'img' .
                    DS .
                    'jugadores' .
                    DS .
                    $nombreArchivo;

                /*
                 * Guardar nueva fotografía
                 */
                $imagenNueva->moveTo(
                    $rutaDestino
                );

                /*
                 * Eliminar fotografía anterior
                 */
                if (!empty($jugadore->fotografia)) {

                    $rutaAnterior =
                        WWW_ROOT .
                        'img' .
                        DS .
                        'jugadores' .
                        DS .
                        $jugadore->fotografia;

                    if (file_exists($rutaAnterior)) {
                        unlink($rutaAnterior);
                    }
                }

                /*
                 * Guardar nuevo nombre
                 */
                $data['fotografia'] =
                    $nombreArchivo;

            } else {

                /*
                 * Si no seleccionó nueva fotografía,
                 * conservar la anterior.
                 */
                unset($data['fotografia']);
            }

            /*
             * Este campo no existe en la BD
             */
            unset($data['fotografia_nueva']);

            /*
             * Actualizar entidad
             */
            $jugadore =
                $this->Jugadores->patchEntity(
                    $jugadore,
                    $data
                );

            /*
             * Guardar cambios
             */
            if ($this->Jugadores->save($jugadore)) {

                $this->Flash->success(
                    __('Jugador actualizado correctamente.')
                );

                return $this->redirect([
                    'action' => 'index'
                ]);
            }

            $this->Flash->error(
                __('No se pudo actualizar el jugador.')
            );
        }

        /*
         * Catálogo de equipos
         */
        $equipos = $this->Jugadores
            ->Equipos
            ->find('list', limit: 200)
            ->all();

        $this->set(compact(
            'jugadore',
            'equipos'
        ));
    }

    /**
     * Reporte de jugadores para el árbitro
     *
     * Permite seleccionar una jornada y mostrar:
     * - Equipo
     * - Fotografía
     * - Jugador
     * - Fecha de nacimiento
     * - Estado habilitado/suspendido
     */
    public function reporteArbitro()
    {
        /*
         * Obtener las tablas necesarias
         */
        $jornadasTable =
            $this->fetchTable('Jornadas');

        $incidenciasTable =
            $this->fetchTable('Incidencias');

        /*
         * Obtener catálogo de jornadas
         */
        $jornadas = $jornadasTable
            ->find('list', [
                'keyField' => 'id',
                'valueField' => 'nombre'
            ])
            ->orderBy([
                'fecha' => 'ASC'
            ])
            ->all();

        /*
         * Jornada seleccionada por el usuario
         */
        $jornadaId =
            $this->request->getQuery('jornada_id');

        /*
         * Variables iniciales
         */
        $jornadaSeleccionada = null;

        $equiposReporte = [];

        $suspendidos = [];

        /*
         * Si el usuario seleccionó una jornada
         */
        if (!empty($jornadaId)) {

            /*
             * Obtener información de la jornada
             */
            $jornadaSeleccionada =
                $jornadasTable->get($jornadaId);

            /*
             * Obtener todos los jugadores
             * con su respectivo equipo
             */
            $jugadores = $this->Jugadores
                ->find()
                ->contain([
                    'Equipos'
                ])
                ->orderBy([
                    'Equipos.nombre' => 'ASC',
                    'Jugadores.apellidos' => 'ASC',
                    'Jugadores.nombres' => 'ASC'
                ])
                ->all();

            /*
             * Buscar tarjetas rojas cuya
             * fecha de suspensión coincida
             * con la fecha de la jornada.
             */
            $incidencias = $incidenciasTable
                ->find()
                ->select([
                    'jugador_id'
                ])
                ->where([
                    'tipo_tarjeta' => 'Roja',
                    'fecha_suspension' =>
                        $jornadaSeleccionada->fecha
                ])
                ->all();

            /*
             * Crear arreglo de jugadores
             * suspendidos.
             */
            foreach ($incidencias as $incidencia) {

                $suspendidos[
                    (int)$incidencia->jugador_id
                ] = true;
            }

            /*
             * Agrupar jugadores por equipo
             */
            foreach ($jugadores as $jugador) {

                if (!empty($jugador->equipo)) {

                    $nombreEquipo =
                        $jugador->equipo->nombre;

                } else {

                    $nombreEquipo =
                        'Sin equipo';
                }

                $equiposReporte[
                    $nombreEquipo
                ][] = $jugador;
            }
        }

        /*
         * Enviar información a la vista
         */
        $this->set(compact(
            'jornadas',
            'jornadaId',
            'jornadaSeleccionada',
            'equiposReporte',
            'suspendidos'
        ));
    }

    /**
     * Eliminar jugador
     */
    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);

        $jugadore =
            $this->Jugadores->get($id);

        /*
         * Eliminar fotografía física
         */
        if (!empty($jugadore->fotografia)) {

            $rutaFoto =
                WWW_ROOT .
                'img' .
                DS .
                'jugadores' .
                DS .
                $jugadore->fotografia;

            if (file_exists($rutaFoto)) {
                unlink($rutaFoto);
            }
        }

        /*
         * Eliminar jugador
         */
        if ($this->Jugadores->delete($jugadore)) {

            $this->Flash->success(
                __('Jugador eliminado correctamente.')
            );

        } else {

            $this->Flash->error(
                __('No se pudo eliminar el jugador.')
            );
        }

        return $this->redirect([
            'action' => 'index'
        ]);
    }
}