<!DOCTYPE html>
<html>

<head>
    <title><?=lang('sidebarPortfolio.hotuHorarioPortfolio')?></title>
    <style type="text/css">
        .border-table{
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
            font-family: 'Times New Roman', Times, serif;
        }
        .border-table th{
            border: 1 solid #000;
            font-weight: bold;
            font-size: 16px;
            text-align: center;
            background-color: #e1e1e1;
        }
        .border-table td{
            border: 1 solid #000;
            color: #000;
        }
    </style>
</head>
<body>
    <center>
        <table width ="100%">
            <thead>
                <tr>
                    <!-- <th align="center">
                        <img src="uploads/img/logo.jpg" class="rounded-circle" width="80px"> -->
                    <!-- </th> -->
                    <th data-priority="1">
                        <div align="center" style="font-size: 18px;">
                            <font size="4" style="font-family:Wide Latin">
                                <b>Website Haburas Matenek Liu Husi Kursus Timor-Leste</b><br>
                                <span style="font-family:Times New Roman">Bairo Pite, Dili, Timor-Leste <br>
                                Telp.(0380)833395- 831194</span>
                            </font><br>
                            Web:<span style="font-family:Times New Roman; color:#3366cc">
                               http//www.wehamak-tl.ac.id</span>
                            Email:<span style="font-family:Times New Roman; color:#3366cc">
                               bairopite.websitehaburasmatenekliuhusikursus@gmail.com</span>
                            <hr class="line-title">
                        </div>
                    </th>
                    <!-- <th align="center"> -->
                        <!-- <img src="template/assets/img/sigaru/TimorLeste.png" class="rounded-circle" width="80px"> -->
                    <!-- </th> -->
                </tr>
            </thead>
        </table>
    </center>
    <center>
        <p>
           <h3><strong><?=lang('sidebarPortfolio.hotuHorarioPortfolio')?></strong></h3><br>
        </p>
    </center>
        <table class="border-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th><strong><?=lang('classePortfolio.classeClasse') ?></strong></th>
                    <th><strong><?=lang('materiaProfessores.kodeMateria') ?></strong></th>
                    <th><strong><?=lang('materiaProfessores.materiaMateria') ?></strong></th>
                    <th style="width: 12%;"><strong><?=lang('materiaProfessores.materiaProfessores') ?></strong></th>
                    <th class="text-center"><strong><?=lang('materiaProfessores.levelMateria') ?></strong></th>
                    <th><strong><?=lang('horarioProfessores.loronHorario') ?></strong></th>
                    <th><strong><?=lang('horarioProfessores.tempoHorario') ?></strong></th>
                    <th><strong><?=lang('horarioProfessores.osanHorario') ?></strong></th>
                    <th><strong><?=lang('horarioProfessores.horasMateria') ?></strong></th>
                    <th><strong><?=lang('horarioProfessores.dataMateria') ?></strong></th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1; foreach($horarioprofessores as $portfolio): ?>
                    <tr>
                        <td align="center"><?=$no++?></td>
                        <td align="center"><small><?=$portfolio->classe?></small></td>
                        <td align="center"><small><?=$portfolio->kode_materia_professores?></small></td>
                        <td align="center"><small><?=$portfolio->materia_kursus?></small></td>
                        <td align="center"><small><?=$portfolio->naran_kompleto ?>.<?=$portfolio->titulo_professores ?></small></td>
                        <td align="center"><strong><small class="text-center"><span><?=$portfolio->level_materia_kursus ?></span></small></strong></td>

                        <!-- Segunda-Feira -->
                        <?php if($portfolio->loron_horario == 'Segunda-Feira/Terca-Feira'){ ?>
                            <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?></small></td>

                        <?php }elseif($portfolio->loron_horario == 'Terca-Feira') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.tercaHorario') ?></small></td>

                        <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quarta-Feira') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?></small></td>

                        <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quinta-Feira') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                        <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Sexta-Feira') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                        <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Sabado') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                        <!-- Terca-Feira -->
                        <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Quarta-Feira') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?></small></td>

                        <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Quinta-Feira') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                        <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Sexta-Feira') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                        <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Sabado') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                        <?php }elseif($portfolio->loron_horario == 'Quarta-Feira/Quinta-Feira') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                        <?php }elseif($portfolio->loron_horario == 'Quarta-Feira/Sexta-Feira') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                        <?php }elseif($portfolio->loron_horario == 'Quarta-Feira/Sabado') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                        <!-- Quinta Feira -->
                        <?php }elseif($portfolio->loron_horario == 'Quinta-Feira/Sexta-Feira') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                        
                        <?php }elseif($portfolio->loron_horario == 'Quinta-Feira/Sabado') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                        <!-- Sexta-Feira -->
                        <?php }elseif($portfolio->loron_horario == 'Sexta-Feira/Sabado') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.sextaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                        
                        <!--Segunda-Feira/Quarta-Feira/Sexta-Feira-->
                        <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quarta-Feira/Sexta-Feira') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                        
                        <!--Terca-Feira/Quinta-Feira/Sabado-->
                        <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Quinta-Feira/Sabado') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                        
                        <!--Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira-->
                        <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                        
                        <!--Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado-->
                        <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                        
                        <!--Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado-->
                        <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                        
                        <?php } ?>

                        <?php if($portfolio->total_horario == 'Semana I Kompleto'){ ?>
                            <td align="center"><small><?=lang('horarioProfessores.kompletoHorario') ?></small></td>
                        <?php }elseif($portfolio->total_horario == 'Semana Dala II') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.semanaIIHorario') ?></small></td>
                        <?php }elseif($portfolio->total_horario == 'Semana Dala III') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.semanaIIIHorario') ?></small></td>
                        <?php }elseif($portfolio->total_horario == 'Semana Dala IV') { ?>
                            <td align="center"><small><?=lang('horarioProfessores.semanaIVHorario') ?></small></td>
                        <?php } ?>
                        <td align="center"><strong><small class="text-center"><span class="badge badge-warning">$ <?= number_format($portfolio->osan_kursus,2)?></span></small></strong></td>
                        <td align="center"><small><?=$portfolio->horas_tama_kursus ?> / <?=$portfolio->horas_sai_kursus ?></small></td>
                        <td align="center"><small><?=$portfolio->data_horario_hahu ?> / <?=$portfolio->data_horario_remata ?></small></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
        </table><br><br>
        <table>
            <thead>
            <tr>
                <th></th>
                <th colspan=""><strong>Dili, <?= date('Y-M-d')?></strong></th>
                <th width="450"><strong>Dili, <?= date('Y-M-d')?></strong></th>
            </tr>
                <tr>
                    <th width="" style="margin-right:4;"></th>
                    <th colspan="" width="300" style="margin-left:4">Prepara Husi</th>
                <th colspan="1" align="center">Aprova Husi</th>
            </tr>
            </thead>
        </table><br><br><br><br> 
        <table class="soares">
        <thead>
          <tr>
            <th width=""></th>
              <th width="300"><u><?= helperFunsionario()->naran_kompleto ?></u></th>
              <?php foreach($administrator as $portfolio): ?>
              <th width="450"><u><?= $portfolio->naran_kompleto ?></u></th>
              <?php endforeach;?>
        </tr>
        <tr>
            <th></th>
                <th colspan="" width="259">Prepara Husi</th>
            <th colspan="1" align="center">Aprova Husi</td>
          </tr>
        </thead>
      </table>
</body>

</html