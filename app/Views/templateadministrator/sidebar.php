 <ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle arrow-none" id="topnav-dashboards" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="uil-dashboard me-1"></i><?=lang('sidebarPortfolio.dashboardPortfolio')?><div class="arrow-down"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-dashboards">
            <a href="<?=base_url(lang('homeLogin.homeUrlPortofolio'))?>" class="dropdown-item"><?=lang('sidebarPortfolio.dashboardPortfolio')?></a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle arrow-none" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="uil-users-alt me-1"></i><?=lang('sidebarPortfolio.profilePortfolio')?><div class="arrow-down"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-apps">
            <a href="apps-calendar.html" class="dropdown-item"><?=lang('sidebarPortfolio.profilePortfolio')?></a>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.cartaPortfolio')?> <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="apps-email-read.html" class="dropdown-item"><?=lang('sidebarPortfolio.cartaPortfolio')?></a>
                    <a href="apps-email-inbox.html" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaCartaPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.esperiensiaPortfolio')?> <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('esperiensiaPortfolio.esperiensiaUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.esperiensiaPortfolio')?></a>
                    <a href="<?=base_url(lang('esperiensiaPortfolio.aumentaEsperiensiaUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaEsperiensiaPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.sistemaPortfolio')?> <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('sistemaPortfolio.sistemaUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.sistemaPortfolio')?></a>
                    <a href="<?=base_url(lang('sistemaPortfolio.aumentaSistemaUrlPortfolio')) ?>"
                     class="dropdown-item"><?=lang('sidebarPortfolio.aumentaSistemaPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.registoPortfolio')?> <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('registoAdministrator.registoUrlConta')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.registoPortfolio')?></a>
                    <a href="<?=base_url(lang('registoAdministrator.aumentaRegistoUrlConta')) ?>"
                     class="dropdown-item"><?=lang('sidebarPortfolio.aumentaRegistoPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.registoFuncionarioPortfolio')?> <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('registoFunsionario.registoUrlConta')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.registoFuncionarioPortfolio')?></a>
                    <a href="<?=base_url(lang('registoFunsionario.aumentaRegistoUrlConta')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaFuncionarioRegistoPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.registoTeachersPortfolio')?> <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('registoTeachers.registoUrlConta')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.registoTeachersPortfolio')?></a>
                    <a href="<?=base_url(lang('registoTeachers.aumentaRegistoUrlConta')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaTeachersRegistoPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.registoMembroPortfolio')?> <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('registoestudante.registoUrlConta')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.registoMembroPortfolio')?></a>
                    <a href="<?=base_url(lang('registoestudante.aumentaRegistoUrlConta')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaMembroRegistoPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.teachersPortfolio')?> <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('professoresPortfolio.professoresUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.teachersPortfolio')?></a>
                    <a href="<?=base_url(lang('professoresPortfolio.aumentaProfessoresUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaTeachersPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.employeePortfolio')?> <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('funsionarioPortfolio.funsionarioUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.employeePortfolio')?></a>
                    <a href="<?=base_url(lang('funsionarioPortfolio.aumentaFunsionarioUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaEmployeePortfolio')?></a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle arrow-none" id="topnav-pages" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="uil-package me-1"></i><?=lang('sidebarPortfolio.saldoFinanca')?><div class="arrow-down"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-pages">
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('saldoPortfolio.totalSaldo')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('saldoPortfolio.saldoPortfolioUrlPortfolio')) ?>" class="dropdown-item"><?=lang('saldoPortfolio.totalSaldo')?></a>
                    <a href="<?=base_url(lang('saldoPortfolio.aumentaSaldoPortfolioUrlPortfolio')) ?>" class="dropdown-item"><?=lang('saldoPortfolio.aumentaTotalSaldo')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.saldoPrivado')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                        <a href="<?=base_url(lang('saldoprivadoPortfolio.saldoPrivadoUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.saldoPrivado')?></a>
                        <a href="<?=base_url(lang('saldoprivadoPortfolio.aumentaSaldoPrivadoUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaSaldoPrivado')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.osanSaiPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                        <a href="<?=base_url(lang('osanSaiPortfolio.osanSaiUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.osanSaiPortfolio')?></a>
                        <a href="<?=base_url(lang('osanSaiPortfolio.aumentaOsanSaiUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaOsanSaiPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.subsidioPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                        <a href="<?=base_url(lang('subsidioPortfolio.subsidioUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.subsidioPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.donatorKursusPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                        <a href="<?=base_url(lang('totalSaldoEstudante.totalSaldoEstudanteUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.donatorKursusPortfolio')?></a>
                        <a href="<?=base_url(lang('totalSaldoEstudante.aumentaTotalSaldoEstudanteUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaDonatorKursusPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.saldoTamaPrivado')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                        <a href="<?=base_url(lang('saldotamaPortfolio.saldoTamaUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.saldoTamaPrivado')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.salarioFunionarioPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                        <a href="<?=base_url(lang('salarioFunsionario.salarioFunsionarioProfessoresUrlPortofolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.salarioFunionarioPortfolio')?></a>
                        <a href="<?=base_url(lang('salarioFunsionario.aumentaSalarioFunsionarioProfessoresUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaSalarioFunionarioPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.salarioProfessoresPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                        <a href="<?=base_url(lang('salarioProfessores.salarioFunsionarioProfessoresUrlPortofolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.salarioProfessoresPortfolio')?></a>
                        <a href="<?=base_url(lang('salarioProfessores.aumentaSalarioFunsionarioProfessoresUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaSalarioProfessoresPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.imprestasalarioFunsionarioPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                        <a href="<?=base_url(lang('imprestaSalarioFunsionario.imprestaSalarioFunsionarioPortfolioUrlPortofolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.imprestasalarioFunsionarioPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.imprestasalarioProfessoresPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                        <a href="<?=base_url(lang('imprestaSalarioProfessores.imprestaSalarioProfessoresPortfolioUrlPortofolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.imprestasalarioProfessoresPortfolio')?></a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle arrow-none" id="topnav-pages" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="uil-package me-1"></i><?=lang('sidebarPortfolio.materiaPortfolio')?><div class="arrow-down"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-pages">
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.categoriaPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('categorioPortfolio.categorioUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.categoriaPortfolio')?></a>
                    <a href="<?=base_url(lang('categorioPortfolio.aumentaCategorioUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaCategoriaPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.materiaPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email" style="height: 200px; width: 20%; overflow-y: scroll;">
                    <?php 
                        $this->db = \Config\Database::connect();
                        $query = $this->db->table('categorio');
                        $categorio = $query->orderBy('id_categorio', 'DESC')->where('aktivo_categorio =', null)->get()->getResult();
                    ?>
                    <?php foreach($categorio as $cate): ?>
                        <a href="<?=base_url(lang('materiaPortfolio.materiaUrlPortfolio').$cate->id_categorio) ?>" class="dropdown-item"><?=$cate->categorio?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <a href="<?=base_url(lang('materiaPortfolio.aumentaMateriaUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaMateriaPortfolio')?></a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle arrow-none" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="uil-window me-1"></i></i><?=lang('sidebarPortfolio.projeitoPortfolio')?><div class="arrow-down"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-apps">
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.projetosCategoriaPortfolio')?> <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('categoriobackendfrontendPortfolio.categorioBackendFrontendUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.projetosCategoriaPortfolio')?></a>
                    <a href="<?=base_url(lang('categoriobackendfrontendPortfolio.aumentaCategorioBackendFrontendUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaProjetosCategoriaPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.backendPortfolio')?> <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('projeitoBackendPortfolio.projeitoBackendFrontendUrlPortfolio')) ?>" class="dropdown-item"><?=lang('sidebarPortfolio.backendPortfolio')?></a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle arrow-none" id="topnav-pages" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="uil-copy-alt me-1"></i><?=lang('sidebarPortfolio.absensiaPortfolio')?><div class="arrow-down"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-pages">
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.absensiaFuncionarioPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="apps-calendar.html" class="dropdown-item"><?=lang('sidebarPortfolio.absensiaFuncionarioPortfolio')?></a>
                    <a href="apps-calendar.html" class="dropdown-item"><?=lang('sidebarPortfolio.aumentaAbsensiaFuncionarioPortfolio')?></a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle arrow-none" id="topnav-pages" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="uil-copy-alt me-1"></i><?=lang('sidebarPortfolio.valorPortfolio')?> &
            <?=lang('sidebarPortfolio.aulaPortfolio')?><div class="arrow-down"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-pages">
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.valorPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="index.html" class="dropdown-item"></i><?=lang('sidebarPortfolio.valorPortfolio')?></a>
                    <a href="layouts-detached.html" class="dropdown-item"></i><?=lang('sidebarPortfolio.aumentaValorPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.aulaPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('classePortfolio.classeUrlPortfolio')) ?>" class="dropdown-item"></i><?=lang('sidebarPortfolio.aulaPortfolio')?></a>
                    <a href="<?=base_url(lang('classePortfolio.aumentaClasseUrlPortfolio')) ?>" class="dropdown-item"></i><?=lang('sidebarPortfolio.aumentaAulaPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.materiaKursus')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('materiaKursusFunsionario.materiaKursussUrlPortfolio')) ?>" class="dropdown-item"></i><?=lang('sidebarPortfolio.materiaKursus')?></a>
                    <a href="<?=base_url(lang('materiaKursusFunsionario.aumentamateriaKursussUrlPortfolio')) ?>" class="dropdown-item"></i><?=lang('sidebarPortfolio.aumentaMateriaKursus')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.materiaProfessoresPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('materiaProfessores.materiaProfessoresPortfolioUrlPortfolio')) ?>" class="dropdown-item"></i><?=lang('sidebarPortfolio.materiaProfessoresPortfolio')?></a>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=lang('sidebarPortfolio.horarioPortfolio')?><div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="<?=base_url(lang('horarioProfessores.horarioPortfolioUrlPortofolio')) ?>" class="dropdown-item"></i><?=lang('sidebarPortfolio.horarioPortfolio')?></a>
                    <a href="<?=base_url(lang('horarioProfessores.detailHotuHorarioProfessoresUrlPortfolio')) ?>" class="dropdown-item"></i><?=lang('sidebarPortfolio.hotuHorarioPortfolio')?></a>
                </div>
            </div>
        </div>
    </li>
</ul>