<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
<?= $this->Html->css('admin/assets/plugins/DataTables/css/data-table.css', ['block' => true]) ?>
<?= $this->Html->css('admin/assets/plugins/bootstrap-datepicker/css/datepicker.css', ['block' => true]) ?>
<!-- ================== END PAGE LEVEL CSS STYLE ================== -->

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">Tableau de Bord</a></li>
    <li><a href="<?= $this->Url->build(['controller' => 'Etude', 'action' => 'index']) ?>">Etudes</a></li>
    <li class="active">Formations</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Formations <small>gérer les formations et certifications</small></h1>
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
                <h4 class="panel-title">Liste Des Formations</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Libelle</th>
                                <th>Durée</th>
                                <th>Début</th>
                                <th>Fin</th>
                                <th>Certification (Optionnel)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($formations as $fornation){ ?>
                            <tr class="gradeC">
                                <td><?= $formation->id ?></td>
                                <td><?= $formation->titre ?></td>
                                <td><?= $formation->duree ?></td>
                                <td><?= $formation->debut ?></td>
                                <td><?= $formation->fin ?></td>
                                <td><?= $formation->certication ?></td>
                                <td>
                                    <a href="#" class="btn btn-default btn-icon btn-circle"><i class="fa fa-eye"></i></a>
                                    <a href="<?= $this->Url->build(['controller' => 'Etude', 'action' => 'formation', 'formation' => $formation->id]) ?>" class="btn btn-success btn-icon btn-circle"><i class="fa fa-edit"></i></a>
                                    <a href="<?= $this->Url->build(['controller' => 'Etude', 'action' => 'delete', 'formation' => $formation->id]) ?>" class="btn btn-warning btn-icon btn-circle"><i class="fa fa-trash-o"></i></a>
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
                <h4 class="panel-title">Créer une formation</h4>
            </div>
            <div class="panel-body">
                <?= $this->form->create('Formation'); ?>
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
                        <label class="col-md-3 control-label">Durée</label>
                        <div class="col-md-9">
                            <?= $this->form->input('duree', array(
                                'class' => 'form-control',
                                'type' => 'number',
                                'placeholder' => 'Durée *',
                                'label' => '',
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Certificattion</label>
                        <div class="col-md-9">
                            <?= $this->form->input('certification', array(
                                'class' => 'form-control',
                                'type' => 'text',
                                'placeholder' => 'Certfication ',
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
                <h4 class="panel-title">Modifier une formation</h4>
            </div>
            <div class="panel-body">
                <?php if(isset($formation_edit)){ ?>
                    <?= $this->form->create($formation_edit); ?>
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
                            <label class="col-md-3 control-label">Durée</label>
                            <div class="col-md-9">
                                <?= $this->form->input('duree', array(
                                    'class' => 'form-control',
                                    'type' => 'number',
                                    'placeholder' => 'Durée *',
                                    'label' => '',
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Certificattion</label>
                            <div class="col-md-9">
                                <?= $this->form->input('certification', array(
                                    'class' => 'form-control',
                                    'type' => 'text',
                                    'placeholder' => 'Certfication ',
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
                            <div class="col-md-offset-3 col-md-3">
                                <br><br>
                                <?= $this->form->input('Créer', array(
                                    'class' => 'btn btn-success',
                                    'type'  => 'submit',
                                    'name' => 'new',
                                )); ?>
                            </div>
                        </div>
                    <?= $this->form->end(); ?>
                <?php }else{ ?>
                    <?= $this->form->create('Formation'); ?>
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
                        <label class="col-md-3 control-label">Durée</label>
                        <div class="col-md-9">
                            <?= $this->form->input('duree', array(
                                'class' => 'form-control',
                                'type' => 'number',
                                'placeholder' => 'Durée *',
                                'label' => '',
                                'disabled'
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Certificattion</label>
                        <div class="col-md-9">
                            <?= $this->form->input('certification', array(
                                'class' => 'form-control',
                                'type' => 'text',
                                'placeholder' => 'Certfication ',
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

