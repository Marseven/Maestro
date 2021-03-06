<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
<?= $this->Html->css('admin/assets/plugins/DataTables/css/data-table.css', ['block' => true]) ?>
<?= $this->Html->css('admin/assets/plugins/bootstrap-datepicker/css/datepicker.css', ['block' => true]) ?>
<!-- ================== END PAGE LEVEL CSS STYLE ================== -->

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">Tableau de Bord</a></li>
    <li><a href="<?= $this->Url->build(['controller' => 'ActiviteProfessionnel', 'action' => 'index']) ?>">Activités Professionnelles</a></li>
    <li class="active">Tâches</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Tâches <small>gérer les tâches professionnelles...</small></h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-10 -->
    <div class="col-md-offset-1 col-md-10">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Liste Des Tâches</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Libelle</th>
                            <th>Début</th>
                            <th>Fin</th>
                            <th>Priorité</th>
                            <th>Remarques</th>
                            <th>Etat</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($taches as $tache){ ?>
                            <tr class="gradeC">
                                <td><?= $tache->id ?></td>
                                <td><?= $tache->titre ?></td>
                                <td><?= $tache->debut ?></td>
                                <td><?= $tache->fin ?></td>
                                <td><?= $tache->priorite ?></td>
                                <td><?= $tache->remarque ?></td>
                                <td><?= $tache->etat ?></td>
                                <td>
                                    <a href="#" class="btn btn-default btn-icon btn-circle"><i class="fa fa-eye"></i></a>
                                    <a href="<?= $this->Url->build(['controller' => 'ActiviteProfessionnel', 'action' => 'tache', 'tache' => $tache->id]) ?>" class="btn btn-success btn-icon btn-circle"><i class="fa fa-edit"></i></a>
                                    <a href="<?= $this->Url->build(['controller' => 'ActiviteProfessionnel', 'action' => 'delete', 'tache' => $tache->id]) ?>" class="btn btn-warning btn-icon btn-circle"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-10 -->
</div>

<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-6">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Créer une tâche</h4>
            </div>
            <div class="panel-body">
                <?= $this->form->create('Tache'); ?>
                <div class="form-group">
                    <label class="col-md-3 control-label">Libelle</label>
                    <div class="col-md-9">
                        <?= $this->form->input('titre', array(
                            'class' => 'form-control',
                            'placeholder' => 'Libelle *',
                            'label' => '',
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><br>Date de Debut</label>
                    <div class="col-md-9">
                        <br>
                        <div class="input-group date" id="datetimepicker1">
                            <input type="date" class="form-control" name="debut">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><br>Date de Fin</label>
                    <div class="col-md-9">
                        <br>
                        <div class="input-group date" id="datetimepicker1">
                            <input type="date" class="form-control" name="fin">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><br>Remarque</label>
                    <div class="col-md-9">
                        <br>
                        <?= $this->form->textarea('remarque', array(
                            'class' => 'form-control',
                            'placeholder' => 'Remarque ',
                            'label' => '',
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Priorité de tâche</label>
                    <div class="col-md-9">
                        <?= $this->form->input('priorite', array(
                            'class' => 'form-control',
                            'options' => [
                                'Normal' => 'Normal',
                                'Important' => 'Important',
                                'En Attente' => 'En Attente',
                            ],
                            'label' => '',
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Etat de la tâche</label>
                    <div class="col-md-9">
                        <?= $this->form->input('etat', array(
                            'class' => 'form-control',
                            'options' => [
                                'À Faire' => 'À Faire',
                                'En Cour' => 'En Cour',
                                'Terminer' => 'Terminer',
                            ],
                            'placeholder' => 'Durée *',
                            'label' => '',
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-3">
                        <br><br>
                        <?= $this->form->input('Créer', array(
                            'class' => 'btn btn-success',
                            'type'  => 'submit',
                            'label' => '',
                        )); ?>
                    </div>
                </div>
                <?= $this->form->end(); ?>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
    <!-- begin col-6 -->
    <div class="col-md-6">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-2">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Modifier une tâche</h4>
            </div>
            <div class="panel-body">
                <?php if(isset($tache_edit)){ ?>
                    <?= $this->form->create($tache_edit); ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Libelle</label>
                        <div class="col-md-9">
                            <?= $this->form->input('titre', array(
                                'class' => 'form-control',
                                'placeholder' => 'Libelle *',
                                'label' => '',
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><br>Date de Debut</label>
                        <div class="col-md-9">
                            <br>
                            <div class="input-group date" id="datetimepicker1">
                                <input type="date" class="form-control" name="debut">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><br>Date de Fin</label>
                        <div class="col-md-9">
                            <br>
                            <div class="input-group date" id="datetimepicker1">
                                <input type="date" class="form-control" name="fin">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><br>Remarque</label>
                        <div class="col-md-9">
                            <br>
                            <?= $this->form->textarea('remarque', array(
                                'class' => 'form-control',
                                'placeholder' => 'Remarque ',
                                'label' => '',
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Priorité de tâche</label>
                        <div class="col-md-9">
                            <?= $this->form->input('priorite', array(
                                'class' => 'form-control',
                                'options' => [
                                    'Normal' => 'Normal',
                                    'Important' => 'Important',
                                    'En Attente' => 'En Attente',
                                ],
                                'label' => '',
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Etat de la tâche</label>
                        <div class="col-md-9">
                            <?= $this->form->input('etat', array(
                                'class' => 'form-control',
                                'options' => [
                                    'À Faire' => 'À Faire',
                                    'En Cour' => 'En Cour',
                                    'Terminer' => 'Terminer',
                                ],
                                'placeholder' => 'Durée *',
                                'label' => '',
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-3">
                            <br><br>
                            <?= $this->form->input('Modifier', array(
                                'class' => 'btn btn-success',
                                'type'  => 'submit',
                                'label' => '',
                            )); ?>
                        </div>
                    </div>
                    <?= $this->form->end(); ?>
                <?php }else{ ?>
                    <?= $this->form->create('Tache'); ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Libelle</label>
                        <div class="col-md-9">
                            <?= $this->form->input('titre', array(
                                'class' => 'form-control',
                                'placeholder' => 'Libelle *',
                                'label' => '',
                                'disabled'
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><br>Date de Debut</label>
                        <div class="col-md-9">
                            <br>
                            <div class="input-group date" id="datetimepicker1">
                                <input type="date" class="form-control" name="debut" disabled>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><br>Date de Fin</label>
                        <div class="col-md-9">
                            <br>
                            <div class="input-group date" id="datetimepicker1">
                                <input type="date" class="form-control" name="fin" disabled>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><br>Remarque</label>
                        <div class="col-md-9">
                            <br>
                            <?= $this->form->textarea('remarque', array(
                                'class' => 'form-control',
                                'placeholder' => 'Remarque ',
                                'label' => '',
                                'disabled'
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Priorité de tâche</label>
                        <div class="col-md-9">
                            <?= $this->form->input('priorite', array(
                                'class' => 'form-control',
                                'options' => [
                                    'Normal' => 'Normal',
                                    'Important' => 'Important',
                                    'En Attente' => 'En Attente',
                                ],
                                'label' => '',
                                'disabled'
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Etat de la tâche</label>
                        <div class="col-md-9">
                            <?= $this->form->input('etat', array(
                                'class' => 'form-control',
                                'options' => [
                                    'À Faire' => 'À Faire',
                                    'En Cour' => 'En Cour',
                                    'Terminer' => 'Terminer',
                                ],
                                'placeholder' => 'Durée *',
                                'label' => '',
                                'disabled'
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-3">
                            <br><br>
                            <?= $this->form->input('Modifier', array(
                                'class' => 'btn btn-success',
                                'type'  => 'submit',
                                'label' => '',
                                'disabled'
                            )); ?>
                        </div>
                    </div>
                    <?= $this->form->end(); ?>
                <?php } ?>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
</div>

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<?= $this->Html->script('admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js', ['block' => true]) ?>
<?= $this->Html->script('admin/assets/plugins/DataTables/js/jquery.dataTables.js', ['block' => true]) ?>
<?= $this->Html->script('admin/assets/plugins/DataTables/js/dataTables.tableTools.js', ['block' => true]) ?>
<?= $this->Html->script('admin/assets/js/table-manage-tabletools.demo.min.js', ['block' => true]) ?>
<!-- ================== END PAGE LEVEL JS ================== -->

