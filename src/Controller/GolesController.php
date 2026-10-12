<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Goles Controller
 *
 * @property \App\Model\Table\GolesTable $Goles
 */
class GolesController extends AppController
{
    /**
     * Lista de registros de goles
     */
    public function index()
    {
        $query = $this->Goles->find()
            ->contain([
                'Jugadors',
                'Jornadas'
            ]);

        $goles = $this->paginate($query);

        $this->set(compact('goles'));
    }

    /**
     * Ver detalle de un registro de goles
     */
    public function view($id = null)
    {
        $gole = $this->Goles->get(
            $id,
            contain: [
                'Jugadors',
                'Jornadas'
            ]
        );

        $this->set(compact('gole'));
    }

    /**
     * Registrar goles
     */
    public function add()
    {
        $gole = $this->Goles->newEmptyEntity();

        if ($this->request->is('post')) {

            $gole = $this->Goles->patchEntity(
                $gole,
                $this->request->getData()
            );

            if ($this->Goles->save($gole)) {

                $this->Flash->success(
                    __('Registro de goles guardado correctamente.')
                );

                return $this->redirect([
                    'action' => 'index'
                ]);
            }

            $this->Flash->error(
                __('No se pudo guardar el registro de goles.')
            );
        }

        $jugadors = $this->Goles
            ->Jugadors
            ->find('list', limit: 200)
            ->all();

        $jornadas = $this->Goles
            ->Jornadas
            ->find('list', limit: 200)
            ->all();

        $this->set(compact(
            'gole',
            'jugadors',
            'jornadas'
        ));
    }

    /**
     * Editar registro de goles
     */
    public function edit($id = null)
    {
        $gole = $this->Goles->get(
            $id,
            contain: []
        );

        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {

            $gole = $this->Goles->patchEntity(
                $gole,
                $this->request->getData()
            );

            if ($this->Goles->save($gole)) {

                $this->Flash->success(
                    __('Registro de goles actualizado correctamente.')
                );

                return $this->redirect([
                    'action' => 'index'
                ]);
            }

            $this->Flash->error(
                __('No se pudo actualizar el registro de goles.')
            );
        }

        $jugadors = $this->Goles
            ->Jugadors
            ->find('list', limit: 200)
            ->all();

        $jornadas = $this->Goles
            ->Jornadas
            ->find('list', limit: 200)
            ->all();

        $this->set(compact(
            'gole',
            'jugadors',
            'jornadas'
        ));
    }

    /**
     * Reporte de goleadores
     *
     * Totaliza los goles de cada jugador
     * y los ordena de mayor a menor.
     */
    public function reporteGoleadores()
    {
        $query = $this->Goles->find();

        $goleadores = $query
            ->select([
                'jugador_id' => 'Goles.jugador_id',

                'nombres' => 'Jugadors.nombres',

                'apellidos' => 'Jugadors.apellidos',

                'fotografia' => 'Jugadors.fotografia',

                'equipo' => 'Equipos.nombre',

                'total_goles' => $query
                    ->func()
                    ->sum('Goles.cantidad')
            ])

            ->innerJoinWith('Jugadors')

            ->leftJoinWith('Jugadors.Equipos')

            ->groupBy([
                'Goles.jugador_id',
                'Jugadors.nombres',
                'Jugadors.apellidos',
                'Jugadors.fotografia',
                'Equipos.nombre'
            ])

            ->orderBy([
                'total_goles' => 'DESC',
                'Jugadors.apellidos' => 'ASC',
                'Jugadors.nombres' => 'ASC'
            ])

            ->all();

        $this->set(compact('goleadores'));
    }

    /**
     * Eliminar registro de goles
     */
    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);

        $gole = $this->Goles->get($id);

        if ($this->Goles->delete($gole)) {

            $this->Flash->success(
                __('Registro de goles eliminado correctamente.')
            );

        } else {

            $this->Flash->error(
                __('No se pudo eliminar el registro de goles.')
            );
        }

        return $this->redirect([
            'action' => 'index'
        ]);
    }
}