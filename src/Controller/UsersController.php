<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function login()
    {
        if($this->request->session()->read('Auth.User.id') != null)
        {
            $this->Flash->warning('You are already logged in.');
            return $this->redirect(['action' => 'index']);
        }

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

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['logout', 'subscribeRefugee', 'subscribeDonor', /* TO REMOVE WHEN LEAVING PRODUCTION --> */ 'subscribeOrganization']);
    }

    public function isAuthorized($user)
    {
        if(isset($user))
        {
            if(in_array($this->request->action, ['editOrganization', 'editDonor', 'editRefugee', 'delete', 'view']))
            {
                if((int)$this->request->params['pass'][0] === $user['id'])
                {
                    return true;
                }

                // Here we always block the user, 'cause there is no admin, nobody could alter, delete nor view a user if it's not his own
                else
                {
                    $this->Flash->warning('You can\'t perform any operation on an user that is not yours.');
                    return false;
                }
            }

            else if(in_array($this->request->action, ['index']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $user = $this->Auth->user();

        if($user['role'] == 0)
        {
            return $this->redirect(['controller' => 'Camps', 'action' => 'view', $user['camp_id']]);
        }
        else if($user['role'] == 1)
        {
            return $this->redirect(['action' => 'view', $user['id']]);
        }
        else if($user['role'] == 2)
        {
            return $this->redirect(['controller' => 'Categories', 'action' => 'index']);
        }
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
        if($this->request->session()->read('Auth.User.id') != null)
        {
            $this->Flash->warning('You are already logged in, thus you can\'t create a new user directly. Please use the disconnection button to log out.');
            return $this->redirect($this->referer());
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            $user->role = 2;

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $user->role = 2;
        $camps = $this->Users->Camps->find('list');

        $this->set(compact('user','camps'));
        $this->set('_serialize', ['user']);
    }

    public function subscribeDonor()
    {
        if($this->request->session()->read('Auth.User.id') != null)
        {
            $this->Flash->warning('You are already logged in, thus you can\'t create a new user directly. Please use the disconnection button to log out.');
            return $this->redirect($this->referer());
        }

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
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $user->role = 1;

        $camps = $this->Users->Camps->find('list', ['limit' => 200]);
        $this->set(compact('user','camps'));

        $this->set('_serialize', ['user']);
    }

    public function subscribeOrganization()
    {
        if($this->request->session()->read('Auth.User.id') != null)
        {
            $this->Flash->warning('You are already logged in, thus you can\'t create a new user directly. Please use the disconnection button to log out.');
            return $this->redirect($this->referer());
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            $user->role = 0;

            if($user->name == null || $user->email == null || $user->phone == null)
            {
                $this->Flash->error(__('The user could not be saved. You\'ve forgotten to fill in some fields.'));
                return $this->redirect(['action' => 'subscribeOrganization']);
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $user->role = 0;

        // Let's get the camps list
        $camps = $this->Users->Camps->find('list');

        $this->set(compact('user', 'camps'));
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
                return $this->redirect(['action' => 'editOrganization', $id]);
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
        $camps = $this->Users->Camps->find('list');

        $this->set(compact('user','camps'));
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
                return $this->redirect(['action' => 'editOrganization', $id]);
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

    public function editOrganization($id = null)
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
                return $this->redirect(['action' => 'editOrganization', $id]);
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

        // Tests if the user being deleted is the last organization linked to its camp
        if((int)$this->Users->find()->where(['camp_id' => $user['camp_id'], 'role' => 0])->count() === 1)
        {
            if($this->Users->Camps->delete($this->Users->Camps->get($user['camp_id'])))
            {
                $this->Flash->success(__('Your camp has been deleted because you were the last user linked to it. Now your account is no longer supposed to exist...'));
            }

            else
            {
                $this->Flash->error(__('You\'re the last user linked to your camp, and its deletion could not be executed as it should be. So your account has not been deleted neither.'));
                return $this->redirect(['action' => 'index']);
            }
        }

        else
        {
            if($this->Users->delete($user))
            {
                $this->Flash->success(__('Your account has been deleted.'));
            }

            else
            {
                $this->Flash->error(__('Your account could not be deleted. Please, try again.'));
                return $this->redirect(['action' => 'index']);
            }
        }

        return $this->redirect(['action' => 'logout']);
    }
}
