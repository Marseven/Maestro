<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\FrozenTime;

class ActiviteProfessionnelController extends AppController
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
        }else{
            $this->redirect(['controller' => 'Users','action' => 'logout']);
        }

    }

    public function index(){
        return $this->render('index', 'Admin/default');
    }

    public function tache(){
        $tachesTable = TableRegistry::get('Taches');
        if(isset($this->request->params['?']['tache'])){
            $id = (int)$this->request->params['?']['tache'];
            $tache_edit = $tachesTable->get($id);
            if (!$tache_edit) {
                $this->Flash->error('Cette tâche n\'exite pas');
                $this->redirect(['controller' => 'Users','action' => 'logout']);
            }
            $this->set('tache_edit', $tache_edit);
        }
        if ($this->request->is(array('post','put'))) {
            $tache = $tachesTable->newEntity($this->request->getData());
            if(isset($tache_edit)  && !isset($this->request->getData()['new'])){
                $tache->id = $tache_edit->id;
            }
            if ($tachesTable->save($tache)) {
                if(isset($formation_edit)  && !isset($this->request->getData()['new'])){
                    $this->Flash->success('Tâche Modifiée avec succès !');
                }else{
                    $this->Flash->success('Tâche Ajoutée avec succès !');
                }
            }else{
                $this->Flash->set('Certains champs ont été mal saisis', ['element' => 'error']);
            }
        }
        $taches = $tachesTable->find()->all();
        $this->set('taches', $taches);
        return $this->render('tache', 'Admin/default');
    }

    public function evenement(){
        $evementsTable = TableRegistry::get('Evenement_pros');
        if(isset($this->request->params['?']['evenement'])){
            $id = (int)$this->request->params['?']['evenement'];
            $evenement_edit = $evementsTable->get($id);
            if (!$evenement_edit) {
                $this->Flash->error('Cet évènement professionnel n\'exite pas');
                $this->redirect(['controller' => 'Users','action' => 'logout']);
            }
            $this->set('evenement_edit', $evenement_edit);
        }
        if ($this->request->is(array('post','put'))) {
            $evenement = $evementsTable->newEntity($this->request->getData());
            if(isset($evenement_edit)  && !isset($this->request->getData()['new'])){
                $evenement->id = $evenement_edit->id;
            }
            if ($evementsTable->save($evenement)) {
                if(isset($evenement_edit)  && !isset($this->request->getData()['new'])){
                    $this->Flash->success('Evènement professionnel Modifié avec succès !');
                }else{
                    $this->Flash->success('Evènement professionnel Ajouté avec succès !');
                }
            }else{
                $this->Flash->set('Certains champs ont été mal saisis', ['element' => 'error']);
            }
        }
        $evenements = $evementsTable->find()->all();
        $this->set('evenements', $evenements);
        return $this->render('evenement', 'Admin/default');
    }

    public function delete(){
        $tachesTable = TableRegistry::get('Taches');
        $evementsTable = TableRegistry::get('Evenement_pros');
        if(empty($this->request->params['?'])){
            $this->Flash->error('Information manquante.');
            $this->redirect(['controller' => 'Users','action' => 'logout']);
        }else{
            if(isset($this->request->params['?']['tache'])){
                $id = (int)$this->request->params['?']['tache'];
                $tache = $tachesTable->find()
                    ->where(
                        [
                            'id' => $id,
                        ]
                    )
                    ->all();

                if (!$tache->first()) {
                    $this->Flash->error('Cette tâche n\'existe pas.');
                    $this->redirect(['controller' => 'Users', 'action' => 'logout']);
                }else{
                    $tachesTable->delete($tache->first());
                    $this->Flash->set('Tâche supprimée avec succès.', ['element' => 'success']);
                    $this->redirect(['controller' => 'Etude','action' => 'formation']);
                }
            }elseif(isset($this->request->params['?']['evenement'])){
                $id = (int)$this->request->params['?']['evenement'];
                $evenement = $evementsTable->find()
                    ->where(
                        [
                            'id' => $id,
                        ]
                    )
                    ->all();

                if (!$evenement->first()) {
                    $this->Flash->error('Cet évènement professionnel n\'existe pas.');
                    $this->redirect(['controller' => 'Users', 'action' => 'logout']);
                }else{
                    $evementsTable->delete($evenement->first());
                    $this->Flash->set('Evènement professionnel supprimé avec succès.', ['element' => 'success']);
                    $this->redirect(['controller' => 'Etude','action' => 'etudePersonnel']);
                }
            }
        }

    }
}