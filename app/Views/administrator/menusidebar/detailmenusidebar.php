<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.registoPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.sistemaPortfolio')?></h4>
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
                                <span class="input-group-text bg-primary border-primary text-white mr-2">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" name="end">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary ms-2" name="filter-data">
                            <i class="uil-eye"></i>
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
                            <span class="mdi mdi-magnify search-icon"></span>
                            <button class="input-group-text  btn-success" type="submit"><i class="uil-search-plus"></i></button>
                            <button type="reset" class="btn btn-dark ms-1">
                                <i class="uil-sync"></i>
                            </button>
                            <a href="<?= base_url(lang('aktivosistema.menuSidebarUrlPortfolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
<div class="row">
    <div class="col-xl-12 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th class="text-center text-primary"><small>No</small></th>
                                <th class="text-primary"><small><?=lang('aktivosistema.naranSidebar') ?></small></th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.totalSidebarUrlPortfolio').$sistema->sistema)?>">
                                        <small><?=lang('aktivosistema.totalSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.donatorSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.donatorSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.salarioFunsionarioSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.salarioFunsionarioSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.salarioProfessoresSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.salarioProfessoresSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.simusalariofunsionariosidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.receiveemployeesalarySidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.simusalarioprofessoressidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.receiveteachersalarySidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.moneysubsidiosidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.subsidioSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.imprestaFunsionarioSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.imprestaFunsionarioSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.imprestaProfessoresSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.imprestaProfessoresSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.funsionarioSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.funsionarioSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.professoresSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.professoresSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.materiaProfessoresSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.materiaProfessoresSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.estudanteSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.estudanteSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.valueSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.valueEstudante') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.absenceSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.absenceEstudante') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.materiaKategorioSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.materiaKategorioSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.materiaSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.materiaSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.kursusProjeitoSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.kursusProjeitoSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.classeSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.classeSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.horarioSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.horarioSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.horarioHotuSidebarUrlPortfolio').$sistema->sistema)?>">
                                    <small><?=lang('aktivosistema.horarioHotuSidebar') ?></small>
                                    </a>
                                </th>
                                <th class="text-center text-primary"><small><?=lang('aktivosistema.dateAktivo') ?></small></th>
                                <th class="text-center text-primary"><small><?=lang('aktivosistema.sistemaSidebar') ?></small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(10 * ($page - 1));
                            $no=1; foreach($menu as $portfolio): ?>
                            <tr>
                                <td align="center"><small><?=$no++?></small></td>
                                <td><small><?=$portfolio->naran_kompleto?><sub class="text-danger">(<?=$portfolio->sistema?>)</sub></small></td>
                                <form action="<?= site_url(lang('aktivosistema.balanceamoutUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->total_saldo ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->total_saldo ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->total_saldo ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.donormoneyUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->total_osan_tama ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->total_osan_tama ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->total_osan_tama ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.employeesalaryUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->salario_funsionario ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->salario_funsionario ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->salario_funsionario ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.teachersalaryUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso   ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->salario_professores ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->salario_professores ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->salario_professores ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.receiveemployeesalaryUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso   ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->simu_salario_funsionario ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->simu_salario_funsionario ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->simu_salario_funsionario ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.receiveteachersalaryUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso   ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->simu_salario_professores ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->simu_salario_professores ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->simu_salario_professores ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.moneysubsidiosalaryUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso   ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->osan_subsidio ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->osan_subsidio ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->osan_subsidio ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.employeemoneyloansUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->osan_impresta_funsionario ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->osan_impresta_funsionario ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->osan_impresta_funsionario ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.teachermoneyloansUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->osan_impresta_professores ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->osan_impresta_professores ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->osan_impresta_professores ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.employeeUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso   ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->funsionario ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->funsionario ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->funsionario ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.teacherUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->professores ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->professores ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->professores ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.teacherscienseUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->materia_professores ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->materia_professores ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->materia_professores ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.studentsUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->estudante ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->estudante ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->estudante ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.valueUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->valores ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->professores ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->valores ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.absenceUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->absence ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->absence ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->absence ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.sciensecategoryUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->kategorio_materia ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->kategorio_materia ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->kategorio_materia ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.scienseUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->materia ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->materia ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->materia ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.courseprojectUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->kursus_projeito ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->kursus_projeito ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->kursus_projeito ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.roomUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->classe ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->classe ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->classe ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.coursescheduleUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->horario_kursus ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->horario_kursus ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->horario_kursus ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.allcoursescheduleUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->horario_kursus_hotu ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->horario_kursus_hotu ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->horario_kursus_hotu ?'' : '' ?>
                                    </button></td>
                                </form>
                                <td align="center"><small><?=$portfolio->data_sistema?></small></td>
                                <form action="<?= site_url(lang('aktivosistema.sistemamenuaktivoUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso ?>">
                                    <td align="center"><button class="btn btn-danger">
                                    <i class="mdi mdi-power-standby"></i>
                                    </button></td>
                                </form>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div><br><br>
                <div class="left" style="float: left;">
                    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
                </div>
                <div class="right" style="float: right;">
                    <?= $pager->links('default','pagination') ?>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>