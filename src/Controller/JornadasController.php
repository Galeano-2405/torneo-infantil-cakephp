<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Jornadas Controller
 *
 * @property \App\Model\Table\JornadasTable $Jornadas
 */
class JornadasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Jornadas->find();
        $jornadas = $this->paginate($query);

        $this->set(compact('jornadas'));
    }

    /**
     * View method
     *
     * @param string|null $id Jornada id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jornada = $this->Jornadas->get($id, contain: ['Goles']);
        $this->set(compact('jornada'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jornada = $this->Jornadas->newEmptyEntity();
        if ($this->request->is('post')) {
            $jornada = $this->Jornadas->patchEntity($jornada, $this->request->getData());
            if ($this->Jornadas->save($jornada)) {
                $this->Flash->success(__('The jornada has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jornada could not be saved. Please, try again.'));
        }
        $this->set(compact('jornada'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Jornada id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jornada = $this->Jornadas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jornada = $this->Jornadas->patchEntity($jornada, $this->request->getData());
            if ($this->Jornadas->save($jornada)) {
                $this->Flash->success(__('The jornada has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jornada could not be saved. Please, try again.'));
        }
        $this->set(compact('jornada'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Jornada id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jornada = $this->Jornadas->get($id);
        if ($this->Jornadas->delete($jornada)) {
            $this->Flash->success(__('The jornada has been deleted.'));
        } else {
            $this->Flash->error(__('The jornada could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
