<?= $this->extend('templateestudante/header') ?>

<?= $this->section('estudante') ?>
<title><?=lang('categorioPortfolio.categorioCategorio')?></title>
<?= $this->endSection() ?>

<?= $this->section('estudante') ?>
    <section class="py-5">
        <div class="row">

            <div class="col-xl-6 col-lg-6">
                <div class="card text-center">
                    <div class="card-body">
                        
                        <img src="<?= base_url('uploads/fotoportfolio/'.$valores->image_administrator)?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                        <h4 class="mb-0 mt-2"><?=$valores->naran_kompleto_professores ?></h4><br>
                        <p>
                            <button type="button" class="btn btn-success btn-sm mb-2"><?=$valores->sistema ?></button>
                        </p>
                        
                        <div class="text-start mt-3 ms-5" style="margin-right: 8%;">
                            <h4 class="font-20 text-uppercase"><?=$valores->materia_kursus ?>/<?=$valores->level_materia_kursus ?></h4>
                        </div>
                        <div class="text-start mt-3 ms-5" style="margin-right: 8%;">

                            <p class="text-muted mb-2 font-13"><strong>Full Name<span class="ms-2">:<?=helperEstudante()->naran_kompletos ?></span></strong></p>
                            <?php 
                                $jumlah_data = count($valoresestudante);
                                if ($jumlah_data > 0 )
                            { ?>
                            <?php $total=0; foreach($valoresestudante as $valor): ?>
                             
                            <?php if ($valor->texte == 'Texte I') {?>
                                <p class="text-muted mb-2 font-13"><strong><?= lang('valoresEstudanteFunsionario.textePrimeiroEstudante') ?><span class="ms-4"> :<?=$valor->total_valores ?></span></strong></p>
                            <?php } elseif ($valor->texte == 'Texte II') {?>
                                <p class="text-muted mb-2 font-13"><strong><?= lang('valoresEstudanteFunsionario.texteSegundoEstudante') ?><span class="ms-4">:<?=$valor->total_valores ?></span></strong></p>
                            <?php } elseif ($valor->texte == 'Texte III') {?>
                                <p class="text-muted mb-2 font-13"><strong><?= lang('valoresEstudanteFunsionario.texteTerceiroEstudante') ?><span class="ms-3">     :<?=$valor->total_valores ?></span></strong></p>
                            <?php }elseif ($valor->texte == 'Texte IV') { ?>
                                <p class="text-muted mb-2 font-13"><strong><?= lang('valoresEstudanteFunsionario.texteQuatroEstudante') ?><span class="ms-3"> :<?=$valor->total_valores ?></span></strong></p>
                            <?php  }?>
                            <?php 
                            $total += $valor->total_valores/4;
                            endforeach; ?>
                            <?php if ($total >= 7.5) { ?>
                                <p class="mb-2 font-16" style="color:dimgrey"><strong><?= lang('valoresEstudanteFunsionario.totalEstudante') ?><span class="ms-3"> :<?=$total ?></span></strong><strong class="ms-2">MUITO BOM</strong></p>
                            <?php }elseif ($total >= 6) {?>
                                <p class="mb-2 font-16" style="color:dimgrey"><strong><?= lang('valoresEstudanteFunsionario.totalEstudante') ?><span class="ms-3"> :<?=$total ?></span></strong><strong class="ms-2">BOM</span></strong></p>
                            <?php } ?>
                            <?php }else{ ?>
                                <div class="table-responsive">
                                    <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
                                </div>
                            <?php } ?>
                            </div>

                        <ul class="social-list list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="<?= base_url(lang('valoresEstudanteFunsionario.pdfValoresEstudanteUrlPortofolio').$valores->id_horario_estudante ) ?>" target="_blank" class="social-list-item border-primary text-primary"><i class="mdi mdi-download-outline"></i></a>
                            </li>
                        </ul>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col-->

            <div class="col-xl-6 col-lg-6">
                <div class="card text-center">
                    <div class="card-body">

                        <h4 class="mb-0 mt-2"><?=$valores->naran_kompleto_professores ?></h4><br>
                        <p>
                            <button type="button" class="btn btn-primary btn-sm mb-2"><?=$valores->sistema ?></button>
                        </p>
                        
                        <div class="text-start mt-3 ms-5" style="margin-right: 8%;">
                            <h4 class="font-20 text-uppercase">Absensi</h4>
                        </div>
                        <div class="text-start mt-3 ms-5" style="margin-right: 8%;">

                            <p class="text-muted mb-2 font-13"><strong>Full Name<span class="ms-2">:<?=helperEstudante()->naran_kompletos ?></span></strong></p>
                             <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="text-success"><?= lang('valoresEstudanteFunsionario.tamaEstudante') ?></th>
                                        <th class="text-danger"><?= lang('valoresEstudanteFunsionario.laTamaEstudante') ?></th>
                                        <th class="text-warning"><?= lang('valoresEstudanteFunsionario.lisensaEstudante') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-success"><a href="<?=base_url(lang('valoresEstudanteFunsionario.detailAbsensiEstudanteUrlPortofolio').$estudante->data_horario_hahu.'/'.$estudante->data_horario_remata.'/'.$estudante->id_horario_estudante.'/'.$estudante->materia_kursus.'/'.$estudante->level_materia_kursus.'/'.'Tama') ?>"><?=$sumtama; ?></a></td>

                                        <td class="text-danger"><a href="<?=base_url(lang('valoresEstudanteFunsionario.detailAbsensiEstudanteUrlPortofolio').$estudante->data_horario_hahu.'/'.$estudante->data_horario_remata.'/'.$estudante->id_horario_estudante.'/'.$estudante->materia_kursus.'/'.$estudante->level_materia_kursus.'/'.'La Tama') ?>"><?=$sumlatama; ?></a></td>


                                        <td class="text-warning"><a href="<?=base_url(lang('valoresEstudanteFunsionario.detailAbsensiEstudanteUrlPortofolio').$estudante->data_horario_hahu.'/'.$estudante->data_horario_remata.'/'.$estudante->id_horario_estudante.'/'.$estudante->materia_kursus.'/'.$estudante->level_materia_kursus.'/'.'Lisensa') ?>"><?=$sumlisensa; ?></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <ul class="social-list list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="<?= base_url(lang('valoresEstudanteFunsionario.valoresEstudanteUrlPortofolio')) ?>" class="social-list-item border-primary text-primary"><i class="mdi mdi-keyboard-backspace"></i></a>
                            </li>
                        </ul>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>
        <!-- end row-->
    </section>
<?= $this->endSection() ?>