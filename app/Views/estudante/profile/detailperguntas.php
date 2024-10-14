<?= $this->extend('templateestudante/header') ?>

<?= $this->section('estudante') ?>
<title><?=lang('categorioPortfolio.categorioCategorio')?></title>
<?= $this->endSection() ?>

<?= $this->section('estudante') ?>
   <section class="py-5">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="<?= base_url('uploads/fotoportfolio/'.$valores->image_administrator)?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                        <h4 class="mb-0 mt-2"><?=$valores->naran_kompleto_professores ?></h4><br>
                        <p>
                            <button type="button" class="btn btn-success btn-sm mb-2"><?=$valores->sistema ?></button>
                        </p>

                        <div class="text-start mt-3">
                            <?php if ($valores->exame=='TPC') { ?>
                                <h4 class="font-20 text-uppercase"><?=$valores->exame ?> (<?=$valores->materia_kursus ?>/<?=$valores->level_materia_kursus ?>)</h4>
                            <?php } ?>
                            <?php if ($valores->exame=='Texte') { ?>
                                <h4 class="font-20 text-uppercase"><?=$valores->texte ?> (<?=$valores->materia_kursus ?>/<?=$valores->level_materia_kursus ?>)</h4>
                            <?php } ?>
                            <p class="text-muted font-13 mb-3">
                                <?=$valores->soal_exame ?> 
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Full Name<span class="ms-2">:<?=helperEstudante()->naran_kompletos ?></span></strong></p>
                            <?php if ($valores->total_valores == null) {?>
                                <p class="text-muted mb-2 font-13"><strong><?= lang('valoresEstudanteFunsionario.valoresEstudante') ?><span class="ms-4 text-danger"> :<?= lang('valoresEstudanteFunsionario.mamukEstudante') ?></span></strong></p>
                            <?php }else {?>
                                <p class="text-muted mb-2 font-13"><strong><?= lang('valoresEstudanteFunsionario.valoresEstudante') ?><span class="ms-4"> :<?=$valores->total_valores ?></span></strong></p>
                            <?php } ?>

                            <p class="text-muted mb-2 font-13"><strong>Email  <span class="ms-4"> :<?=helperEstudante()->emails ?></span></strong></p>
                            
                            <p class="text-muted mb-2 font-13"><strong>Mobile <span class="ms-3"> :<?=helperEstudante()->numero_telefone ?></span></strong></p>


                            <p class="text-muted mb-1 font-13"><strong>Location <span class="ms-2">:<?=helperEstudante()->fatin_moris ?></span></strong></p>
                        </div>


                        <ul class="social-list list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="<?= base_url(lang('profileEstudante.valoresEstudanteUrlPortofolio')) ?>" class="social-list-item border-primary text-primary"><i class="mdi mdi-keyboard-backspace"></i></a>
                            </li>
                        </ul>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>
        <!-- end row-->
    </section>
<?= $this->endSection() ?>