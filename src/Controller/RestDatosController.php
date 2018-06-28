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
        $this->Auth->allow(['getall','daterange','getrecords']);
    }

    public function getall(){

      if ($this->request->is('post')) {
        $hora = $this->request->data['hora'];
        $fecha = $this->request->data['fecha'];

        $name = $this->request->data['id'];
        $data = $this->request->data['data'];


        $dato = $this->Datos->newEntity();
        $dato->hora = $hora;
        $dato->fecha = $fecha;
        $dato->data = $data;
        $dato->name = $name;
        $dato->user_id = 1;
        if ($this->Datos->save($dato)) {
            $status = '200';
            $message = 'Ok';
        }else{
            $status = '401';
            $message = 'Unauthorized';
        }

        $this->set([
            'status' => $status,
            'message' => $message,
            '_serialize' => ['status', 'message']
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

    public function getrecords(){
      if ($this->request->is('post')) {
        $dn = $datos = $this->Datos->find('all',[
          'fields'=>[
            'id','name','hora','fecha'
          ],
          'conditions'=>[
            'Datos.id'=>$this->request->data['id'],
          ]
        ])->first();
        $datos = $this->Datos->find('all',[
          'fields'=>[
            'id','name','hora','fecha','data'
          ],
          'conditions'=>[
            'Datos.name'=>$dn->name,
          ]
        ]);
        $d = "";
        $d_x = "";
        foreach ($datos as $key => $value) {
          $d = $value->data;
          if($d_x == ""){
            $d_x = $d;
          }else{
            $d_x = $d.','.$d_x;
          }
        }
        $datos=[[
          'id'=>$dn->id,
          'name'=>$dn->name,
          'hora'=>$dn->hora,
          'fecha'=>$dn->fecha,
          'data'=>$d_x,]
        ];
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

    public function diagnostic(){
      if ($this->request->is('post')) {

      }
    }
}
