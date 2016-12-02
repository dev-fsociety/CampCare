<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;

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
    public function add($id=null)
    {
		$needs = $this->Needs->find()->where(['item_id' => $id, 'user_id' => $this->Auth->user('id')]);
		$item = $this->Needs->Items->find()->where(['id' => $id]);
		if (empty($needs->toArray()))
		{
        	$need = $this->Needs->newEntity();
		}
		else
		{
			if ((strtotime("now")- strtotime($needs->first()->created))/(3600*24) > $item->first()->cooldown)
			{
				$need = $this->Needs->newEntity();
			}
			else
			{
				$this->Flash->error('You are not authorized to add a need because you already did recently');
			 	$this->redirect(['controller' => 'Categories' ,'action'=> 'index']);
			}
		}
		if (isset($need))
		{
			ConnectionManager::get('default')->execute('UPDATE items SET hot=hot +1 WHERE id = :id',['id'=> $id]);
			$data = ['user_id' => $this->Auth->user('id'), 'item_id' => $id, Time::now()];
			$need = $this->Needs->patchEntity($need, $data);
			if ($this->Needs->save($need))
			{
				$this->Flash->success(__('The need has been saved.'));

				return $this->redirect(['controller' => 'Categories', 'action' => 'index']);
			}
			else
			{
				$this->Flash->error(__('The need could not be saved. Please, try again.'));
			}
			$users = $this->Needs->Users->find('list', ['limit' => 200]);
			$items = $this->Needs->Items->find('list', ['limit' => 200]);
			$this->set(compact('need', 'users', 'items'));
			$this->set('_serialize', ['need']);
		}
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
