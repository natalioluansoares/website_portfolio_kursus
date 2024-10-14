<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('funsionarioPortfolio.registoFunsionarioPortfolio')?></title>
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
<?php if ($acesso->funsionario == 1 && $acesso->menu_funsionario == 1) {?>
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
                            <?php if($acesso->aumenta_direito_acesso_autromos == 1 && $acesso->funsionario == 1 && $acesso->menu_funsionario ==1): ?>
                            <a href="<?= base_url(lang('employeeFunsionario.aumentaEmployeeUrlPortfolio')) ?>" class="btn" style="background-color: darkslateblue; color:aliceblue"><i class="fa fa-plus"></i></a>
                            <?php endif; ?>
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
            <h4 class="card-title"><strong><?=lang('funsionarioPortfolio.registoFunsionarioPortfolio')?></strong></h4>
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
    $no = 1 +(6 * ($page - 1));
    $no=1; foreach($funsionario as $portfolio): ?>
    <div class="col-xl-4 col-xxl-6 col-lg-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="text-center p-3" style="background-color: mediumseagreen;">
                        <div class="profile-photo">
                            <img src="<?= base_url('uploads/fotoportfolio/'.$portfolio->image_administrator)?>" style="width: 100px; height: 13vh;" class="img-fluid rounded-circle" alt="">
                        </div>
                        <h3 class="mt-3 mb-1 text-white"><?= $portfolio->naran_primeiro?></h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('professoresPortfolio.fullNamePortfolio') ?></span> <strong class="text-muted"><?=$portfolio->naran_kompleto?><sub class="text-danger">(<?=$portfolio->titulo_funsionario?>)</sub></strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('professoresPortfolio.statusServisuPortfolio') ?></span> <strong class="text-muted"> <?php if ($portfolio->status_servisu == 'Aktivo') { ?>
                        <?=lang('professoresPortfolio.aktivoServisuProfessores')?>
                        <?php }else{ ?>
                        <?=lang('professoresPortfolio.laAktivoServisuProfessores')?>
                        <?php } ?></strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('professoresPortfolio.sexoPortfolio') ?></span> <strong class="text-muted"><?php if ($portfolio->jenero == 'Mane') { ?>
                                <td><?=lang('professoresPortfolio.maneProfessores')?></td>
                                <?php }else{ ?>
                                <td><?=lang('professoresPortfolio.fetoProfessores')?></td>
                            <?php } ?>  
                    </strong></li>

                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><th><?=lang('professoresPortfolio.fatinPortfolio') ?></th></span> <strong class="text-muted"><?=$portfolio->fatin_moris?></strong></li>

                    
                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><th><?=lang('professoresPortfolio.numeroEleituralPortfolio') ?></th></span> <strong class="text-muted"><?=$portfolio->numero_telefone?></strong></li>

                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><th><?=lang('professoresPortfolio.numeroTelefonePortfolio') ?></th></span> <strong class="text-muted"><?=$portfolio->numero_eleitural?></strong></li>
                    
                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><th><?=lang('professoresPortfolio.datePortfolio') ?></th></span> <strong class="text-muted"><?=$portfolio->loron_moris?></strong></li>
                    </ul>
                    <div class="card-footer text-center border-0 mt-0">	
                        <?php if($acesso->hamos_direito_acesso_autromos == 1 && $acesso->funsionario == 1 && $acesso->menu_funsionario ==1): ?>							
                        <a href="" class="btn btn-danger btn-animation btn-rounded px-3" data-animation="swing" data-toggle="modal" data-target=".trokafunsionario" id="funsionario" 
                        data-id="<?= $portfolio->id_funsionario; ?>">
                        <i class="fa fa-trash"></i>
                        </a>
                        <?php endif; ?>
                        <?php if($acesso->troka_direito_acesso_autromos == 1 && $acesso->funsionario == 1 && $acesso->menu_funsionario ==1): ?>
                        <a href="<?=base_url(lang('employeeFunsionario.trokaEmployeeUrlPortfolio').$portfolio->id_funsionario) ?>"
                        class="btn btn-success btn-rounded px-3"><i class="fa fa-pencil"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="left" style="float: left;">
    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
</div>
<div class="right" style="float: right;">
    <?= $pager->links('default','pagination') ?>
</div><br><br>
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
<?php if ($acesso->funsionario == 1 && $acesso->menu_funsionario == 1) {?>
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
            <h4 class="card-title"><strong><?=lang('funsionarioPortfolio.registoFunsionarioPortfolio')?></strong></h4>
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
    $no = 1 +(6 * ($page - 1));
    $no=1; foreach($funsionario as $portfolio): ?>
    <div class="col-xl-4 col-xxl-6 col-lg-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="text-center p-3" style="background-color: mediumseagreen;">
                        <div class="profile-photo">
                            <img src="<?= base_url('uploads/fotoportfolio/'.$portfolio->image_administrator)?>" style="width: 100px; height: 13vh;" class="img-fluid rounded-circle" alt="">
                        </div>
                        <h3 class="mt-3 mb-1 text-white"><?= $portfolio->naran_primeiro?></h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('professoresPortfolio.fullNamePortfolio') ?></span> <strong class="text-muted"><?=$portfolio->naran_kompleto?><sub class="text-danger">(<?=$portfolio->titulo_funsionario?>)</sub></strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('professoresPortfolio.statusServisuPortfolio') ?></span> <strong class="text-muted"> <?php if ($portfolio->status_servisu == 'Aktivo') { ?>
                        <?=lang('professoresPortfolio.aktivoServisuProfessores')?>
                        <?php }else{ ?>
                        <?=lang('professoresPortfolio.laAktivoServisuProfessores')?>
                        <?php } ?></strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('professoresPortfolio.sexoPortfolio') ?></span> <strong class="text-muted"><?php if ($portfolio->jenero == 'Mane') { ?>
                                <td><?=lang('professoresPortfolio.maneProfessores')?></td>
                                <?php }else{ ?>
                                <td><?=lang('professoresPortfolio.fetoProfessores')?></td>
                            <?php } ?>  
                    </strong></li>

                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><th><?=lang('professoresPortfolio.fatinPortfolio') ?></th></span> <strong class="text-muted"><?=$portfolio->fatin_moris?></strong></li>

                    
                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><th><?=lang('professoresPortfolio.numeroEleituralPortfolio') ?></th></span> <strong class="text-muted"><?=$portfolio->numero_telefone?></strong></li>

                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><th><?=lang('professoresPortfolio.numeroTelefonePortfolio') ?></th></span> <strong class="text-muted"><?=$portfolio->numero_eleitural?></strong></li>
                    
                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><th><?=lang('professoresPortfolio.datePortfolio') ?></th></span> <strong class="text-muted"><?=$portfolio->loron_moris?></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="left" style="float: left;">
    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
</div>
<div class="right" style="float: right;">
    <?= $pager->links('default','pagination') ?>
</div><br><br>
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


<div class="modal fade trokafunsionario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br><br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('employeeFunsionario.deleteEmployeeUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></font>
                    </center><br>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idfunsionario" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_funsionario" value="1" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#funsionario", function() {
    var Id = $(this).data('id');


    $(".trokafunsionario #idfunsionario").val(Id);
})
</script>
<?= $this->endSection() ?>