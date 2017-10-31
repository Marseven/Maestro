<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Mar@Seven | Maestro</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <?= $this->Html->css('admin/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') ?>
    <?= $this->Html->css('frontend/assets/plugins/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('admin/assets/plugins/font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('admin/assets/css/animate.min.css') ?>
    <?= $this->Html->css('admin/assets/css/style.min.css') ?>
    <?= $this->Html->css('admin/assets/css/style-responsive.min.css') ?>
    <?= $this->Html->css('admin/assets/css/theme/default.css') ?>
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    <?= $this->fetch('css') ?>
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <?= $this->Html->script('frontend/assets/plugins/pace/pace.min.js') ?>
    <!-- ================== END BASE JS ================== -->

</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin mobile sidebar expand / collapse button -->
            <div class="navbar-header">
                <a href="#" class="navbar-brand"><span class="navbar-logo"></span> Maestro</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end mobile sidebar expand / collapse button -->

            <!-- begin header navigation right -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form full-width">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Recherche..." />
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                        <i class="fa fa-bell-o"></i>
                        <span class="label">5</span>
                    </a>
                    <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                        <li class="dropdown-header">Notifications (5)</li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading">Server Error Reports</h6>
                                    <div class="text-muted f-s-11">3 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading"> New User Registered</h6>
                                    <div class="text-muted f-s-11">1 hour ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading"> New Email From John</h6>
                                    <div class="text-muted f-s-11">2 hour ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer text-center">
                            <a href="javascript:;">View more</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $user['picture'] ?>" alt="" />
                        <span class="hidden-xs"><?= $user['first_name'] ?> <?= $user['last_name'] ?></span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow"></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'profil']) ?>">Profil</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Email', 'action' => 'index']) ?>" target="_blank"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
                        <li><a href="http://localhost/dashboard.php?id_user=1">Serveur</a></li>
                        <li class="divider"></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->

    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar user -->
            <ul class="nav">
                <li class="nav-profile">
                    <div class="image">
                        <a href="javascript:;"><img src="<?= $user['picture'] ?>" alt="logo" /></a>
                    </div>
                    <div class="info">
                        <?= $user['first_name'] ?> <?= $user['last_name'] ?>
                        <small><?= $user['role'] ?></small>
                    </div>
                </li>
            </ul>
            <!-- end sidebar user -->
            <!-- begin sidebar nav -->
            <ul class="nav">
                <li class="nav-header">Navigation</li>
                <li class="has-sub active">
                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">
                        <i class="fa fa-laptop"></i>
                        <span>Tableau de Bord</span>
                    </a>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-university"></i>
                        <span>Etudes</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Etude', 'action' => 'formation']) ?>">Formation</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Etude', 'action' => 'examen_academique']) ?>">Examen Académique</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Etude', 'action' => 'etude_personnel']) ?>">Etude Personnel</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-archive"></i>
                        <span>Activités Professionnels</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'ActiviteProfessionnel', 'action' => 'tache']) ?>">Tâches</a></li>
                        <li class="has-sub"><a href="<?= $this->Url->build(['controller' => 'ActiviteProfessionnel', 'action' => 'evenement']) ?>">Evènements</a></li>
                    </ul>
                </li>
                <li><a href="<?= $this->Url->build(['controller' => 'Calendrier', 'action' => 'index']) ?>"><i class="fa fa-calendar"></i> <span>Emploie de Temps</span></a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Projet', 'action' => 'index']) ?>"><i class="fa fa-briefcase"></i> <span>Projets</span></a></li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-money"></i>
                        <span>Finances</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Finance', 'action' => 'actif']) ?>">Actifs</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Finance', 'action' => 'passif']) ?>">Passifs</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Finance', 'action' => 'stats']) ?>">Statisques</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="<?= $this->Url->build(['controller' => 'SuiviTache', 'action' => 'index']) ?>">
                        <i class="fa fa-bookmark"></i>
                        <span>Suivi de Tâches</span>
                    </a>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <span class="badge pull-right">0</span>
                        <i class="fa fa-inbox"></i>
                        <span>Email</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Email', 'action' => 'index']) ?>">Inbox</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Email', 'action' => 'edit']) ?>">Rédiger</a></li>
                    </ul>
                </li>
                <!-- begin sidebar minify button -->
                <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                <!-- end sidebar minify button -->
            </ul>
            <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->

    <!-- begin #content -->
    <div id="content" class="content">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
    <!-- end #content -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
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
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<?= $this->fetch('script') ?>
<?= $this->Html->script('admin/assets/js/apps.min.js') ?>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        DashboardV2.init();
    });
</script>
</body>
</html>
