<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.categoriaPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('funsionario') ?>
<?php if (session()->sistema_administrator == 2) : ?>
<?php
    $naran = helperFunsionario()->naran_kompleto;
    $this->db = \Config\Database::connect();
    $builder = $this->db->table('direito_acesso_autromos');
    $builder->select('*');
    $builder->join('direito_acesso', 'direito_acesso_autromos.direito_accesso_id  = direito_acesso.id_direito_acesso', 'total_saldo', 'total_osan_tama','salario_funsionario','salario_professores', 'osan_impresta_funsionario', 'osan_impresta_professores', 'funsionario', 'professores', 'materia_professores', 'estudante', 'kategorio_materia', 'materia', 'kursus_projeito', 'classe', 'horario_kursus', 'horario_kursus_hotu',  'left');
    
    $builder->join('menu_acesso', 'direito_acesso.id_administrator_acesso  = menu_acesso.id_menu_acesso', 'menu_profile', 'sistemmenu_finansa','menu_funsionario','menu_profesores','menu_estudante','menu_kategoria_materia','menu_kursus_projeito','menu_classe_horario', 'menu_sertifikado','left');

    $builder->join('administrator', 'menu_acesso.menu_administrator  = administrator.id_administrator', 'naran_kompleto', 'naran_ikus','naran_primeiro','email', 'status_servisu', 'left');

    $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'kode_sistema', 'sistema','left');
    $builder->where('id_administrator', session('id_administrator'));
    $builder->where('naran_kompleto=', $naran);
    $query = $builder->get()->getResult(); 
