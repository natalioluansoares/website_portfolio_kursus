<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.saldoPrivado')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.saldoPrivado')?></h4>
            </div>
        </div>
    </div>
</div>
<a href="" class="btn btn-danger ms-1 mb-2 btn-animation" data-animation="wobble" data-toggle="modal" data-target=".hamoshotutotalsaldoestudante">
<i class="mdi mdi-broom"></i></a>
<a href="<?= base_url(lang('totalSaldoEstudante.totalSaldoEstudanteUrlPortfolio'))?>" class="btn btn-dark ms-1 mb-2"><i class="mdi mdi-skip-previous"></i></a>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <b>Success !</b>
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <b>Error !</b>
            <?= session()->getFlashdata('error') ?>
        </div>
    </div>
<?php endif; ?>
<div class="row row-cols-1 row-cols-md-3 g-3">
    <?php foreach($selukursus as $portfolio): ?>
        <div class="col">
            <div class="card">
                <img src="<?= base_url('uploads/fotosaldoprivado/'.$portfolio->foto_total_saldo_estudante)?>" class="card-img-top" alt="Card image cap" style="width: 100%; height:200px ;">
                <div class="card-body">
                    <?php if ($portfolio->naran_total_saldo_estudante) { ?>
                        <h5 class="card-title"><p class="card-text"><strong><?=lang('sidebarPortfolio.seluPortfolio') ?></strong></p></h5>  
                    <?php } ?>
                    <p class="card-text" title="<?=lang('saldoprivadoPortfolio.descripsaunSaldo') ?>"><?=$portfolio->descripsaun_total_saldo_estudante?></p>
                    <center>
                        <?php if ($portfolio->total_saldo_estudante) { ?>
                            <h3><strong>$ <?= number_format($portfolio->total_saldo_estudante,2)?></strong></h3>
                        <?php }else {?>
                            <p class="card-text" style="color: red;"><strong><?=lang('saldoprivadoPortfolio.mamukSaldo') ?></strong></p>
                        <?php } ?>
                        <p class="card-text">
                            <small class="text-muted">(<?=$portfolio->data_total_saldo_estudante ?>)</small>
                        </p>
                    </center><br>
                    <center>
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <a href="" class="btn btn-danger btn-animation" data-animation="slideInRight" data-toggle="modal" data-target=".permanentetotalsaldoestudante" id="totalsaldoestudantepermanente" 
                                        data-id="<?= $portfolio->id_total_saldo_estudante; ?>">
                                        <i class="uil-trash"></i>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="" class="btn btn-warning btn-animation" data-animation="slideInLeft" data-toggle="modal" data-target=".hamostotalsaldoestudante" id="temporariototalsaldoestudante" 
                                        data-id="<?= $portfolio->id_total_saldo_estudante; ?>">
                                        <i class="mdi mdi-broom"></i>
                                            </a>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php foreach($donatorkursus as $portfolio): ?>
        <div class="col">
            <div class="card">
                <img src="<?= base_url('uploads/fotosaldoprivado/'.$portfolio->foto_total_saldo_estudante)?>" class="card-img-top" alt="Card image cap" style="width: 100%; height:200px ;">
                <div class="card-body">
                    <?php if ($portfolio->naran_total_saldo_estudante) { ?>
                        <h5 class="card-title"><p class="card-text"><strong><?=lang('sidebarPortfolio.donatorKursusPortfolio') ?></strong></p></h5>  
                    <?php } ?>
                    <p class="card-text" title="<?=lang('saldoprivadoPortfolio.descripsaunSaldo') ?>"><?=$portfolio->descripsaun_total_saldo_estudante?></p>
                    <center>
                        <?php if ($portfolio->total_saldo_estudante) { ?>
                            <h3><strong>$ <?= number_format($portfolio->total_saldo_estudante,2)?></strong></h3>
                        <?php }else {?>
                            <p class="card-text" style="color: red;"><strong><?=lang('saldoprivadoPortfolio.mamukSaldo') ?></strong></p>
                        <?php } ?>
                        <p class="card-text">
                            <small class="text-muted">(<?=$portfolio->data_total_saldo_estudante ?>)</small>
                        </p>
                    </center><br>
                    <center>
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                            <a href="" class="btn btn-danger btn-animation" data-animation="slideInRight" data-toggle="modal" data-target=".permanentetotalsaldoestudante" id="totalsaldoestudantepermanente" 
                                            data-id="<?= $portfolio->id_total_saldo_estudante; ?>">
                                            <i class="uil-trash"></i>
                                            </a>
                                        </th>
                                        <th>
                                            <a href="" class="btn btn-warning btn-animation" data-animation="slideInLeft" data-toggle="modal" data-target=".hamostotalsaldoestudante" id="temporariototalsaldoestudante" 
                                            data-id="<?= $portfolio->id_total_saldo_estudante; ?>">
                                            <i class="mdi mdi-broom"></i>
                                                </a>
                                        </th>
                                </tr>
                            </thead>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div> <!-- end col-->
</div>
<!-- Hamos Permanente -->
<div class="modal fade permanentetotalsaldoestudante" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('totalSaldoEstudante.permanenteTotalSaldoEstudanteUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE"> 
                        <input type="hidden" name="id" id="idprivado" placeholder="Kategori"class="form-control">
                    </center>
                    <center>
                        <button type="submit" class="btn btn-primary"><?=lang('hamosPortfolio.hamosData') ?></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?=lang('hamosPortfolio.batalData') ?></button>
                </center>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Hamos Temporario -->
<div class="modal fade hamostotalsaldoestudante" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('totalSaldoEstudante.temporarioTotalSaldoEstudanteUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.temporarioData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idhamos" placeholder="Kategori"class="form-control">
                    </center>
                    <center>
                        <button type="submit" class="btn btn-primary"><?=lang('hamosPortfolio.hamosData') ?></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?=lang('hamosPortfolio.batalData') ?></button>
                </center>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Hamos Hotu Temporario -->
<div class="modal fade hamoshotutotalsaldoestudante" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('totalSaldoEstudante.hamoshotuTotalSaldoEstudanteUrlPortfolio')) ?>" method="get">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.hamostemporarioData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                    </center>
                    <center>
                        <button type="submit" class="btn btn-primary"><?=lang('hamosPortfolio.hamosData') ?></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?=lang('hamosPortfolio.batalData') ?></button>
                </center>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url()?>templateadministrator/assets/js/js/jquery.min.js"></script>
<script>
    $(document).on("click", "#totalsaldoestudantepermanente", function() {
    var Id = $(this).data('id');

    $(".permanentetotalsaldoestudante #idprivado").val(Id);
})
</script>

<script>
    $(document).on("click", "#temporariototalsaldoestudante", function() {
    var Id = $(this).data('id');
    $(".hamostotalsaldoestudante #idhamos").val(Id);
})
</script>
<?= $this->endSection() ?>