<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Camps Controller
 *
 * @property \App\Model\Table\CampsTable $Camps
 */
class CampsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $camps = $this->paginate($this->Camps);

        $this->set(compact('camps'));
        $this->set('_serialize', ['camps']);
    }

    /**
     * View method
     *
     * @param string|null $id Camp id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $camp = $this->Camps->get($id, [
            'contain' => ['Categories']
        ]);

        $refugee_count = $this->Camps->Users->find()->where(['camp_id' => $id, 'role' => 2])->count();

        $this->set(compact('camp', 'refugee_count'));
        $this->set('_serialize', ['camp']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $camp = $this->Camps->newEntity();
        if ($this->request->is('post')) {
            $camp = $this->Camps->patchEntity($camp, $this->request->data);
            if ($this->Camps->save($camp)) {
                $this->Flash->success(__('The camp has been saved.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'subscribe_organisation']);
            } else {
                $this->Flash->error(__('The camp could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('camp'));
        $this->set('_serialize', ['camp']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Camp id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $camp = $this->Camps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $camp = $this->Camps->patchEntity($camp, $this->request->data);
            if ($this->Camps->save($camp)) {
                $this->Flash->success(__('The camp has been saved.'));

                return $this->redirect(['action' => 'view', $camp->id]);
            } else {
                $this->Flash->error(__('The camp could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('camp'));
        $this->set('_serialize', ['camp']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Camp id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $camp = $this->Camps->get($id);
        if ($this->Camps->delete($camp)) {
            $this->Flash->success(__('The camp has been deleted.'));
        } else {
            $this->Flash->error(__('The camp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        return isset($user) && $user['role'] === 0;
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['action' => 'add']);
    }
}