?>
<?php foreach($query as $acesso): ?>
<?php if ($acesso->kategorio_materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" name="start">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" name="end">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary mr-2" name="filter-data">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="app-search dropdown">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Search..." id="top-search">
                            <button class="input-group-text mr-2" style="background-color: cornflowerblue;" type="submit"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                            <?php if ($acesso->aumenta_direito_acesso_autromos == 1 && $acesso->kategorio_materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
                            <a href="<?= base_url(lang('sciensieCategoryFunsionario.aumentaSciensieCategoryFunsionarioUrlPortfolio')) ?>" class="btn" style="background-color: darkslateblue;color:aliceblue"><i class="fa fa-plus"></i></a>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <h4 class="card-title"><strong><?=lang('sidebarPortfolio.categoriaPortfolio')?></strong></h4>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Success !</b>
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Error !</b>
            <?= session()->getFlashdata('error') ?>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $no = 1 +(10 * ($page - 1));
    ?>
    <?php foreach($categorio as $portfolio): ?>
    <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-6">
        <div class="card">
            <img class="img-fluid" src="<?= base_url('uploads/fotocategoriomateria/'.$portfolio->imagem_categorio)?>" alt="" style="width: 100%;height: 30vh;">
            <div class="card-body">
                <center>
                    <h4><strong><u><?= $portfolio->categorio ?></u></strong></h4>
                </center>
                
                <h5><strong># <?=lang('categorioPortfolio.descripsaunCategorio') ?><sub>(<?=$portfolio->data_categorio ?>)</sub></strong></h5>
                <?=$portfolio->descripsaun_categorio ?>
                 <p class="card-text">
                    <small class="text-muted" style="color: black;"><strong>* <?=$portfolio->naran_ikus ?> (<?=$portfolio->sistema ?>)</strong></small>
                </p>
            </div>
            <center>
                <?php if ($acesso->hamos_direito_acesso_autromos == 1 && $acesso->kategorio_materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
                <a href="" class="btn btn-danger btn-animation mb-4" data-animation="shake" data-toggle="modal" data-target=".trokacategorio" id="categorio" 
                data-id="<?= $portfolio->id_categorio; ?>">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                <?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->kategorio_materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
                <a href="<?=base_url(lang('sciensieCategoryFunsionario.imageSciensieCategoryFunsionarioUrlPortfolio').$portfolio->id_categorio) ?>" class="btn mb-4" style="background-color: mediumorchid;"><i class="fa fa-image"></i></a>

                <a href="<?=base_url(lang('sciensieCategoryFunsionario.trokaSciensieCategoryFunsionarioUrlPortfolio').$portfolio->id_categorio) ?>" class="btn btn-success mb-4"><i class="fa fa-pencil"></i></a>
                <?php } ?>
            </center>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="left" style="float: left;">
    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
</div>
<div class="right" style="float: right;">
    <?= $pager->links('default','pagination') ?>
</div><br><br><br>
<?php }else{ ?>
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-5">
            <div class="form-input-content text-center error-page">
                <h1 class="error-text font-weight-bold">404</h1>
                <h4><i class="fa fa-exclamation-triangle text-warning"></i> <?= lang('hamosPortfolio.linkSala')?></h4>
                <p><?= lang('hamosPortfolio.linkSalaKarik')?></p>
                <?php if (session()->sistema_administrator == 2) { ?>
                    <h5><strong><?=helperFunsionario()->naran_kompleto ?></strong></h5>
                    <?php if (helperFunsionario()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.admnistrasaunFunsionario')?></strong></h6>
                   <?php } ?>
                <?php }elseif (session()->sistema_administrator == 3) { ?>
                    <h5><strong><?=helperProfessores()->naran_kompleto ?></strong></h5>
                    <?php if (helperProfessores()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.professoresProfessores')?></strong></h6>
                   <?php } ?>
               <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php endforeach;?>
<?php endif; ?>

<?php if (session()->sistema_administrator == 3) : ?>
<?php
    $naran = helperProfessores()->naran_kompleto;
    $this->db = \Config\Database::connect();
    $builder = $this->db->table('direito_acesso_autromos');
    $builder->select('*');
    $builder->join('direito_acesso', 'direito_acesso_autromos.direito_accesso_id  = direito_acesso.id_direito_acesso', 'total_saldo', 'total_osan_tama','salario_funsionario','salario_professores', 'osan_impresta_funsionario', 'osan_impresta_professores', 'funsionario', 'professores', 'materia_professores', 'estudante', 'kategorio_materia', 'materia', 'kursus_projeito', 'classe', 'horario_kursus', 'horario_kursus_hotu',  'left');
    
    $builder->join('menu_acesso', 'direito_acesso.id_administrator_acesso  = menu_acesso.id_menu_acesso', 'menu_profile', 'sistemmenu_finansa','menu_funsionario','menu_profesores','menu_estudante','menu_kategoria_materia','menu_kursus_projeito','menu_classe_horario', 'menu_sertifikado','left');

    $builder->join('administrator', 'menu_acesso.menu_administrator  = administrator.id_administrator', 'naran_kompleto', 'naran_ikus','naran_primeiro','email', 'status_servisu', 'left');

    $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'kode_sistema', 'sistema','left');
    $builder->where('id_administrator', session('id_administrator'));
    $builder->where('naran_kompleto=', $naran);
    $query = $builder->get()->getResult(); 
?>
<?php foreach($query as $acesso): ?>
<?php if ($acesso->kategorio_materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" name="start">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" name="end">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary mr-2" name="filter-data">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="app-search dropdown">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Search..." id="top-search">
                            <button class="input-group-text mr-2" style="background-color: cornflowerblue;" type="submit"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                            <?php if ($acesso->aumenta_direito_acesso_autromos == 1 && $acesso->kategorio_materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
                            <a href="<?= base_url(lang('sciensieCategoryFunsionario.aumentaSciensieCategoryFunsionarioUrlPortfolio')) ?>" class="btn" style="background-color: darkslateblue;color:aliceblue"><i class="fa fa-plus"></i></a>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <h4 class="card-title"><strong><?=lang('sidebarPortfolio.categoriaPortfolio')?></strong></h4>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Success !</b>
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Error !</b>
            <?= session()->getFlashdata('error') ?>
        </div>
    </div>
<?php endif; ?>
<?php foreach($categorio as $portfolio): ?>
    <?php if ($portfolio->naran_kompleto == helperProfessores()->naran_kompleto) { ?>
        <div class="row">
            <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $no = 1 +(10 * ($page - 1));
            ?>
            <?php foreach($categorio as $portfolio): ?>
            <?php if ($portfolio->naran_kompleto == helperProfessores()->naran_kompleto) { ?>
            
            <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                    <img class="img-fluid" src="<?= base_url('uploads/fotocategoriomateria/'.$portfolio->imagem_categorio)?>" alt="" style="width: 100%;height: 30vh;">
                    <div class="card-body">
                        <center>
                            <h4><strong><u><?= $portfolio->categorio ?></u></strong></h4>
                        </center>
                        
                        <h5><strong># <?=lang('categorioPortfolio.descripsaunCategorio') ?><sub>(<?=$portfolio->data_categorio ?>)</sub></strong></h5>
                        <?=$portfolio->descripsaun_categorio ?>
                        <p class="card-text">
                            <small class="text-muted" style="color: black;"><strong>* <?=$portfolio->naran_ikus ?> (<?=$portfolio->sistema ?>)</strong></small>
                        </p>
                    </div>
                    <center>
                        <?php if ($acesso->hamos_direito_acesso_autromos == 1 && $acesso->kategorio_materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
                        <a href="" class="btn btn-danger btn-animation mb-4" data-animation="shake" data-toggle="modal" data-target=".trokacategorio" id="categorio" 
                        data-id="<?= $portfolio->id_categorio; ?>">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                        <?php } ?>
                        <?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->kategorio_materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
                        <a href="<?=base_url(lang('sciensieCategoryFunsionario.imageSciensieCategoryFunsionarioUrlPortfolio').$portfolio->id_categorio) ?>" class="btn mb-4" style="background-color: mediumorchid;"><i class="fa fa-image"></i></a>
                        
                        <a href="<?=base_url(lang('sciensieCategoryFunsionario.trokaSciensieCategoryFunsionarioUrlPortfolio').$portfolio->id_categorio) ?>" class="btn btn-success mb-4"><i class="fa fa-pencil"></i></a>
                        <?php } ?>
                    </center>
                </div>
            </div>
            <?php } ?>
            <?php endforeach; ?>
        </div>
        <div class="left" style="float: left;">
            <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
        </div>
        <div class="right" style="float: right;">
            <?= $pager->links('default','pagination') ?>
        </div><br><br><br>
    <?php } ?>
<?php endforeach; ?>
<?php }else{ ?>
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-5">
            <div class="form-input-content text-center error-page">
                <h1 class="error-text font-weight-bold">404</h1>
                <h4><i class="fa fa-exclamation-triangle text-warning"></i> <?= lang('hamosPortfolio.linkSala')?></h4>
                <p><?= lang('hamosPortfolio.linkSalaKarik')?></p>
                <?php if (session()->sistema_administrator == 2) { ?>
                    <h5><strong><?=helperFunsionario()->naran_kompleto ?></strong></h5>
                    <?php if (helperFunsionario()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.admnistrasaunFunsionario')?></strong></h6>
                   <?php } ?>
                <?php }elseif (session()->sistema_administrator == 3) { ?>
                    <h5><strong><?=helperProfessores()->naran_kompleto ?></strong></h5>
                    <?php if (helperProfessores()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.professoresProfessores')?></strong></h6>
                   <?php } ?>
               <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php endforeach;?>
<?php endif; ?>

<div class="modal fade trokacategorio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br><br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('sciensieCategoryFunsionario.deleteSciensieCategoryFunsionarioUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></font>
                    </center><br>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idcategorio" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_categorio" value="1" placeholder="Kategori"class="form-control">
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
<script src="<?= base_url()?>templatefunsionario/assets/js/js/jquery.min.js"></script>
<script>
    $(document).on("click", "#categorio", function() {
    var Id = $(this).data('id');


    $(".trokacategorio #idcategorio").val(Id);
})
</script>
<?= $this->endSection() ?>