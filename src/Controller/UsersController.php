<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $user = $this->Auth->user();
        if($user['role'] == 0)
            return $this->redirect(['controller' => 'Camps', 'action' => 'view', $user['camp_id']]);
        else if($user['role'] == 1)
            return $this->redirect(['controller' => 'Users', 'action' => 'view', $user['id']]);
        else if($user['role'] == 2)
            return $this->redirect(['controller' => 'Categories', 'action' => 'index']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Needs', 'Offers']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function subscribeRefugee()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            $user->role = 2;
            $user->firstname = null;
            $user->name = null;
            $user->email = null;
            $user->phone = null;

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $user->role = 2;
        $camps = $this->Users->Camps->find('list', ['limit' => 200]);

        $this->set(compact('user','camps'));
    }

    public function subscribeDonor()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            $user->role = 1;

            if($user->firstname == null || $user->name == null || $user->email == null || $user->phone == null)
            {
                $this->Flash->error(__('The user could not be saved. You\'ve forgotten to fill in some fields.'));
                return $this->redirect(['action' => 'subscribeDonor']);
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $user->role = 1;

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function subscribeOrganisation()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            $user->role = 0;

            if($user->firstname == null || $user->email == null || $user->phone == null)
            {
                $this->Flash->error(__('The user could not be saved. You\'ve forgotten to fill in some fields.'));
                return $this->redirect(['action' => 'subscribeOrganisation']);
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $user->role = 0;

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editRefugee($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if($user['role'] != 2)
        {
            if($user['role'] === 0)
            {
                return $this->redirect(['action' => 'editOrganisation', $id]);
            }

            if($user['role'] === 1)
            {
                return $this->redirect(['action' => 'editDonor', $id]);
            }
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            $user->role = 2;

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $user->role = 2;

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function editDonor($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if($user['role'] != 1)
        {
            if($user['role'] === 0)
            {
                return $this->redirect(['action' => 'editOrganisation', $id]);
            }

            if($user['role'] === 2)
            {
                return $this->redirect(['action' => 'editRefugee', $id]);
            }
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            $user->role = 1;

            if($user->firstname == null || $user->name == null || $user->email == null || $user->phone == null)
            {
                $this->Flash->error(__('The user could not be saved. You\'ve forgotten to fill in some fields.'));
                return $this->redirect(['action' => 'editDonor', $id]);
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $user->role = 1;

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function editOrganisation($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if($user['role'] != 0)
        {
            if($user['role'] === 1)
            {
                return $this->redirect(['action' => 'editDonor', $id]);
            }

            if($user['role'] === 2)
            {
                return $this->redirect(['action' => 'editRefugee', $id]);
            }
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            $user->role = 0;

            if($user->firstname == null || $user->email == null || $user->phone == null)
            {
                $this->Flash->error(__('The user could not be saved. You\'ve forgotten to fill in some fields.'));
                return $this->redirect(['action' => 'editOrganisation', $id]);
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $user->role = 0;

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if($this->request->is('post'))
        {
            $user = $this->Auth->identify();

            if($user)
            {
                $this->Auth->setUser($user);
                $this->Flash->success('Your are now logged in.');
                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function initialize()
    {
        parent::initialize();

        $this->Auth->allow(['logout', 'subscribeRefugee', 'subscribeDonor']);
    }

    public function isAuthorized($user)
    {
        if(isset($user))
        {
            if(in_array($this->request->action, ['editOrganisation', 'editDonor', 'editRefugee', 'delete', 'view']))
            {
                if((int)$this->request->params['pass'][0] === $user['id'])
                {
                    return true;
                }
            }
            else if(in_array($this->request->action, ['index']))
                return true;
        }

        return false;
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['logout', 'subscribeRefugee', 'subscribeDonor']);
    }

    public function logout()
    {
        if($this->request->session()->read('Auth.User.id') != null)
        {
            $this->Flash->success('You are now logged out.');
            return $this->redirect($this->Auth->logout());
        }

        else
        {
            $this->Flash->warning('You can\'t logout because you\'re not connected.');
            return $this->redirect('/');
        }
    }
}
