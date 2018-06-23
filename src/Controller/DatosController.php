<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Datos Controller
 *
 * @property \App\Model\Table\DatosTable $Datos
 *
 * @method \App\Model\Entity\Dato[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DatosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $datos = $this->paginate($this->Datos);

        $this->set(compact('datos'));
    }

    /**
     * View method
     *
     * @param string|null $id Dato id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dato = $this->Datos->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('dato', $dato);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dato = $this->Datos->newEntity();
        if ($this->request->is('post')) {
            $dato = $this->Datos->patchEntity($dato, $this->request->getData());
            if ($this->Datos->save($dato)) {
                $this->Flash->success(__('The dato has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dato could not be saved. Please, try again.'));
        }
        $users = $this->Datos->Users->find('list', ['limit' => 200]);
        $this->set(compact('dato', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dato id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dato = $this->Datos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dato = $this->Datos->patchEntity($dato, $this->request->getData());
            if ($this->Datos->save($dato)) {
                $this->Flash->success(__('The dato has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dato could not be saved. Please, try again.'));
        }
        $users = $this->Datos->Users->find('list', ['limit' => 200]);
        $this->set(compact('dato', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dato id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dato = $this->Datos->get($id);
        if ($this->Datos->delete($dato)) {
            $this->Flash->success(__('The dato has been deleted.'));
        } else {
            $this->Flash->error(__('The dato could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
