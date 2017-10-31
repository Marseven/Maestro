<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Tableau de Bord</a></li>
    <li><a href="javascript:;">Utilisateur</a></li>
    <li class="active">Profil</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Profil</h1>
<!-- end page-header -->
<!-- begin profile-container -->
<div class="profile-container">
    <!-- begin profile-section -->
    <div class="profile-section">
        <!-- begin profile-left -->
        <div class="profile-left">
            <!-- begin profile-image -->
            <div class="profile-image">
                <img src="<?= $user['picture'] ?>" />
                <i class="fa fa-user hide"></i>
            </div>
            <!-- end profile-image -->
            <div class="m-b-10">
                <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'edit', 'user' => $user['id']]) ?>" class="btn btn-warning btn-block btn-sm">Mettre à Jour</a>
            </div>
        </div>
        <!-- end profile-left -->
        <!-- begin profile-right -->
        <div class="profile-right">
            <!-- begin profile-info -->
            <div class="profile-info">
                <!-- begin table -->
                <div class="table-responsive">
                    <table class="table table-profile">
                        <thead>
                        <tr>
                            <th></th>
                            <th>
                                <h4><?= $user['first_name'] ?> <?= $user['last_name'] ?> <small><?= $user['role'] ?></small></h4>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="divider">
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="field">Mobile</td>
                            <td><i class="fa fa-mobile fa-lg m-r-5"></i> <?= $user['phone'] ?></td>
                        </tr>
                        <tr>
                            <td class="field">Adresse</td>
                            <td><i class="fa fa-map-marker fa-lg m-r-5"></i> <?= $user['adress'] ?></td>
                        </tr>
                        <tr>
                            <td class="field">Email</td>
                            <td><i class="fa fa-envelope fa-lg m-r-5"></i> <?= $user['email'] ?></td>
                        </tr>
                        <tr class="divider">
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="field">Ville</td>
                            <td><i class="fa fa-location-arrow fa-lg m-r-5"></i> <?= $user['town'] ?></td>
                        </tr>
                        <tr>
                            <td class="field">Langue</td>
                            <td>Fançais</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table -->
            </div>
            <!-- end profile-info -->
        </div>
        <!-- end profile-right -->
    </div>
    <!-- end profile-section -->
    <!-- begin profile-section -->
    <div class="profile-section">
        <!-- begin row -->
        <div class="row">
            <!-- begin col-4 -->
            <div class="col-md-4">
                <h4 class="title">Tâches <small><?= $nbreTache ?> en cour</small></h4>
                <!-- begin scrollbar -->
                <div data-scrollbar="true" data-height="280px" class="bg-silver">
                    <!-- begin todolist -->
                    <ul class="todolist">
                        <?php foreach($taches as $tache){ ?>
                        <li class="">
                            <a href="javascript:;" class="todolist-container active" data-click="todolist">
                                <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                                <div class="todolist-title"><?= $tache->titre ?></div>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                    <!-- end todolist -->
                </div>
                <!-- end scrollbar -->
            </div>
            <!-- end col-4 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end profile-section -->
</div>
<!-- end profile-container -->