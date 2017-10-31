<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Mar@Seven | Site Officiel</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Application web d'assistance virtuel maestro" name="description" />
    <meta content="Mebodo Richard Aristide" name="author" />
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>


    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <?= $this->Html->css('frontend/assets/plugins/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('frontend/assets/plugins/font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('frontend/assets/css/animate.min.css') ?>
    <?= $this->Html->css('frontend/assets/css/style.min.css') ?>
    <?= $this->Html->css('frontend/assets/css/style-responsive.min.css') ?>
    <?= $this->Html->css('frontend/assets/css/theme/default.css') ?>
    <?= $this->fetch('css') ?>
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <?= $this->Html->script('frontend/assets/plugins/pace/pace.min.js') ?>
    <!-- ================== END BASE JS ================== -->
</head>
<body data-spy="scroll" data-target="#header-navbar" data-offset="51">
<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-transparent navbar-fixed-top">
        <!-- begin container -->
        <div class="container">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">
                    <span class="brand-logo"></span>
                        <span class="brand-text">
                            <span class="text-theme">Mar</span>@Seven
                        </span>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- begin navbar-collapse -->
            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active dropdown">
                        <a href="#home" data-click="scroll-to-target" data-toggle="dropdown">ACCUEiL</a>
                    </li>
                    <li><a href="#about" data-click="scroll-to-target">À PROPOS</a></li>
                    <li><a href="#service" data-click="scroll-to-target">SERVICES</a></li>
                    <li><a href="#work" data-click="scroll-to-target">TRAVAIL</a></li>
                    <li><a href="#contact" data-click="scroll-to-target">CONTACT</a></li>
                </ul>
            </div>
            <!-- end navbar-collapse -->
        </div>
        <!-- end container -->
    </div>
    <!-- end #header -->

    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

    <!-- begin #footer -->
    <div id="footer" class="footer">
        <div class="container">
            <div class="footer-brand">
                <div class="footer-brand-logo"></div>
                Mar@Seven
            </div>
            <p>
                &copy; Copyright Mar@Seven 2017 <br />
                Une vie mieux organisée. Crée par <a href="#">Mebodo Aristide Richard</a>
            </p>
            <p class="social-list">
                <a href="#"><i class="fa fa-facebook fa-fw"></i></a>
                <a href="#"><i class="fa fa-instagram fa-fw"></i></a>
                <a href="#"><i class="fa fa-twitter fa-fw"></i></a>
                <a href="#"><i class="fa fa-google-plus fa-fw"></i></a>
            </p>
        </div>
    </div>
    <!-- end #footer -->
</div>
<!-- end #page-container -->

<!-- ================== BEGIN BASE JS ================== -->
<?= $this->Html->script('frontend/assets/plugins/jquery/jquery-1.9.1.min.js') ?>
<?= $this->Html->script('frontend/assets/plugins/jquery/jquery-migrate-1.1.0.min.js') ?>
<?= $this->Html->script('frontend/assets/plugins/bootstrap/js/bootstrap.min.js') ?>
<!--[if lt IE 9]>
<?= $this->Html->script('frontend/assets/crossbrowserjs/html5shiv.js') ?>
<?= $this->Html->script('frontend/assets/crossbrowserjs/respond.min.js') ?>
<?= $this->Html->script('frontend/assets/crossbrowserjs/excanvas.min.js') ?>
<![endif]-->
<?= $this->Html->script('frontend/assets/plugins/jquery-cookie/jquery.cookie.js') ?>
<?= $this->Html->script('frontend/assets/plugins/scrollMonitor/scrollMonitor.js') ?>
<?= $this->Html->script('frontend/assets/js/apps.min.js') ?>
<?= $this->fetch('script') ?>
<!-- ================== END BASE JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
</body>
</html>

