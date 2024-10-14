<?= $this->extend('templateestudante/header') ?>

<?= $this->section('estudante') ?>
<title><?=lang('categorioPortfolio.categorioCategorio')?></title>
<?= $this->endSection() ?>

<?= $this->section('estudante') ?>
   <section class="py-5">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="<?= base_url('uploads/fotoestudante/'.helperEstudante()->image_estudante)?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                        <h4 class="mb-0 mt-2"><?=helperEstudante()->naran_ikus ?></h4>
                        <p class="text-muted font-14"><?=helperEstudante()->sistema ?></p>

                        <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
                        <button type="button" class="btn btn-danger btn-sm mb-2">Message</button>

                        <div class="text-start mt-3">
                            <h4 class="font-13 text-uppercase">About Me :</h4>
                            <p class="text-muted font-13 mb-3">
                                Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type.
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Full Name<span class="ms-2">:<?=helperEstudante()->naran_kompletos ?></span></strong></p>

                            <p class="text-muted mb-2 font-13"><strong>Email  <span class="ms-4"> :<?=helperEstudante()->emails ?></span></strong></p>
                            
                            <p class="text-muted mb-2 font-13"><strong>Mobile <span class="ms-3"> :<?=helperEstudante()->numero_telefone ?></span></strong></p>


                            <p class="text-muted mb-1 font-13"><strong>Location <span class="ms-2">:<?=helperEstudante()->fatin_moris ?></span></strong></p>
                        </div>

                        <ul class="social-list list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                            </li>
                        </ul>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->

                

            </div> <!-- end col-->

            <div class="col-xl-8 col-lg-7">
                <!-- Messages-->
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                        <h4 class="header-title mb-3"><?=lang('sidebarPortfolio.perguntasPortfolio') ?></h4>

                        <div class="inbox-widget">
                            <?php $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $no = 1 +(5 * ($page - 1));
                                foreach($valoresestudante as $portfolio): ?>
                                
                                
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="<?= base_url('uploads/fotoportfolio/'.$portfolio->image_administrator)?>" class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author"><small><?=$portfolio->naran_kompleto_professores ?></small>(<small class="text-danger"><?=$portfolio->data_valores_estudante ?></small>)</p>
                                    <p class="inbox-item-text"><small><?=substr($portfolio->soal_exame, 0,160) ?></small></p>
                                    
                                    <a href="<?= base_url(lang('profileEstudante.detailValoresEstudanteUrlPortofolio').$portfolio->id_valores) ?>" class="btn btn-sm text-primary font-20"> <i class="mdi mdi-android-messages"></i> </a>
                                        <strong align="center"><small><?= $portfolio->exame ?></small></strong>
                                        <strong align="center"><small><?= $portfolio->texte ?></small></strong>
                                </div>
                            <?php endforeach; ?>
                        </div> <!-- end inbox-widget -->
                        <small>
                            <div class="left" style="float: left;">
                            <span>Showing <?=  $no = 1 +(5 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
                        </div>
                        <div class="right" style="float: right;">
                            <?= $pager->links('default','pagination') ?>
                        </div>
                        </small>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row-->
    </section>
<?= $this->endSection() ?>