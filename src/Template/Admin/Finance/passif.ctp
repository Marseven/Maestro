<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
<?= $this->Html->css('admin/assets/plugins/DataTables/css/data-table.css', ['block' => true]) ?>
<?= $this->Html->css('admin/assets/plugins/bootstrap-datepicker/css/datepicker.css', ['block' => true]) ?>
<!-- ================== END PAGE LEVEL CSS STYLE ================== -->

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">Tableau de Bord</a></li>
    <li><a href="<?= $this->Url->build(['controller' => 'Finance', 'action' => 'index']) ?>">Finance</a></li>
    <li class="active">Passifs</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Passifs <small>Sortie financière et Toute source de dépenses...</small></h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-8 -->
    <div class="col-md-8">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Liste Des Passifs</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Libelle</th>
                            <th>Valeur</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($passifs as $passif){ ?>
                            <tr class="gradeC">
                                <td><?= $passif->id ?></td>
                                <td><?= $passif->libelle ?></td>
                                <td><?= $passif->valeur ?></td>
                                <td><?= $passif->date ?></td>
                                <td>
                                    <a href="#" class="btn btn-default btn-icon btn-circle"><i class="fa fa-eye"></i></a>
                                    <a href="<?= $this->Url->build(['controller' => 'Finance', 'action' => 'passif', 'passif' => $passif->id]) ?>" class="btn btn-success btn-icon btn-circle"><i class="fa fa-edit"></i></a>
                                    <a href="<?= $this->Url->build(['controller' => 'Finance', 'action' => 'delete', 'passif' => $passif->id]) ?>" class="btn btn-warning btn-icon btn-circle"><i class="fa fa-trash-o"></i></a>
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
    <!-- end col-8 -->
    <!-- begin col-4 -->
    <div class="col-md-4">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Total Des Passifs</h4>
            </div>
            <div class="panel-body">
                <h4 class="stats-icon"><i class="fa fa-money"></i></h4>
                <div class="stats-info">
                    <h2><?= $total_passif ?></h2>
                    <p>Franc CFA</p>
                </div>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-4 -->
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
                <h4 class="panel-title">Ajouter un passif</h4>
            </div>
            <div class="panel-body">
                <?= $this->form->create('Passif', ['url' => ['controller' => 'Finance', 'action' => 'actif']]); ?>
                <div class="form-group">
                    <label class="col-md-3 control-label">Libelle</label>
                    <div class="col-md-9">
                        <?= $this->form->input('libelle', array(
                            'class' => 'form-control',
                            'placeholder' => 'Libelle *',
                            'label' => '',
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Valeur </label>
                    <div class="col-md-9">
                        <br>
                        <?= $this->form->input('valeur', array(
                            'class' => 'form-control',
                            'type' => 'number',
                            'placeholder' => 'Valeur ',
                            'label' => '',
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><br>Date</label>
                    <div class="col-md-9">
                        <br>
                        <div class="input-group date" id="datetimepicker1">
                            <input type="date" class="form-control" name="date">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-3">
                        <br><br>
                        <?= $this->form->input('Ajouter', array(
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
                <h4 class="panel-title">Modifier un passif</h4>
            </div>
            <div class="panel-body">
                <?php if(isset($passif_edit)){ ?>
                    <?= $this->form->create($passif_edit, ['url' => ['controller' => 'Finance', 'action' => 'actif']]); ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Libelle</label>
                        <div class="col-md-9">
                            <?= $this->form->input('libelle', array(
                                'class' => 'form-control',
                                'placeholder' => 'Libelle *',
                                'label' => '',
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Valeur </label>
                        <div class="col-md-9">
                            <br>
                            <?= $this->form->input('valeur', array(
                                'class' => 'form-control',
                                'type' => 'number',
                                'placeholder' => 'Valeur ',
                                'label' => '',
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><br>Date</label>
                        <div class="col-md-9">
                            <br>
                            <div class="input-group date" id="datetimepicker1">
                                <input type="date" class="form-control" name="date">
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
                            )); ?>
                        </div>
                    </div>
                    <?= $this->form->end(); ?>
                <?php }else{ ?>
                    <?= $this->form->create('Passif', ['url' => ['controller' => 'Finance', 'action' => 'actif']]); ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Libelle</label>
                        <div class="col-md-9">
                            <?= $this->form->input('libelle', array(
                                'class' => 'form-control',
                                'placeholder' => 'Libelle *',
                                'label' => '',
                                'disabled'
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Valeur </label>
                        <div class="col-md-9">
                            <br>
                            <?= $this->form->input('valeur', array(
                                'class' => 'form-control',
                                'type' => 'number',
                                'placeholder' => 'Valeur ',
                                'label' => '',
                                'disabled'
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><br>Date</label>
                        <div class="col-md-9">
                            <br>
                            <div class="input-group date" id="datetimepicker1">
                                <input type="date" class="form-control" name="date" disabled>
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

