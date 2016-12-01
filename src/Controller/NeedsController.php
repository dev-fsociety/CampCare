<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Needs Controller
 *
 * @property \App\Model\Table\NeedsTable $Needs
 */
class NeedsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Items']
        ];
        $needs = $this->paginate($this->Needs);

        $this->set(compact('needs'));
        $this->set('_serialize', ['needs']);
    }

    /**
     * View method
     *
     * @param string|null $id Need id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $need = $this->Needs->get($id, [
            'contain' => ['Users', 'Items']
        ]);

        $this->set('need', $need);
        $this->set('_serialize', ['need']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $need = $this->Needs->newEntity();
        if ($this->request->is('post')) {
            $need = $this->Needs->patchEntity($need, $this->request->data);
            if ($this->Needs->save($need)) {
                $this->Flash->success(__('The need has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The need could not be saved. Please, try again.'));
            }
        }
        $users = $this->Needs->Users->find('list', ['limit' => 200]);
        $items = $this->Needs->Items->find('list', ['limit' => 200]);
        $this->set(compact('need', 'users', 'items'));
        $this->set('_serialize', ['need']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Need id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $need = $this->Needs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $need = $this->Needs->patchEntity($need, $this->request->data);
            if ($this->Needs->save($need)) {
                $this->Flash->success(__('The need has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The need could not be saved. Please, try again.'));
            }
        }
        $users = $this->Needs->Users->find('list', ['limit' => 200]);
        $items = $this->Needs->Items->find('list', ['limit' => 200]);
        $this->set(compact('need', 'users', 'items'));
        $this->set('_serialize', ['need']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Need id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $need = $this->Needs->get($id);
        if ($this->Needs->delete($need)) {
            $this->Flash->success(__('The need has been deleted.'));
        } else {
            $this->Flash->error(__('The need could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
