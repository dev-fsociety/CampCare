<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{
    public function isAuthorized($user)
    {
        if(isset($user) && $user['role'] === 0)
        {
            return true;
        }

        return parent::isAuthorized($user);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['view', 'index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Camps']
        ];
        $categories = $this->paginate($this->Categories->find()->where(['category_id =' => 0]));

        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['Camps', 'Items', 'Posts']
        ]);

        $category->categories = $this->Categories->find()->where(['category_id' => $id]);
      //  $category->items = $this->Categories->Items->find()->where(['category_id' => $id]);

        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['controller' => 'Camps', 'action' => 'view', $category->camp_id]);

            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }

        $camp = $this->Auth->user('camp_id');

        $sub_q = $this->Categories->Items->find()
                  ->select(['id'])
                  ->where(function ($exp, $q) {
                    return $exp->equalFields('Categories.id', 'Items.category_id');
                  });

        $categories = $this->Categories->find('list')->where(
          function ($exp, $q) use ($sub_q) {
            return $exp->notExists($sub_q);
            }
        );


        $this->set(compact('category', 'camp', 'categories'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['controller' => 'Camps', 'action' => 'view', $category->camp_id]);

            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $camps = $this->Categories->Camps->find('list', ['limit' => 200]);

        $sub_q = $this->Categories->Items->find()
                  ->select(['id'])
                  ->where(function ($exp, $q) {
                    return $exp->equalFields('Categories.id', 'Items.category_id');
                  });

        $categories = $this->Categories->find('list')->where(
          function ($exp, $q) use ($sub_q) {
            return $exp->notExists($sub_q);
            }
        );

        $this->set(compact('category', 'camps','categories'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Camps', 'action' => 'view', $category->camp_id]);

    }
}
