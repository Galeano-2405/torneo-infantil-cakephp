<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Incidencias Controller
 *
 * @property \App\Model\Table\IncidenciasTable $Incidencias
 */
class IncidenciasController extends AppController
{
    /**
     * Lista de incidencias
     */
    public function index()
    {
        $query = $this->Incidencias->find()
            ->contain([
                'Jugadors' => [
                    'Equipos'
                ]
            ]);

        $incidencias = $this->paginate($query);

        $this->set(compact('incidencias'));
    }

    /**
     * Ver incidencia
     */
    public function view($id = null)
    {
        $incidencia = $this->Incidencias->get(
            $id,
            contain: [
                'Jugadors' => [
                    'Equipos'
                ]
            ]
        );

        $this->set(compact('incidencia'));
    }

    /**
     * Agregar incidencia
     */
    public function add()
    {
        $incidencia = $this->Incidencias->newEmptyEntity();

        if ($this->request->is('post')) {

            $incidencia = $this->Incidencias->patchEntity(
                $incidencia,
                $this->request->getData()
            );

            if ($this->Incidencias->save($incidencia)) {

                $this->Flash->success(
                    __('Incidencia registrada correctamente.')
                );

                return $this->redirect([
                    'action' => 'index'
                ]);
            }

            $this->Flash->error(
                __('No se pudo registrar la incidencia.')
            );
        }

        $jugadors = $this->Incidencias
            ->Jugadors
            ->find('list', limit: 200)
            ->all();

        $this->set(compact(
            'incidencia',
            'jugadors'
        ));
    }

    /**
     * Editar incidencia
     */
    public function edit($id = null)
    {
        $incidencia = $this->Incidencias->get(
            $id,
            contain: []
        );

        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {

            $incidencia = $this->Incidencias->patchEntity(
                $incidencia,
                $this->request->getData()
            );

            if ($this->Incidencias->save($incidencia)) {

                $this->Flash->success(
                    __('Incidencia actualizada correctamente.')
                );

                return $this->redirect([
                    'action' => 'index'
                ]);
            }

            $this->Flash->error(
                __('No se pudo actualizar la incidencia.')
            );
        }

        $jugadors = $this->Incidencias
            ->Jugadors
            ->find('list', limit: 200)
            ->all();

        $this->set(compact(
            'incidencia',
            'jugadors'
        ));
    }

    /**
     * Reporte de incidencias
     *
     * Permite filtrar por:
     * - Equipo
     * - Jugador
     */
    public function reporte()
    {
        /*
         * Obtener tablas necesarias
         */
        $equiposTable = $this->fetchTable('Equipos');
        $jugadoresTable = $this->fetchTable('Jugadores');

        /*
         * Filtros enviados por GET
         */
        $equipoId = $this->request->getQuery('equipo_id');
        $jugadorId = $this->request->getQuery('jugador_id');

        /*
         * Catálogo de equipos
         */
        $equipos = $equiposTable
            ->find('list', [
                'keyField' => 'id',
                'valueField' => 'nombre'
            ])
            ->orderBy([
                'nombre' => 'ASC'
            ])
            ->all();

        /*
         * Catálogo de jugadores
         */
        $jugadoresQuery = $jugadoresTable
            ->find('list', [
                'keyField' => 'id',
                'valueField' => 'nombres'
            ])
            ->orderBy([
                'nombres' => 'ASC'
            ]);

        /*
         * Si seleccionó equipo,
         * solo mostrar jugadores de ese equipo
         */
        if (!empty($equipoId)) {
            $jugadoresQuery->where([
                'equipo_id' => $equipoId
            ]);
        }

        $jugadores = $jugadoresQuery->all();

        /*
         * Consulta de incidencias
         */
        $query = $this->Incidencias
            ->find()
            ->contain([
                'Jugadors' => [
                    'Equipos'
                ]
            ]);

        /*
         * Filtrar por equipo
         */
        if (!empty($equipoId)) {

            $query->where([
                'Jugadors.equipo_id' => $equipoId
            ]);
        }

        /*
         * Filtrar por jugador
         */
        if (!empty($jugadorId)) {

            $query->where([
                'Incidencias.jugador_id' => $jugadorId
            ]);
        }

        /*
         * Ordenar resultados
         */
        $incidenciasReporte = $query
            ->orderBy([
                'Jugadors.apellidos' => 'ASC',
                'Jugadors.nombres' => 'ASC',
                'Incidencias.fecha_incidencia' => 'DESC'
            ])
            ->all();

        /*
         * Enviar información a la vista
         */
        $this->set(compact(
            'equipos',
            'jugadores',
            'equipoId',
            'jugadorId',
            'incidenciasReporte'
        ));
    }

    /**
     * Eliminar incidencia
     */
    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);

        $incidencia =
            $this->Incidencias->get($id);

        if ($this->Incidencias->delete($incidencia)) {

            $this->Flash->success(
                __('Incidencia eliminada correctamente.')
            );

        } else {

            $this->Flash->error(
                __('No se pudo eliminar la incidencia.')
            );
        }

        return $this->redirect([
            'action' => 'index'
        ]);
    }
}