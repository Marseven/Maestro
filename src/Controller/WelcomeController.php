<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\FrozenTime;

class WelcomeController extends AppController
{

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->Auth->allow(['index']);
        $user = $this->Auth->user();
        if($user){
            $user['confirmed_at'] = new FrozenTime($user['confirmed_at']);
            $user['reset_at'] = new FrozenTime($user['reset_at']);
            $this->set('user', $user);
        }

    }

    public function index(){

    }
}