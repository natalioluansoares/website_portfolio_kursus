<?= $this->extend('templateestudante/header') ?>

<?= $this->section('estudante') ?>
<title><?=lang('sidebarPortfolio.seluPortfolio')?></title>
<?= $this->endSection() ?>

<?= $this->section('estudante') ?>
   <section class="py-5">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="<?= base_url('uploads/fotoestudante/'.helperEstudante()->image_estudante)?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                        <h4 class="mb-0 mt-2"><?=helperEstudante()->naran_ikus ?></h4>
                        <?php if (helperEstudante()->sistema == 'Estudantes') { ?>
                            <p class="text-muted font-14"><?= lang('propinasEstudante.estudante') ?></p>
                       <?php } ?>
                        <?php if (helperEstudante()->jenero == 'Mane') { ?>
                            <p class="text-muted font-14"><?= lang('propinasEstudante.mane') ?></p>
                            <?php }else{ ?>
                                <p class="text-muted font-14"><?= lang('propinasEstudante.feto') ?></p>
                       <?php } ?>
                        <p class="text-muted font-14"><?=helperEstudante()->fatin_moris ?></p>
                        <p class="text-muted font-14"><?=helperEstudante()->loron_moris ?></p>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col-->
            <div class="col-xl-7 col-lg-7">
                <div class="card text-center">
                    <div class="card-body">
                        <?php 
                            $jumlah_data = count($selu);
                            if ($jumlah_data > 0 )
                        { ?>
                        <div class="text-start mt-3 ms-5" style="margin-right: 8%;">
                            <h4 class="font-20 text-uppercase"><?=lang('sidebarPortfolio.seluPortfolio')?></h4>
                        </div>
                        <div class="text-start mt-3 ms-5" style="margin-right: 8%;">

                            <p class="text-muted mb-2 font-13"><strong><?=lang('propinasEstudante.naran') ?><span class="ms-2">:<?=helperEstudante()->naran_kompletos ?></span></strong></p>
                            <div class="table-responsive">
                                <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                                    <thead>
                                        <tr>
                                        <th><small><strong>No</strong></small></th>
                                        <th><small><strong><?=lang('classePortfolio.classeClasse') ?></strong></small></th>
                                        <th><small><strong><?=lang('materiaProfessores.materiaMateria') ?></strong></small></th>
                                        <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                        <th><small><strong><?=lang('totalSaldoEstudante.osanPortfolio') ?></strong></small></th>
                                    <th><small><strong><?=lang('horarioProfessores.dataMateria') ?></strong></small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1; foreach($selu as $portfolio): ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><small><?=$portfolio->horario_classe_estudante?></small></td>
                                            <td><small><?=$portfolio->materia_horario_estudante?></small></td>
                                            <td align="center"><strong><small class="text-center"><span class="text-success"><?=$portfolio->level_horario_estudante ?></span></small></strong></td>
                                            <td><small>$ <?=number_format($portfolio->total_saldo_tama_estudante,2) ?></small></td>
                                            <td><small><?=$portfolio->data_saldo_tama_estudante ?></small></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div><br>
                        <?php }else{ ?>
                            <div class="table-responsive">
                                <center>
                                    <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
                                </center>
                            </div>
                        <?php } ?><br><br>
                        <?php 
                            $jumlah_data = count($donator);
                            if ($jumlah_data > 0 )
                        { ?>
                        <div class="text-start mt-3 ms-5" style="margin-right: 8%;">
                            <h4 class="font-20 text-uppercase"><?=lang('sidebarPortfolio.donatorKursusPortfolio')?></h4>
                        </div>
                        <div class="text-start mt-3 ms-5" style="margin-right: 8%;">
                            <div class="table-responsive">
                                <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                                    <thead>
                                        <tr>
                                        <th><small><strong>No</strong></small></th>
                                        <th><small><strong><?=lang('classePortfolio.classeClasse') ?></strong></small></th>
                                        <th><small><strong><?=lang('materiaProfessores.materiaMateria') ?></strong></small></th>
                                        <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                        <th><small><strong><?=lang('totalSaldoEstudante.osanPortfolio') ?></strong></small></th>
                                    <th><small><strong><?=lang('horarioProfessores.dataMateria') ?></strong></small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1; foreach($donator as $portfolio): ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><small><?=$portfolio->horario_classe_estudante?></small></td>
                                            <td><small><?=$portfolio->materia_horario_estudante?></small></td>
                                            <td align="center"><strong><small class="text-center"><span class="text-success"><?=$portfolio->level_horario_estudante ?></span></small></strong></td>
                                            <td><small>$ <?=number_format($portfolio->total_saldo_tama_estudante,2) ?></small></td>
                                            <td><small><?=$portfolio->data_saldo_tama_estudante ?></small></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-body -->
                    <?php }else{ ?>
                    <div class="table-responsive">
                        <center>
                            <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
                        </center>
                    </div>
                <?php } ?><br><br>
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>
        <!-- end row-->
    </section>
<?= $this->endSection() ?>