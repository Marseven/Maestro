<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Mar@Seven | Maestro</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Application web d'assistance virtuel maestro" name="description" />
    <meta content="Mebodo Richard Aristide" name="author" />
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>


    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <?= $this->Html->css('admin/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') ?>
    <?= $this->Html->css('frontend/assets/plugins/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('admin/assets/plugins/font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('admin/assets/css/animate.min.css') ?>
    <?= $this->Html->css('admin/assets/css/style.min.css') ?>
    <?= $this->Html->css('admin/assets/css/style-responsive.min.css') ?>
    <?= $this->Html->css('admin/assets/css/theme/default.css') ?>
    <?= $this->fetch('css') ?>
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <?= $this->Html->script('frontend/assets/plugins/pace/pace.min.js') ?>
    <!-- ================== END BASE JS ================== -->
</head>

<body class="pace-top">
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<div class="login-cover">
    <div class="login-cover-image"><?= $this->Html->image("admin/assets/img/login-bg/bg-1.jpg", ["alt" => "", "data-id" => "login-cover-image" ])?></div>
    <div class="login-cover-bg"></div>
</div>
<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-v2" data-pageload-addclass="animated fadeIn">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">
                <span class="logo"></span> Mar@Seven
                <small>Zone d'administration et de Gestion : Maestro</small>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
        </div>
        <!-- end brand -->
        <div class="login-content">
            <form action="" method="POST" class="margin-bottom-0">
            <?= $this->form->create('User', ['url' => ['action' => 'login'], 'class' => 'margin-bottom-0']); ?>
                <div class="checkbox m-b-20">
                    <?= $this->Flash->render() ?>
                </div>
                <div class="form-group m-b-20">
                    <?= $this->form->input('email', array(
                        'class' => 'form-control input-lg',
                        'placeholder' => 'Email',
                        'type' => 'text',
                        'label' => '',
                    )); ?>
                </div>
                <div class="form-group m-b-20">
                    <?= $this->form->input('password', array(
                        'class' => 'form-control input-lg',
                        'placeholder' => 'Mot de passe',
                        'type' => 'password',
                        'label' => '',
                    )); ?>
                </div>
                <div class="checkbox m-b-20">
                </div>
                <div class="login-buttons">
                    <?= $this->form->input('Connexion', array(
                        'class' => 'btn btn-success btn-block btn-lg',
                        'id'    => 'connexion',
                        'type'  => 'submit',
                        'label' => ''
                    )); ?>
                </div>
                <div class="m-t-20">
                    Mot de passe oublié? Clique <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'reset_password']) ?>">Ici</a> pour le réinitialiser.
                </div>
                <div class="m-t-20">
                    Retouner au Site Officiel Clique <a href="http://marseven.com">Ici</a>.
                </div>
            <?= $this->form->end(); ?>
        </div>
    </div>
    <!-- end login -->

    <ul class="login-bg-list">
        <li class="active"><a href="#" data-click="change-bg"><?= $this->Html->image("admin/assets/img/login-bg/bg-1.jpg", ["alt" => "", ])?></a></li>
        <li><a href="#" data-click="change-bg"><?= $this->Html->image("admin/assets/img/login-bg/bg-2.jpg", ["alt" => "", ])?></a></li>
        <li><a href="#" data-click="change-bg"><?= $this->Html->image("admin/assets/img/login-bg/bg-3.jpg", ["alt" => "", ])?></a></li>
        <li><a href="#" data-click="change-bg"><?= $this->Html->image("admin/assets/img/login-bg/bg-4.jpg", ["alt" => "", ])?></a></li>
        <li><a href="#" data-click="change-bg"><?= $this->Html->image("admin/assets/img/login-bg/bg-5.jpg", ["alt" => "", ])?></a></li>
        <li><a href="#" data-click="change-bg"><?= $this->Html->image("admin/assets/img/login-bg/bg-6.jpg", ["alt" => "", ])?></a></li>
    </ul>
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<?= $this->Html->script('admin/assets/plugins/jquery/jquery-1.9.1.min.js') ?>
<?= $this->Html->script('admin/assets/plugins/jquery/jquery-migrate-1.1.0.min.js') ?>
<?= $this->Html->script('admin/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') ?>
<?= $this->Html->script('admin/assets/plugins/bootstrap/js/bootstrap.min.js') ?>
<!--[if lt IE 9]>
<?= $this->Html->script('admin/assets/crossbrowserjs/html5shiv.js') ?>
<?= $this->Html->script('admin/assets/crossbrowserjs/respond.min.js') ?>
<?= $this->Html->script('admin/assets/crossbrowserjs/excanvas.min.js') ?>
<![endif]-->
<?= $this->Html->script('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') ?>
<?= $this->Html->script('admin/assets/plugins/jquery-cookie/jquery.cookie.js') ?>
<?= $this->Html->script('admin/assets/js/login-v2.demo.min.js') ?>
<?= $this->Html->script('admin/assets/js/apps.min.js') ?>
<?= $this->fetch('script') ?>
<!-- ================== END BASE JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        LoginV2.init();
    });
</script>
</body>
</html>
