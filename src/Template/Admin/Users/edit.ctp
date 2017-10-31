<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
<?= $this->Html->css('admin/assets/plugins/password-indicator/css/password-indicator.css', ['block' => true]) ?>
<?= $this->Html->css('admin/assets/plugins/parsley/src/parsley.css', ['block' => true]) ?>
<!-- ================== END PAGE LEVEL CSS STYLE ================== -->

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Tableau de Bord</a></li>
    <li><a href="javascript:;">Utilisateur</a></li>
    <li class="active">Mise à Jour</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Mise à Jour du Profil</h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title"><?= $user['first_name'] ?> <?= $user['last_name'] ?></h4>
            </div>
            <div class="panel-body panel-form">
                <?= $this->form->create($user_edit, ['type' => 'file', 'class' => 'form-horizontal form-bordered', 'data-parsley-validate' => 'true', 'name' => 'demo-form']); ?>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="fullname">Nom * :</label>
                            <div class="col-md-6 col-sm-6">
                                <?= $this->form->input('last_name', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Nom*',
                                    'label' => '',
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="fullname">Prénom :</label>
                            <div class="col-md-6 col-sm-6">
                                <?= $this->form->input('first_name', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Prenom',
                                    'label' => '',
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="email">Email * :</label>
                            <div class="col-md-6 col-sm-6">
                                <?= $this->form->input('email', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'abc@xyz.com*',
                                    'data-parsley-type' => 'email',
                                    'type' => 'email',
                                    'data-parsley-required' => 'true',
                                    'label' => '',
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="message">Téléphone * :</label>
                            <div class="col-md-6 col-sm-6">
                                <?= $this->form->input('phone', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Téléphone',
                                    'data-parsley-type' => 'number',
                                    'data-parsley-required' => 'true',
                                    'label' => '',
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="message">Adresse :</label>
                            <div class="col-md-6 col-sm-6">
                                <?= $this->form->input('adress', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Adresse',
                                    'label' => '',
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="message">Ville * :</label>
                            <div class="col-md-6 col-sm-6">
                                <?= $this->form->input('town', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Ville*',
                                    'data-parsley-required' => 'true',
                                    'label' => '',
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Mot de Passe * :</label>
                            <div class="col-md-6 col-sm-6">
                                <?= $this->form->input('password', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Mot de Passe*',
                                    'type' => 'password',
                                    'id' => 'password-indicator-default',
                                    'label' => '',
                                )); ?>
                                <div id="passwordStrengthDiv" class="is0 m-t-5"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Confirmer Mot de Passe * :</label>
                            <div class="col-md-6 col-sm-6">
                                <?= $this->form->input('password_verify', array(
                                    'class' => 'form-control',
                                    'type' => 'password',
                                    'id' => 'password-indicator-visible',
                                    'placeholder' => 'Confirmer Mot de Passe*',
                                    'label' => '',
                                )); ?>
                                <div id="passwordStrengthDiv2" class="is0 m-t-5"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4"></label>
                            <div class="col-md-6 col-sm-6">
                                <?= $this->form->input('Valider', array(
                                    'class' => 'btn btn-success',
                                    'type'  => 'submit',
                                    'label' => ''
                                )); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <br><br>
                        <div id="image_preview">
                            <?= $this->Html->image('placeholder.jpg', ['alt' => 'img-thumbnail', 'width' => '200', 'height' => '200']); ?>
                            <h4></h4>
                            <h5></h5>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?= $this->form->input('picture', array(
                                        'type' => 'file',
                                        'class' => '',
                                        'label' => '',
                                        'id' => 'picture',
                                        'accept' => 'image/*'
                                    )); ?>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input file">
                                        <button style="margin-top: 15px" class="btn btn-danger" type="button">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?= $this->form->end(); ?>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
</div>

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<?= $this->Html->script('admin/assets/plugins/password-indicator/js/password-indicator.js', ['block' => true]) ?>
<?= $this->Html->script('admin/assets/plugins/parsley/dist/parsley.js', ['block' => true]) ?>
<?= $this->Html->script('admin/assets/js/main.js', ['block' => true]) ?>
<!-- ================== END PAGE LEVEL JS ================== -->
