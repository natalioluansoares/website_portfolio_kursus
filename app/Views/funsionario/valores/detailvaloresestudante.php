<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.valorPortfolio')?></title>
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
<?php if ($acesso->valores == 1 && $acesso->menu_estudante == 1) {?>
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
                        <a href="<?=base_url(lang('valoresEstudanteFunsionario.detailValoresEstudanteFunsionarioUrlPortofolio').$estudante->data_horario_hahu.'/'.$estudante->data_horario_remata.'/'.$estudante->id_horario.'/'.$estudante->materia_kursus.'/'.$estudante->level_materia_kursus) ?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
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
                            <a href="" class="btn btn-primary waves-effect waves-light mr-1" data-toggle="modal" data-animation="bounce" data-target=".exametexte"><i class="fa fa-plus"></i></a>
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
    <?php 
    $jumlah_data = count($valoresestudante);
    if ($jumlah_data > 0 )
    { ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.valorPortfolio')?></strong></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><small><strong><?=lang('classePortfolio.classeClasse') ?></strong></small></th>
                                <th><small><strong><?=lang('materiaProfessores.materiaMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.estudanteHorario') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('horarioProfessores.trabalhoMateria') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('horarioProfessores.dataMateria') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('horarioProfessores.valueMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.inputvalueMateria') ?></strong></small></th>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; $valores=0; foreach($valoresestudante as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><small><?=$portfolio->horario_classe_estudante?></small></td>
                                <td><small><?=$portfolio->materia_horario_estudante?></small></td>
                                <td><small><?=$portfolio->naran_kompleto_estudante?></small></td>
                                <td align="center"><a href="<?=base_url(lang('horarioProfessores.detailHorarioFunsionarioUrlPortfolio').$portfolio->id_materia_professores) ?>"><strong><small class="text-center"><span class="badge badge-success"><?=$portfolio->level_horario_estudante ?></span></small></strong></a></td>
                                <td align="center"><small><?=$portfolio->texte ?></small></td>
                                <td align="center"><small><?=$portfolio->data_valores_estudante ?></small></td>
                                <td align="center"><strong><small class="text-center"><span class="badge badge-warning"><?=$portfolio->total_valores ?></span></small></strong></td>

                                <td align="center"><a href="" class="badge badge-success" data-toggle="modal" data-animation="bounce" data-target=".inputvalores" id="valoresestudante" data-id="<?= $portfolio->id_valores ?>"><i class="fa fa-folder-open"></i></a></td>
                            </tr>
                            <?php
                                $valores += $portfolio->total_valores / 4;
                            endforeach; ?>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="7"><h5><strong><?=lang('saldotamaPortfolio.totalSaldo') ?></strong></h5></td>
                                    <td align="center"><strong><span class="badge" style="background-color: gold; color:black"><?= $valores;?></span></strong></td>
                                </tr>
                            </tbody>
                    </table>
                </div><br>
                <div class="left" style="float: left;">
                    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
                </div>
                <div class="right" style="float: right;">
                    <?= $pager->links('default','pagination') ?>
                </div>
            </div>
        </div>
    </div>
    <?php }else{ ?>
        <div class="table-responsive" style="margin-top: 15lvh;">
            <center>
                <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
            </center>
        </div>
    <?php } ?>
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
<?php if ($acesso->valores == 1 && $acesso->menu_estudante == 1) {?>
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
                        <a href="<?=base_url(lang('valoresEstudanteFunsionario.detailValoresEstudanteFunsionarioUrlPortofolio').$estudante->data_horario_hahu.'/'.$estudante->data_horario_remata.'/'.$estudante->id_horario.'/'.$estudante->materia_kursus.'/'.$estudante->level_materia_kursus) ?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
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
                            <a href="" class="btn btn-primary waves-effect waves-light mr-1" data-toggle="modal" data-animation="bounce" data-target=".exametexte"><i class="fa fa-plus"></i></a>
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
    <?php 
    $jumlah_data = count($valoresestudante);
    if ($jumlah_data > 0 )
    { ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.valorPortfolio')?></strong></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><small><strong><?=lang('classePortfolio.classeClasse') ?></strong></small></th>
                                <th><small><strong><?=lang('materiaProfessores.materiaMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.estudanteHorario') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('horarioProfessores.trabalhoMateria') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('horarioProfessores.dataMateria') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('horarioProfessores.valueMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.inputvalueMateria') ?></strong></small></th>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; $valores=0; foreach($valoresestudante as $portfolio): ?>
                            <?php if ($portfolio->naran_kompleto_professores == helperProfessores()->naran_kompleto) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><small><?=$portfolio->horario_classe_estudante?></small></td>
                                <td><small><?=$portfolio->materia_horario_estudante?></small></td>
                                <td><small><?=$portfolio->naran_kompleto_estudante?></small></td>
                                <td align="center"><a href="<?=base_url(lang('horarioProfessores.detailHorarioFunsionarioUrlPortfolio').$portfolio->id_materia_professores) ?>"><strong><small class="text-center"><span class="badge badge-success"><?=$portfolio->level_horario_estudante ?></span></small></strong></a></td>
                                <td align="center"><small><?=$portfolio->texte ?></small></td>
                                <td align="center"><small><?=$portfolio->data_valores_estudante ?></small></td>
                                <td align="center"><strong><small class="text-center"><span class="badge badge-warning"><?=$portfolio->total_valores ?></span></small></strong></td>

                                <td align="center"><a href="" class="badge badge-success" data-toggle="modal" data-animation="bounce" data-target=".inputvalores" id="valoresestudante" data-id="<?= $portfolio->id_valores ?>"><i class="fa fa-folder-open"></i></a></td>
                            </tr>
                            <?php } ?>
                           <?php
                                $valores += $portfolio->total_valores / 4;
                            endforeach; ?>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="7"><h5><strong><?=lang('saldotamaPortfolio.totalSaldo') ?></strong></h5></td>
                                    <td align="center"><strong><span class="badge" style="background-color: gold; color:black"><?= $valores;?></span></strong></td>
                                </tr>
                            </tbody>
                        </tbody>
                    </table>
                </div><br>
                <div class="left" style="float: left;">
                    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
                </div>
                <div class="right" style="float: right;">
                    <?= $pager->links('default','pagination') ?>
                </div>
            </div>
        </div>
    </div>
    <?php }else{ ?>
        <div class="table-responsive" style="margin-top: 15lvh;">
            <center>
                <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
            </center>
        </div>
    <?php } ?>
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



<div class="modal fade exametexte" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: forestgreen;">
            <center>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-1">
                            <div class="page-title-right">
                                <h1 class="page-title text-center text-white"><?=lang('horarioProfessores.inputvalueMateria')?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-1">
                            <div class="page-title-right">
                            <h1 style="font-size: 600%; color:white"><strong><i class="mdi mdi-check-all"></i></strong></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
                <div class="modal-body">
                    <form action="<?=base_url(lang('valoresEstudanteFunsionario.inputvalorestexteexameValoresEstudanteFunsionarioUrlPortofolio')) ?>" method="post">
                        <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('classePortfolio.classeClasse')?></label>
                                <select name="exame" class="form-control">
                                    <option value=""><?=lang('horarioProfessores.hiliestudanteHorario')?></option>
                                    <option value="Texte">Texte</option>
                                    <option value="Exame">Exame</option>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['classe']) ?  $errors['classe'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('classePortfolio.classeClasse')?></label>
                                <select name="texte" class="form-control">
                                    <option value=""><?=lang('horarioProfessores.hiliestudanteHorario')?></option>
                                    <option value="Texte I">Texte I</option>
                                    <option value="Texte II">Texte II</option>
                                    <option value="Texte III">Texte III</option>
                                    <option value="Texte IV">Texte IV</option>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['classe']) ?  $errors['classe'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label text-white"><?=lang('classePortfolio.classeClasse')?></label>
                                <select name="estudante" class="form-control">
                                <option value=""><?=lang('horarioProfessores.hiliestudanteHorario')?></option>
                                <option value="<?=$estudante->id_horario_estudante?>"><?=$estudante->naran_kompleto_estudante?></option>
                            </select>
                                <small class="text-danger">
                                    <?=isset($errors['classe']) ?  $errors['classe'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label text-white"><?=lang('classePortfolio.classeClasse')?></label>
                                <input type="text" class="form-control" name="valores">
                                <small class="text-danger">
                                    <?=isset($errors['classe']) ?  $errors['classe'] : null ?>
                                </small>
                            </div>
                        </div><br>
                        <center>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <button type="reset" class="btn btn-dark ms-1" data-dismiss="modal"><i class="mdi mdi-skip-previous"></i></button>
                        </center>
                    </form>  
                </div>
        </div>
    </div>
</div>


<div class="modal fade inputvalores" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: forestgreen;">
            <center>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-1">
                            <div class="page-title-right">
                            <h1 class="page-title text-center text-white"><?=lang('horarioProfessores.inputvalueMateria')?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-1">
                            <div class="page-title-right">
                            <h1 style="font-size: 600%; color:white"><strong><i class="mdi mdi-check-all"></i></strong></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
                <div class="modal-body">
                    <form action="<?=base_url(lang('valoresEstudanteFunsionario.valorestexteexameValoresEstudanteFunsionarioUrlPortofolio')) ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row g-2">
                            <div class="mb-3 col-md-12">
                                <label for="inputPassword4" class="form-label text-white"><?=lang('classePortfolio.classeClasse')?></label>
                                <input type="hidden" class="form-control" name="idvalores" id="idvalores">
                                <input type="text" class="form-control" name="valores">
                                <small class="text-danger">
                                    <?=isset($errors['valores']) ?  $errors['valores'] : null ?>
                                </small>
                            </div>
                        </div><br>
                        <center>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <button type="button" class="btn btn-dark ms-1" data-dismiss="modal"><i class="mdi mdi-skip-previous"></i></button>
                        </center>
                    </form>  
                </div>
        </div>
    </div>
</div>
<script src="<?= base_url()?>templateadministrator/assets/js/js/jquery.min.js"></script>
<script>
    $(document).on("click", "#valoresestudante", function() {
    var Id = $(this).data('id');

    $(".inputvalores #idvalores").val(Id);
})
</script>
<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('soal');
</script>
<?= $this->endSection() ?>