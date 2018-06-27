<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\Network\Response;
use Cake\Auth\DefaultPasswordHasher;


class RestDatosController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Auth');

    }

    public function beforeFilter(Event $event)
    {
        $this->loadModel('Users');
        $this->loadModel('Datos');
        $this->Auth->allow(['getall','daterange']);
    }

    public function getall(){

      if ($this->request->is('post')) {
        if ($this->request->data) {
                $status = '200';
                $message = 'Ok';
            }else{
                $status = '401';
                $message = 'Unauthorized';
            }

            $this->set([
                'status' => $status,
                'message' => $message,
                'datos' => $this->request->data,
                '_serialize' => ['status', 'message', 'datos']
            ]);
      }
    }

    public function daterange(){
      if ($this->request->is('post')) {
        $datos = $this->Datos->find('all',[
          'fields'=>[
            'id','name'
          ],
          'conditions'=>[
            'fecha >='=>$this->request->data['inicio'],
            'fecha <='=>$this->request->data['fin']
          ]
        ]);

        if ($datos) {
                $status = '200';
                $message = 'Ok';
            }else{
                $status = '401';
                $message = 'Unauthorized';
            }

            $this->set([
                'status' => $status,
                'message' => $message,
                'datos' => $datos,
                '_serialize' => ['status', 'message', 'datos']
            ]);

      }
    }

    // public function signin(){
    //
    //   if ($this->request->is('post')) {
    //     $user = $this->Auth->identify($this->request->data);
    //
    //     if ($user['active']) {
    //         $status = '200';
    //         $message = 'Ok';
    //     }else{
    //         $status = '401';
    //         $message = 'Unauthorized';
    //     }
    //
    //     $this->set([
    //         'status' => $status,
    //         'message' => $message,
    //         'user' => $user,
    //         '_serialize' => ['status', 'message', 'user']
    //     ]);
    //   }
    // }

}
