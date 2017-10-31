<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\I18n\FrozenTime;

class UsersController extends AppController {

    public $components = array('Paginator');
    public $paginate = [
        'limit' => 12,
        'order' => ['Annonces.date_creation' => 'DESC'],
        'paramType' => 'queryString'
    ];

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['login', 'confirm', 'resetPassword', 'signup', 'logout','socialLogin','socialEndpoint']);
        $user = $this->Auth->user();
        if($user){
            $user['confirmed_at'] = new FrozenTime($user['confirmed_at']);
            $user['reset_at'] = new FrozenTime($user['reset_at']);
            $this->set('user', $user);
        }
        $this->loadComponent('Hybridauth');
        $this->loadModel('SocialProfile');
        $this->loadComponent('Paginator');
    }


    function menu(){
        $acc = '';
        $cat = '';
        $usr = 'active';

        $this->set(array(
            'acc' => $acc,
            'cat' => $cat,
            'usr' => $usr,
        ));
    }

    public function index(){
        $this->menu();
        return $this->render('index', 'Admin/default');
    }

    function login(){
        $this->menu();
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success('Content de vous revoir '.$this->Auth->user('last_name').' '.$this->Auth->user('first_name'));
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Votre email ou mot de passe est incorrect.');
        }
        return $this->render('login', 'Admin/login');
    }

    function logout(){
        $date = date('Y-m-d H:m:s');
        $usersTable = TableRegistry::get('Users');
        $user = $this->Auth->user();
        if(is_array($user)){
            $user = $usersTable->get($user['id']);
        }
        if($user != null || !empty($user)){
            $user->last_login = $date;
            $usersTable->save($user);
        }else{
            return $this->redirect($this->Auth->logout());
        }
        $this->Flash->set('À Bientôt '.$user->first_name.' '.$user->last_name, ['element' => 'default']);
        $this->Hybridauth->logout();
        return $this->redirect($this->Auth->logout());
    }

    function signup(){
        $this->menu();
        if($this->request->is('post')){
            if(empty($this->request->getData()['password']) || $this->request->getData()['password'] != $this->request->getData()['password_verify']){
                $this->Flash->set('Mots de passe différents !', ['element' => 'error']);
                return $this->render('login');
            }
            $usersTable = TableRegistry::get('Users');
            $exist_email = $usersTable->find()
                ->where(
                    [
                        'email' => $this->request->getData()['email'],
                    ]
                )
                ->limit(1)
                ->all();
            if(!$exist_email->isEmpty()){
                $this->Flash->error('Cette email existe déjà.');
                return $this->render('login');
            }
            $user = $usersTable->newEntity($this->request->getData());
            $user->picture = '#';
            if ($usersTable->save($user)) {
                $link = array(
                    'controller' => 'users',
                    'action' => 'confirm',
                    'token' => $user->id.'-'.md5($user->password)
                );
                $user->confirmed_token = md5($user->password);
                $usersTable->save($user);
                $mail = new Email();
                $mail->setFrom('noreply@marseven.com')
                    ->setTo($user->email)
                    ->setSubject('Confirmation d\'enregistrement ')
                    ->setEmailFormat('html')
                    ->setTemplate('confirmation')
                    ->setViewVars(array(
                        'last_name' => $user->last_name.' '.$user->first_name,
                        'link' => $link
                    ))
                    ->send();
                $this->Flash->set('Vous avez été enregistrer avec succès, un email de confirmation vous a été envoyé.', ['element' => 'success']);
                return $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'signup',
                ));
            }else{
                $this->Flash->set('Certains champs ont été mal saisis', ['element' => 'danger']);
            }
        }
        return $this->render('signup', 'Admin/login');

    }

    function edit($id = null){
        $this->menu();
        $usersTable = TableRegistry::get('Users');
        if(!empty($this->request->params['?']['user'])){
            $id = (int)$this->request->params['?']['user'];
            $user_edit = $usersTable->get($id);
            if (!$user_edit) {
                $this->Flash->error('Ce profil n\'exite pas');
                $this->redirect(['action' => 'logout']);
            }
            $this->set('user_edit', $user_edit);
        }
        if ($this->request->is(array('post','put'))) {
            if(empty($this->request->getData()['password']) || $this->request->getData()['password'] != $this->request->getData()['password_verify']){
                $this->Flash->set('Mots de passe différents !', ['element' => 'error']);
            }else{
                $user = $usersTable->newEntity($this->request->getData());
                if($id != null){
                    $user->id = $id;
                }else{
                    $user->id = $user_edit->id;
                }
                if ($usersTable->save($user)) {
                    $user = $usersTable->get($id);
                    $this->Auth->setUser($user);
                    $this->Flash->success('Votre profil a été mis à jour avec succès !');
                    return $this->redirect($this->Auth->redirectUrl());
                }else{
                    $this->Flash->set('Certains champs ont été mal saisis', ['element' => 'error']);
                    return $this->render('edit', 'Admin/default');
                }
            }
        }
        return $this->render('edit', 'Admin/default');
    }

    function confirm(){
        $this->menu();
        $token = $_GET['token'];
        $token = explode('-', $token);
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->find()
            ->where(
                [
                    'id' => $token[0],
                    'confirmed_token' => $token[1],
                ]
            )
            ->limit(1)
            ->all();
        if(!empty($user->first())){
            $user = $user->first();
            $user->confirmed_at = date('Y-m-d H:m:s');
            $user->confirmed_token = NULL;
            $usersTable->save($user);
            $this->Flash->set('Bienvenue Sur Maestro,  '.$user->last_name.' '.$user->first_name, ['element' => 'success']);
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        }else{
            $this->Flash->set('Ce lien n\'est plus valide.', ['element' => 'error']);
            return $this->redirect(array(
                'controller' => 'users',
                'action' => 'login',
            ));
        }
    }

    function remember(){
        $this->menu();
        if($this->request->is('post')){
            $usersTable = TableRegistry::get('Users');
            $data = $this->request->getData();
            $user = $usersTable->find()
                ->where([
                    'email' => $data['email'],
                ])
                ->limit(1)
                ->all();
            if(empty($user->first())){
                $this->Flash->error('Aucun Profil ne correspond à cette email.');
                return $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'reset_password',
                ));
            }else{
                $user = $user->first();
                $link = array(
                    'controller' => 'users',
                    'action' => 'reset_password',
                    'token' => $user->id.'-'.md5($user->password)
                );
                $user->reset_token = md5($user->password);
                $usersTable->save($user);
                $mail = new Email();
                $mail->setFrom('norely@marseven.com')
                    ->setTo($user->email)
                    ->setSubject('Mot de Passe Oublié')
                    ->setEmailFormat('html')
                    ->setTemplate('forget_password')
                    ->setViewVars(array(
                        'last_name' => $user->last_name.' '.$user->first_name,
                        'link' => $link
                    ))
                    ->send();
                $this->Flash->success('Un email a été envoyer à votre boîte mail pour réinitialiser votre mot de passe.');
                $this->redirect(array('action' => 'resetPassword'));
            }
        }
    }

    function resetPassword(){
        $this->menu();
        $etp = 1;
        $usersTable = TableRegistry::get('Users');

        if(!empty($_GET['token'])){
            $token = $_GET['token'];
            $token = explode('-', $token);
            $user = $usersTable->find()
                ->where([
                    'id' => $token[0],
                    'reset_token' =>$token[1],
                ])
                ->limit(1)
                ->all();
            if(empty($user->first())){
                $this->Flash->error('Ce lien n\'est pas valide.');
                return $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'login',
                ));
            }else{
                $etp = 2;
                $email = $user->first()->email;
                $this->set('email', $email);
            }
        }

        if($this->request->is('post')){
            if(empty($this->request->getData()['password']) || $this->request->getData()['password'] != $this->request->getData()['password_verify']){
                $this->Flash->set('Mots de passe différents !', ['element' => 'error']);
                return $this->render('reset_password');
            }
            $user = $usersTable->find()
                ->where([
                    'email' => $this->request->getData()['email'],
                ])
                ->limit(1)
                ->all();
            $user = $user->first();
            $user->reset_at = date('Y-m-d H:m:s');
            $user->reset_token = NULL;
            $usersTable->save($user);
            $this->Auth->setUser($user);
            $this->Flash->success('Mot de passe réinitialisé avec succès.');
            return $this->redirect([
                'controller' => 'users',
                'action' => 'index',
            ]);

        }else{
            $this->set('etp', $etp);
        }
    }

    public function profil(){
        $this->menu();
        $tachesTable = TableRegistry::get('Taches');
        $taches = $tachesTable->find()->all();
        $nbreTache = $taches->count();
        $this->set('taches', $taches);
        $this->set('nbreTache', $nbreTache);
        return $this->render('profil', 'Admin/default');
    }

    /* social login functionality */
    public function socialLogin($provider) {
        if( $this->Hybridauth->connect($provider) ){
            $this->_successfulHybridauth($provider, $this->Hybridauth->user_profile);
        }else{
            // error
            $this->Flash->error($this->Hybridauth->error);
            $this->redirect($this->Auth->logout());
        }
    }

    public function socialEndpoint($provider = null) {
        $this->Hybridauth->processEndpoint();
    }

    private function _successfulHybridauth($provider, $incomingProfile){

        // #1 - check if user already authenticated using this provider before
        $socialTable = TableRegistry::get('SocialProfile');
        $usersTable = TableRegistry::get('Users');
        $socialProfil = $socialTable->newEntity($incomingProfile['SocialProfile']);
        $socialProfil->recursive = -1;
        $existingProfile = $socialTable->find()
            ->where(
                [
                    'social_network_id' => $incomingProfile['SocialProfile']['social_network_id'],
                    'social_network_name' => $provider,
                ]
            )
            ->limit(1)
            ->all();

        if (!empty($existingProfile->first())) {
            // #2 - if an existing profile is available, then we set the user as connected and log them in
            $existingProfile = $existingProfile->first();
            $user = $usersTable->find()
                ->where([
                    'id' => $existingProfile->user_id,
                ])
                ->limit(1)
                ->all();
            $this->_doSocialLogin($user->first(),true);
        } else {

            // New profile.
            if ($this->Auth->identify()) {
                // user is already logged-in , attach profile to logged in user.
                // create social profile linked to current user
                $$socialProfil->user_id = $this->Auth->user('id');
                $socialTable->save($incomingProfile);

                $this->Flash->success('Votre ' . $incomingProfile['SocialProfile']['social_network_name'] . ' compte est maintenant connecté.');
                $this->redirect($this->Auth->redirectUrl());

            } else {
                // no-one logged and no profile, must be a registration.
                $users = $usersTable->createFromSocialProfile($incomingProfile['SocialProfile']);
                $socialProfil->user_id = $users->id;
                $socialTable->save($socialProfil);

                // log in with the newly created user
                $this->_doSocialLogin($users);
            }
        }
    }

    private function _doSocialLogin($user, $returning = false) {

        $this->Auth->setUser($user);
        if($returning){
            $this->Flash->success(__('Cotent de vous revoir, '.$user->last_name.' '.$user->first_name));
        } else {
            $this->Flash->success(__('Bienvenue dans notre communauté, '.$user->last_name.' '.$user->first_name));
        }
        $this->redirect($this->Auth->redirectUrl());

    }

    //fonctions utiles
    function str_random($length){
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }

}
