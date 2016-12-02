<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 */
class ItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $items = $this->paginate($this->Items->find()->order(['hot' => 'DESC']));

        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Categories', 'Needs', 'Offers']
        ]);

        $this->set('item', $item);
        $this->set('_serialize', ['item']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['controller' => 'camps' ,'action' => 'view', $this->Auth->user('camp_id') ]);
            } else {
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }

        $query = ConnectionManager::get('default')->execute('SELECT * FROM categories as a WHERE NOT EXISTS
           (SELECT b.id FROM categories as b WHERE b.category_id = a.id)')->fetchAll('assoc');

        $categories;
           foreach ($query as $key => $value) {
             $id;
             $name;
             foreach ($value as $field => $data) {
               if($field ==  'id')
                  $id = $data;
               if($field == 'name')
                  $name = $data;
             }
             $categories[$id] = $name;
           }

        $this->set(compact('item', 'categories'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Items->Categories->find('list', ['limit' => 200]);
        $this->set(compact('item', 'categories'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * byCategory method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function byCategory($category_id = null){
        $items = $this->Items->find('category', [
          'category_id' => $category_id
        ]);
        $category = $this->Items->Categories->get($category_id);
        $this->set(compact('items', 'category'));
    }

    public function process($id = null){
      $r = $this->Items->Offers->find()->where(['item_id' => $id])->toArray() ;
      if( empty($r) ){
        //No result we have to create the needs
        // add a needs for the item indentified by $id
        return $this->redirect(['controller' => 'needs','action' => 'add', $id]);
      }else{
        //redirect the user to the needs view
        //$r[0]->id is the id of the offer
        return $this->redirect(['controller' => 'offers','action' => 'view', $r[0]->id]);
      }

    }

    public function reset($id = null){
        $item = $this->Items->get($id);

        if (empty($item->toArray()))
    		{
          $this->Flash->error('Item your have tired to reset does not exist');
          $this->redirect(['controller' => 'Camps' ,'action'=> 'view', $this->Auth->user('camp_id')]);
    		}else{
          $item->hot = 0;
          if ($this->Items->save($item)) {
              $this->Flash->success(__('The item has been reset.'));
              $this->redirect(['controller' => 'Camps' ,'action'=> 'view', $this->Auth->user('camp_id')]);
          } else {
              $this->Flash->error(__('The item could not be reset. Please, try again.'));
          }
        }



    }



}
