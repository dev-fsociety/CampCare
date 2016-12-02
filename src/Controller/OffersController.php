<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Offers Controller
 *
 * @property \App\Model\Table\OffersTable $Offers
 */
class OffersController extends AppController
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
        $offers = $this->paginate($this->Offers);

        $this->set(compact('offers'));
        $this->set('_serialize', ['offers']);
    }

    /**
     * View method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $offer = $this->Offers->get($id, [
            'contain' => ['Users', 'Items']
        ]);

        $this->set('offer', $offer);
        $this->set('_serialize', ['offer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($user_id)
    {
        $offer = $this->Offers->newEntity();
        if ($this->request->is('post')) {
            $offer = $this->Offers->patchEntity($offer, $this->request->data);
            if ($this->Offers->save($offer)) {
                $this->Flash->success(__('The offer has been saved.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'view', $offer->user_id]);
            } else {
                $this->Flash->error(__('The offer could not be saved. Please, try again.'));
            }
        }

        $items = $this->Offers->Items->find('list', ['limit' => 200]);
        $offer->user_id = $user_id;
        $this->set(compact('offer', 'users', 'items'));
        $this->set('_serialize', ['offer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $offer = $this->Offers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $offer = $this->Offers->patchEntity($offer, $this->request->data);
            if ($this->Offers->save($offer)) {
                $this->Flash->success(__('The offer has been saved.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'view', $offer->user_id]);
            } else {
                $this->Flash->error(__('The offer could not be saved. Please, try again.'));
            }
        }
        $users = $this->Offers->Users->find('list', ['limit' => 200]);
        $items = $this->Offers->Items->find('list', ['limit' => 200]);
        $this->set(compact('offer', 'users', 'items'));
        $this->set('_serialize', ['offer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $offer = $this->Offers->get($id);
        if ($this->Offers->delete($offer)) {
            $this->Flash->success(__('The offer has been deleted.'));
        } else {
            $this->Flash->error(__('The offer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Users', 'action' => 'view', $offer->user_id]);
    }

    public function isAuthorized($user)
    {
        if(isset($user))
        {
            if($user['role'] === 0 || $user['role'] === 1)
            {
                if(in_array($this->request->action, ['edit', 'delete']) && (int)$this->request->params['pass'][0] === $user['id'])
                {
                    return true;
                }

                if(in_array($this->request->action, ['add']))
                {
                    return true;
                }
            }
            
            if(in_array($this->request->action, ['view', 'index']))
            {
                return true;
            }
        }

        return false;
    }

    public function initialize()
    {
        parent::initialize();
    }
}
