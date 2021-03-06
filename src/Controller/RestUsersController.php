<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\Network\Response;
use Cake\Auth\DefaultPasswordHasher;


class RestUsersController extends AppController
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
        $this->Auth->allow(['signin']);
    }

    // public function mregister(){
    //
    //   if ($this->request->is('post')) {
    //      $hasher = new DefaultPasswordHasher();
    //      $hasher->hash($this->request->data['password']);
    //      $this->request->data['password'] = $hasher;
    //      $user = $this->Users->newEntity($this->request->data);
    //      $this->Users->save($user));
    //
    //
    //     }
    // }

    public function signin(){

      if ($this->request->is('post')) {
        $user = $this->Auth->identify($this->request->data);

        if ($user['active']) {
            $status = '200';
            $message = 'Ok';
        }else{
            $status = '401';
            $message = 'Unauthorized';
        }

        $this->set([
            'status' => $status,
            'message' => $message,
            'user' => $user,
            '_serialize' => ['status', 'message', 'user']
        ]);
      }
    }

}
