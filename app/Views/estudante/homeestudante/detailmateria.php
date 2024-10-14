<?= $this->extend('templateestudante/header') ?>

<?= $this->section('estudante') ?>
    <title><?=lang('categorioPortfolio.categorioCategorio')?></title>
<?= $this->endSection() ?>

<?= $this->section('estudante') ?>
 <!-- START HERO -->

    <!-- START SERVICES -->
    <section class="py-5">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="mt-0"><i class="mdi mdi-infinity"></i></h1>
                        <h3><?=lang('homeEstudante.funsionarioEstudante')?></h3></h3>
                        <p class="text-muted mt-2"><?=lang('homeEstudante.informasaunFunsionarioEstudante')?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-success border">
                        <div class="card-body">
                            <div class="m-auto">
                                <span class="rounded-circle">
                                    <img src="<?= base_url('uploads/fotoportfolio/'.$row->image_administrator)?>" style="width: 80px; height: 9vh;" class="img-fluid rounded-circle mb-1" alt="">
                                </span>
                                <h4 class="text-muted mt-0 mb-4"><?= $row->naran_kompleto?></h4>
                                <h4 class="text-muted mt-0 mb-0"><?= $row->categorio?>/<?= $row->kode_categorio?></h4><br>
                            </div>
                            <?php foreach($materia as $pro): ?>
                            <h4 class="text-muted mt-0 mb-0"><?= $pro->titulo_materia?></h4>
                            <?= $pro->materia?>
                            <?php endforeach; ?>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
        </div>
    </section>
    <!-- END SERVICES -->


<?= $this->endSection() ?>