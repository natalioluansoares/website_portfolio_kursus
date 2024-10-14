<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.subsidioPortfolio')?></title>
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
<?php if ($acesso->osan_subsidio == 1 && $acesso->menu_finansa == 1) {?>
<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><strong><?=lang('sidebarPortfolio.subsidioPortfolio')?></strong></h4>
            </div>
        </div>
    </div>
</div>
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
                            <button class="input-group-text mr-1" style="background-color: cornflowerblue;" type="submit"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
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
<?php 
    $jumlah_data = count($osansai);
    if ($jumlah_data > 0 )
{ ?>
<div class="row">
    <?php 
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $no = 1 +(6 * ($page - 1));
    foreach($osansai as $portfolio): ?>
    <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-4 col-sm-4">
        <div class="card">
            <img class="img-fluid" src="<?= base_url('uploads/fotosaldoprivado/'.$portfolio->image_osan_sai)?>" alt="" style="width: 100%; height:200px ;">
            <div class="card-body">
            <h5 class="card-title text-center"><strong><?=$portfolio->naran_osan_sai ?></strong></h5>
            <center>
                <?php if ($portfolio->total_osan_sai) { ?>
                    <h3><strong>$ <?= number_format($portfolio->total_osan_sai,2)?></strong></h3>
                <?php }else {?>
                    <p class="card-text" style="color: red;"><strong><?=lang('subsidioPortfolio.subsidioEmpty') ?></strong></p>
                <?php } ?>
                <p class="card-text">
                    <small class="text-muted"><?=$portfolio->kode_osan_sai ?> (<?=$portfolio->data_osan_sai ?>|<?=$portfolio->horas_osan_sai ?>)</small>
                </p>
            </center><br>
            <center>
                <table>
                    <thead>
                        <tr>
                            <?php if ($portfolio->id_osan_sai != 1) { ?>
                                <th>
                                    <a href="<?=base_url(lang('subsidioPortfolio.showSubsidioUrlFunsionario').$portfolio->id_osan_sai) ?>" class="btn btn-warning text-white ms-1"><i class="mdi mdi-folder-open"></i></a>
                                </th>
                                
                            <?php } ?>
                        </tr>
                    </thead>
                </table>
            </center>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="left" style="float: left;">
<span>Showing <?=  $no = 1 +(6 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
</div>
<div class="right" style="float: right;">
    <?= $pager->links('default','pagination') ?>
</div>
<?php }else{ ?>
    <div class="table-responsive">
        <center>
            <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
        </center>
    </div>
<?php } ?>
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
                    <h2><?=helperProfessores()->naran_kompleto ?></h2>
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
<?php if ($acesso->osan_subsidio == 1 && $acesso->menu_finansa == 1) {?>
<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><strong><?=lang('sidebarPortfolio.subsidioPortfolio')?></strong></h4>
            </div>
        </div>
    </div>
</div>
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
                            <button class="input-group-text mr-1" style="background-color: cornflowerblue;" type="submit"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
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
<?php 
    $jumlah_data = count($osansai);
    if ($jumlah_data > 0 )
{ ?>
<div class="row">
    <?php 
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $no = 1 +(6 * ($page - 1));
    foreach($osansai as $portfolio): ?>
    <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-4 col-sm-4">
        <div class="card">
            <img class="img-fluid" src="<?= base_url('uploads/fotosaldoprivado/'.$portfolio->image_osan_sai)?>" alt="" style="width: 100%; height:200px ;">
            <div class="card-body">
            <h5 class="card-title text-center"><strong><?=$portfolio->naran_osan_sai ?></strong></h5>
            <center>
                <?php if ($portfolio->total_osan_sai) { ?>
                    <h3><strong>$ <?= number_format($portfolio->total_osan_sai,2)?></strong></h3>
                <?php }else {?>
                    <p class="card-text" style="color: red;"><strong><?=lang('subsidioPortfolio.subsidioEmpty') ?></strong></p>
                <?php } ?>
                <p class="card-text">
                    <small class="text-muted"><?=$portfolio->kode_osan_sai ?> (<?=$portfolio->data_osan_sai ?>|<?=$portfolio->horas_osan_sai ?>)</small>
                </p>
            </center><br>
            <center>
                <table>
                    <thead>
                        <tr>
                            <?php if ($portfolio->id_osan_sai != 1) { ?>
                                <th>
                                    <a href="<?=base_url(lang('subsidioPortfolio.showSubsidioUrlFunsionario').$portfolio->id_osan_sai) ?>" class="btn btn-warning text-white ms-1"><i class="mdi mdi-folder-open"></i></a>
                                </th>
                                
                            <?php } ?>
                        </tr>
                    </thead>
                </table>
            </center>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="left" style="float: left;">
<span>Showing <?=  $no = 1 +(6 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
</div>
<div class="right" style="float: right;">
    <?= $pager->links('default','pagination') ?>
</div>
<?php }else{ ?>
    <div class="table-responsive">
        <center>
            <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
        </center>
    </div>
<?php } ?>
<?php }else{ ?>
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-5">
            <div class="form-input-content text-center error-page">
                <h1 class="error-text font-weight-bold">404</h1>
                <h5><i class="fa fa-exclamation-triangle text-warning"></i> <?= lang('hamosPortfolio.linkSala')?></h5>
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
<?= $this->endSection() ?>