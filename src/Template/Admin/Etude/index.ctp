<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">Tableau de Bord</a></li>
    <li class="active">Etudes</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Etudes <small>Formations, Examens académiques, Etudes personnelles...</small></h1>
<!-- end page-header -->

<div class="row">
    <br>
    <hr>
    <div class="col-md-4 col-sm-6">
        <a href="<?= $this->Url->build(['controller' => 'Etude', 'action' => 'formation']) ?>">
            <div class="widget widget-stats bg-blue" style="height: 500px;">
                <div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
                <div class="stats-info">
                    <h4>FORMATIONS & CERTIFICATIONS</h4>
                    <p>20.44%</p>
                </div>
            </div>
        </a>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-4 col-sm-6">
        <a href="<?= $this->Url->build(['controller' => 'Etude', 'action' => 'examenAcademique']) ?>">
            <div class="widget widget-stats bg-purple" style="height: 500px;">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>EXAMENS ACADEMIQUES</h4>
                    <p>1,291,922</p>
                </div>
            </div>
        </a>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-4 col-sm-6">
        <a href="<?= $this->Url->build(['controller' => 'Etude', 'action' => 'etudePersonnel']) ?>">
            <div class="widget widget-stats bg-red" style="height: 500px;">
                <div class="stats-icon"><i class="fa fa-clock-o"></i></div>
                <div class="stats-info">
                    <h4>ETUDES PERSONNELLES</h4>
                    <p>00:12:23</p>
                </div>
            </div>
        </a>
    </div>
</div>