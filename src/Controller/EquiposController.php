<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Equipos Controller
 *
 * @property \App\Model\Table\EquiposTable $Equipos
 */
class EquiposController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Equipos->find();
        $equipos = $this->paginate($query);

        $this->set(compact('equipos'));
    }

    /**
     * View method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipo = $this->Equipos->get($id, contain: ['Jugadores']);
        $this->set(compact('equipo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipo = $this->Equipos->newEmptyEntity();
        if ($this->request->is('post')) {
            $equipo = $this->Equipos->patchEntity($equipo, $this->request->getData());
            if ($this->Equipos->save($equipo)) {
                $this->Flash->success(__('Equipo guardado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el equipo. Revisa los datos e intenta de nuevo.'));
        }
        $this->set(compact('equipo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipo = $this->Equipos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipo = $this->Equipos->patchEntity($equipo, $this->request->getData());
            if ($this->Equipos->save($equipo)) {
                $this->Flash->success(__('Equipo guardado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el equipo. Revisa los datos e intenta de nuevo.'));
        }
        $this->set(compact('equipo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equipo = $this->Equipos->get($id);
        if ($this->Equipos->delete($equipo)) {
            $this->Flash->success(__('Equipo eliminado correctamente.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el equipo. Verifica que no tenga jugadores asignados.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
