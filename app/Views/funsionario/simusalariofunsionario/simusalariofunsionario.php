<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.salarioFunionarioPortfolio')?></title>
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
<?php if ($acesso->simu_salario_funsionario == 1 && $acesso->menu_finansa ==1) {?>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="start" name="start" placeholder="<?= date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="end" name="end" placeholder="<?= date('Y-M-d')?>">
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
                            <?php if ($acesso->aumenta_direito_acesso_autromos == 1 && $acesso->salario_funsionario ==1 && $acesso->menu_finansa == 1): ?>
                                <a href="<?= base_url(lang('salarioFunsionario.aumentaSimuSalarioFunsionarioUrl').$salario->id_salario_funsionario) ?>" class="btn" style="background-color: darkslateblue; color:aliceblue"><i class="fa fa-plus"></i></a>
                            <?php endif; ?>
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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.salarioFunionarioPortfolio')?></strong></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><?=lang('imprestaSalarioFunsionario.eleituralFunsionario') ?></th>
                                <th style="width: 20%;"><?=lang('imprestaSalarioFunsionario.naranFunsionario') ?></th>
                                <th class="text-center"><?=lang('imprestaSalarioFunsionario.profesaunFunsionario') ?></th>
                                <th class="text-center"><?=lang('salarioFunsionario.totalFunsionario') ?></th>
                                <th class="text-center"><?=lang('salarioFunsionario.imprestaFunsionario') ?></th>
                                <th class="text-center"><?=lang('imprestaSalarioFunsionario.dataFunsionario') ?></th>
                                <th class="text-center"><?=lang('imprestaSalarioFunsionario.horasFunsionario') ?></th>
                                <?php if ($acesso->hamos_direito_acesso_autromos == 1 && $acesso->simu_salario_funsionario ==1 && $acesso->menu_finansa == 1): ?>
                                    <th><?=lang('salarioFunsionario.hamosFunsionario') ?></th>
                                <?php endif; ?>
                                <?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->simu_salario_funsionario ==1 && $acesso->menu_finansa == 1): ?>
                                    <th><?=lang('salarioFunsionario.trokaFunsionario') ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $saldo = 0;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            foreach($simusalariofunsionario as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$portfolio->numero_eleitural	?></td>
                                <td><?=$portfolio->naran_kompleto?>. <sub class="text-danger"><?=$portfolio->titulo_funsionario?></sub></td>
                                <?php if ($portfolio->sistema == 'Direktor') {?>
                                    <td align="center"><span style="color:darkred;"><strong><?=lang('imprestaSalarioFunsionario.direktorFunsionario') ?></strong></span></td>
                                <?php }elseif ($portfolio->sistema == 'Administrasaun') { ?>
                                    <td align="center"><span style="color:blue;"><strong><?=lang('imprestaSalarioFunsionario.admnistrasaunFunsionario') ?></strong></span></td>
                                <?php } ?>
                                <?php if ($portfolio->total_simu_salario == 0) { ?>
                                    <td align="center"><strong><span style="color: red;" class="text-center"><small><?=lang('salarioFunsionario.salarioMamuk') ?></small></span></strong></td>
                                <?php }else {?>
                                    <td align="center"><strong><span class="text-success">$ <?=number_format($portfolio->total_simu_salario,2)?></span></strong></td>
                               <?php } ?>
                                <?php if ($portfolio->total_simu_salario_impresta == 0) { ?>
                                    <td align="center"><strong><span style="color: red;" class="text-center"><small><?=lang('salarioFunsionario.imprestaMamuk') ?></small></span></strong></td>
                                <?php }else { ?>
                                    <td align="center"><strong><span class="text-success">$ <?=number_format($portfolio->total_simu_salario_impresta,2)?></span></strong></td>
                              <?php } ?>
                                <td align="center"><?=$portfolio->data_salario_simu_funsionario?></td>
                                <td align="center"><span class="text-info"><strong><?=$portfolio->horas_salario_simu_funsionario?></strong></span></td>
                                <?php if ($acesso->hamos_direito_acesso_autromos == 1 && $acesso->simu_salario_funsionario ==1 && $acesso->menu_finansa == 1): ?>
                                <td align="center">
                                <a href="" class="btn btn-danger btn-animation" data-animation="flipInX" data-toggle="modal" data-target=".trokasimusalario" id="simusalario" 
                                data-id="<?= $portfolio->id_salario_simu_funsionario; ?>">
                                    <i class="fa fa-trash"></i>
                                </a>
                                </td>
                                <?php endif; ?>
                                <?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->simu_salario_funsionario ==1 && $acesso->menu_finansa == 1): ?>
                                <td align="center"><a href="<?=base_url(lang('salarioFunsionario.editSimuSalarioFunsionarioUrl').$portfolio->id_salario_simu_funsionario.'/'.$portfolio->salario_simu_funsionario) ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>
                                <?php endif; ?>
                            </tr>
                            <?php
                            $saldo += $portfolio->total_simu_salario;
                            endforeach; ?>
                        </tbody>
                        <tbody>
                            <?php 
                            $saldo = 0;
                            foreach($result as $portfolio): ?>
                            <?php
                            $saldo += $portfolio->total_simu_salario;
                            endforeach; ?>
                            <tr>
                                <td colspan="4"><h5><strong><?=lang('imprestaSalarioFunsionario.totalFunsionario') ?></strong></h5></td>
                                <?php if ($saldo == 0) { ?>
                                    <td align="center"><strong><span style="color: black;" class="text-center"><small><?=lang('salarioFunsionario.salarioMamuk') ?></small></span></strong></td>
                              <?php  }else {?>
                                <td align="center"><strong><span style="color: gold;">$ <?= number_format($saldo, 2);?></span></strong></td>
                             <?php }?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="left" style="float: left;">
                    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
                </div>
                <div class="right" style="float: right;">
                    <?= $pager->links('default','pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>
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
<?php if ($acesso->simu_salario_funsionario == 1 && $acesso->menu_finansa ==1) {?>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="start" name="start" placeholder="<?= date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="end" name="end" placeholder="<?= date('Y-M-d')?>">
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.salarioFunionarioPortfolio')?></strong></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><?=lang('imprestaSalarioFunsionario.eleituralFunsionario') ?></th>
                                <th style="width: 20%;"><?=lang('imprestaSalarioFunsionario.naranFunsionario') ?></th>
                                <th class="text-center"><?=lang('imprestaSalarioFunsionario.profesaunFunsionario') ?></th>
                                <th class="text-center"><?=lang('salarioFunsionario.totalFunsionario') ?></th>
                                <th class="text-center"><?=lang('salarioFunsionario.imprestaFunsionario') ?></th>
                                <th class="text-center"><?=lang('imprestaSalarioFunsionario.dataFunsionario') ?></th>
                                <th class="text-center"><?=lang('imprestaSalarioFunsionario.horasFunsionario') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $saldo = 0;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            foreach($simusalariofunsionario as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$portfolio->numero_eleitural	?></td>
                                <td><?=$portfolio->naran_kompleto?>. <sub class="text-danger"><?=$portfolio->titulo_funsionario?></sub></td>
                                <?php if ($portfolio->sistema == 'Direktor') {?>
                                    <td align="center"><span style="color:darkred;"><strong><?=lang('imprestaSalarioFunsionario.direktorFunsionario') ?></strong></span></td>
                                <?php }elseif ($portfolio->sistema == 'Administrasaun') { ?>
                                    <td align="center"><span style="color:blue;"><strong><?=lang('imprestaSalarioFunsionario.admnistrasaunFunsionario') ?></strong></span></td>
                                <?php } ?>
                                <?php if ($portfolio->total_simu_salario == 0) { ?>
                                    <td align="center"><strong><span style="color: red;" class="text-center"><small><?=lang('salarioFunsionario.salarioMamuk') ?></small></span></strong></td>
                                <?php }else {?>
                                    <td align="center"><strong><span class="text-success">$ <?=number_format($portfolio->total_simu_salario,2)?></span></strong></td>
                               <?php } ?>
                                <?php if ($portfolio->total_simu_salario_impresta == 0) { ?>
                                    <td align="center"><strong><span style="color: red;" class="text-center"><small><?=lang('salarioFunsionario.imprestaMamuk') ?></small></span></strong></td>
                                <?php }else { ?>
                                    <td align="center"><strong><span class="text-success">$ <?=number_format($portfolio->total_simu_salario_impresta,2)?></span></strong></td>
                              <?php } ?>
                                <td align="center"><?=$portfolio->data_salario_simu_funsionario?></td>
                                <td align="center"><span class="text-info"><strong><?=$portfolio->horas_salario_simu_funsionario?></strong></span></td>
                            </tr>
                            <?php
                            $saldo += $portfolio->total_simu_salario;
                            endforeach; ?>
                        </tbody>
                        <tbody>
                            <?php 
                            $saldo = 0;
                            foreach($result as $portfolio): ?>
                            <?php
                            $saldo += $portfolio->total_simu_salario;
                            endforeach; ?>
                            <tr>
                                <td colspan="4"><h5><strong><?=lang('imprestaSalarioFunsionario.totalFunsionario') ?></strong></h5></td>
                                <?php if ($saldo == 0) { ?>
                                    <td align="center"><strong><span style="color: black;" class="text-center"><small><?=lang('salarioFunsionario.salarioMamuk') ?></small></span></strong></td>
                              <?php  }else {?>
                                <td align="center"><strong><span style="color: gold;">$ <?= number_format($saldo, 2);?></span></strong></td>
                             <?php }?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="left" style="float: left;">
                    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
                </div>
                <div class="right" style="float: right;">
                    <?= $pager->links('default','pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>
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

<div class="modal fade trokasimusalario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br><br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('salarioFunsionario.deleteSimuSalarioFunsionarioUrl')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></font>
                    </center>
                    <br>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idsimusalario" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_salario_simu_funsionario" value="1" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#simusalario", function() {
    var Id = $(this).data('id');


    $(".trokasimusalario #idsimusalario").val(Id);
})
</script>
<?= $this->endSection() ?>