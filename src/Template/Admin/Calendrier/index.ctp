<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
<?= $this->Html->css('fullcalendar.css', ['block' => true]) ?>
<?= $this->Html->css('admin/assets/plugins/gritter/css/jquery.gritter.css', ['block' => true]) ?>
<style type="text/css">
    table th{
        padding: 5px;
        border: 2px groove black;
        width: 75px;
        height: 25px;
    }
    table td{
        padding:5px;
        text-align: center;
    }
    .today{
        color: red;
    }
    .day{
        color: #1616ff;
    }
    .dimanche{
        color: rgba(135, 135, 137, 0.61);
    }
    a{
        color: black;
    }
    a:hover{
        color: black;
    }
</style>
<!-- ================== END PAGE LEVEL CSS STYLE ================== -->

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">Tableau de Bord</a></li>
    <li class="active">Calendrier</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Emploie de Temps <small>Toutes les dates importantes sont ici...</small></h1>
<!-- end page-header -->
<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Calendar</h4>
    </div>
    <div class="panel-body p-0">
        <div class="row">
            <div class="col-xs-3" style="padding-left: 20px; max-height: 700px;">
                <h3>Liste des évènements</h3>
                <hr>
                <?php if(!$evenements->first()){ ?>
                    <div style="text-align: center;" class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class=" fa fa-times"></i>
                        </button>
                        Pas D'Evènement Pour Le Moment !
                    </div>
                <?php } ?>
                <?php foreach($evenements as $evenement){ ?>
                    <div class="external-event bg-green" data-bg="bg-green" data-title="Brainstorming" data-media="<i class='fa fa-lightbulb-o'></i>" data-desc="Mauris tristique massa eu venenatis semper. Phasellus a nibh nisi.">
                        <h5><?= $evenement->libelle ?></h5>
                        <p>
                            <a href="<?= $this->Url->build(['controller' => 'Calendrier', 'action' => 'delete', 'evenement' => $evenement->id]) ?>"><i class="fa fa-trash"></i></a>
                        </p>
                    </div>
                <?php } ?>
            </div>
            <div class="col-xs-8">
                <br>
                <div id="calendar" class="fc fc-ltr fc-unthemed">
                    <div class="fc-toolbar">
                        <div class="fc-left">
                            <div class="fc-button-group">
                                <a href="?firstday=<?= $prev_month ?>"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left">
                                        <span class="fc-icon fc-icon-left-single-arrow"></span>
                                    </button>
                                    <a href="?firstday=<?= $next_month ?>"><button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right">
                                            <span class="fc-icon fc-icon-right-single-arrow"></span>
                                        </button></a>
                            </div>
                            <a href="?firstday=<?=  $aujourdhui->format("Y-m-d") ?>" ><button type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right">today</button></a>
                        </div>
                        <div class="fc-center"><h2><?= $formatter_mois->format($firstDay).' '.$firstDay->format('Y') ?></h2></div>
                        <div class="fc-clear"></div>
                    </div>

                    <div class="fc-view-container" style="">
                        <div class="fc-view fc-month-view fc-basic-view">
                            <table>
                                <thead>
                                <tr>
                                    <td class="fc-widget-header">
                                        <div class="fc-row fc-widget-header">
                                            <table>
                                                <thead>
                                                <tr>
                                                    <?php
                                                    foreach(new DatePeriod($dateInitWeek, $intervalInitWeek, $endInitWeek) as $jour){
                                                        if($jour->format("w")==0){
                                                            echo "<th class=\"fc-day-header fc-widget-header dimanche\">",$formatter_semaine->format($jour),"</th>";
                                                        }else{
                                                            echo "<th class=\"fc-day-header fc-widget-header \">",$formatter_semaine->format($jour),"</th>";
                                                        }
                                                    }
                                                    ?>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 0;
                                foreach($iterateur as $jour){
                                    if($i == 0){
                                        ?>
                                        <tr>
                                            <td class="fc-widget-content">
                                                <div class="fc-day-grid-container">
                                                    <div class="fc-day-grid">
                                                        <div class="fc-row fc-week fc-widget-content" style="height: 115px;">
                                                            <div class="fc-bg">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <?php } ?>
                                                                            <?php if($jour->format("Y-m-d") == $aujourdhui->format("Y-m-d")){ ?>
                                                                                <td class="fc-day fc-widget-content fc-sun " data-date="<?= $jour->format("Y-m-d") ?>" style="text-align: right">
                                                                                    <a href="#modal-dialog" data-toggle="modal"><span class="fc-day-number fc-widget-content fc-sun day" data-date="<?= $jour->format("Y-m-d") ?>"><?= $jour->format("d") ?></span></a>
                                                                                    <br>
                                                                                    <?php foreach($evenementspro as $evenementpro){ ?>
                                                                                        <?= $evenementpro->debut->format("Y-m-d") == $jour->format("Y-m-d") ? "<span>$evenementpro->libelle</span><br>" : "" ?>
                                                                                    <?php } ?>
                                                                                    <?php foreach($evenements as $evenement){ ?>
                                                                                        <?= $evenement->debut->format("Y-m-d") == $jour->format("Y-m-d") ? "<span>$evenement->libelle</span><br>" : "" ?>
                                                                                    <?php } ?>
                                                                                </td>
                                                                            <?php }elseif($jour->format("w")==0){ ?>
                                                                                <td class="fc-day fc-widget-content fc-sun" data-date="<?= $jour->format("Y-m-d") ?>" style="text-align: right">
                                                                                    <a href="#modal-dialog" data-toggle="modal"><span class="fc-day-number fc-widget-content fc-sun today" data-date="<?= $jour->format("Y-m-d") ?>"><?= $jour->format("d") ?></span></a>
                                                                                    <br>
                                                                                    <?php foreach($evenementspro as $evenementpro){ ?>
                                                                                        <?= $evenementpro->debut->format("Y-m-d") == $jour->format("Y-m-d") ? "<span>$evenementpro->libelle</span><br>" : "" ?>
                                                                                    <?php } ?>
                                                                                    <?php foreach($evenements as $evenement){ ?>
                                                                                        <?= $evenement->debut->format("Y-m-d") == $jour->format("Y-m-d") ? "<span>$evenement->libelle</span><br>" : "" ?>
                                                                                    <?php } ?>
                                                                                </td>
                                                                            <?php  }else{ ?>
                                                                                <td class="fc-day fc-widget-content fc-sun" data-date="<?= $jour->format("Y-m-d") ?>" style="text-align: right">
                                                                                    <a href="#modal-dialog" data-toggle="modal"><span class="fc-day-number fc-widget-content fc-sun" data-date="<?= $jour->format("Y-m-d") ?>"><?= $jour->format("d") ?></span></a>
                                                                                    <br>
                                                                                    <?php foreach($evenementspro as $evenementpro){ ?>
                                                                                        <?= $evenementpro->debut->format("Y-m-d") == $jour->format("Y-m-d") ? "<span>$evenementpro->libelle</span><br>" : "" ?>
                                                                                    <?php } ?>
                                                                                    <?php foreach($evenements as $evenement){ ?>
                                                                                        <?= $evenement->debut->format("Y-m-d") == $jour ->format("Y-m-d")? "<span>$evenement->libelle</span><br>" : "" ?>
                                                                                    <?php } ?>
                                                                                </td>
                                                                            <?php  } ?>
                                                                            <?php $i++;
                                                                            $i %=7;
                                                                            if($i == 0){
                                                                                ?>

                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php   }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>

    <!-- #modal-dialog -->
    <div class="modal modal-message fade" id="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Crée un évènement</h4>
                </div>
                <div class="modal-body">
                    <?= $this->form->create('Evenement', ['url' => ['controller' => 'Calendrier', 'action' => 'add']]); ?>
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
                        <label class="col-md-3 control-label">Priorité de l'évènement</label>
                        <div class="col-md-9">
                            <?= $this->form->input('priorite', array(
                                'class' => 'form-control',
                                'options' => [
                                    'Normal' => 'Normal',
                                    'Important' => 'Important',
                                    'Optionnel' => 'Optionnel',
                                ],
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
                                'name' => 'new',
                            )); ?>
                        </div>
                    </div>
                    <?= $this->form->end(); ?>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <?= $this->Html->script('admin/assets/plugins/gritter/js/jquery.gritter.js', ['block' => true]) ?>
    <?= $this->Html->script('admin/assets/js/ui-modal-notification.demo.min.js', ['block' => true]) ?>
<!-- ================== END PAGE LEVEL JS ================== -->