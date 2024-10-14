<ul class="metismenu" id="menu">
    <!-- <li class="nav-label first">Main Menu</li> -->
    <?php if (session()->sistema_administrator == 2) { ?>
    <?php
        $naran = helperFunsionario()->naran_kompleto;
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('direito_acesso');
        $builder->select('*');

        $builder->join('menu_acesso', 'direito_acesso.id_administrator_acesso  = menu_acesso.id_menu_acesso', 'menu_profile', 'sistemmenu_finansa','menu_funsionario','menu_profesores','menu_estudante','menu_kategoria_materia','menu_kursus_projeito','menu_classe_horario', 'menu_sertifikado','left');

        $builder->join('administrator', 'menu_acesso.menu_administrator  = administrator.id_administrator', 'naran_kompleto', 'naran_ikus','naran_primeiro','email', 'status_servisu', 'left');

        $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'kode_sistema', 'sistema','left');

        $builder->where('id_administrator', session('id_administrator'));
        $builder->where('naran_kompleto=', $naran);
        $query = $builder->get()->getResult(); 
        ?>
        <?php foreach($query as $acesso): ?>
        <li><a class="ai-icon" href="<?= base_url(lang('homeLogin.homeUrlfunsionario')) ?>" aria-expanded="false">
                <i class="la la-home"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.dashboardPortfolio')?></span>
            </a>
        </li>
        <!-- Profile -->
        <?php if ($acesso->menu_profile == 1) {?>
            <li><a class="ai-icon" href="<?= base_url(lang('profileFunsionario.profilefunsionarioUrlPortfolio')) ?>" aria-expanded="false">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <span class="nav-text"><?=lang('sidebarPortfolio.profilePortfolio')?></span>
                </a>
            </li>
        <?php  } ?>
        <!-- Finansa -->
        <?php if ($acesso->menu_finansa == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-money" aria-hidden="true"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.saldoFinanca')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->total_saldo == 1 && $acesso->menu_finansa == 1) { ?>
                    <li><a href="<?= base_url(lang('homeLogin.totalsaldoUrlFunsionario')) ?>"><?=lang('saldoPortfolio.totalSaldo')?></a></li>
                <?php } ?>

                <?php if ($acesso->total_osan_tama == 1 && $acesso->menu_finansa == 1) {?>
                    <li><a href="<?= base_url(lang('saldodonatorFunsionario.saldoDonatorFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.saldoTamaPrivado')?></a></li>
                <?php } ?>

                <?php if ($acesso->salario_funsionario == 1 && $acesso->menu_finansa == 1) {?>
                    <li><a href="<?= base_url(lang('salarioFunsionario.salarioFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.salarioFunionarioPortfolio')?></a></li>
                <?php } ?>

                <?php if ($acesso->salario_professores == 1 && $acesso->menu_finansa == 1) {?>
                    <li><a href="<?= base_url(lang('salarioProfessores.salarioProfessoresUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.salarioProfessoresPortfolio')?></a></li>
                <?php } ?>

                <?php if ($acesso->osan_impresta_funsionario == 1 && $acesso->menu_finansa == 1) {?>
                    <li><a href="<?= base_url(lang('imprestaSalarioFunsionario.imprestaSalarioFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.imprestasalarioFunsionarioPortfolio')?></a></li>
                <?php } ?>

                <?php if ($acesso->osan_impresta_professores == 1 && $acesso->menu_finansa == 1) {?>
                    <li><a href="<?= base_url(lang('imprestaSalarioProfessores.imprestaSalarioProfessoresUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.imprestasalarioProfessoresPortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->osan_subsidio == 1 && $acesso->menu_finansa == 1) {?>
                    <li><a href="<?= base_url(lang('subsidioPortfolio.subsidioUrlfunsionario')) ?>"><?=lang('sidebarPortfolio.subsidioPortfolio')?></a></li>
                <?php } ?>

            </ul>
        </li>
        <?php  } ?>
        <!-- Funsionario -->
        <?php if ($acesso->menu_funsionario == 1) {?>            
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.employeePortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->funsionario == 1 && $acesso->menu_funsionario == 1) {?>
                    <li><a href="<?= base_url(lang('employeeFunsionario.employeeUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.employeePortfolio')?></a></li>
                <?php } ?>
            </ul>
        </li>
        <?php  } ?>

        <!-- Professores -->
        <?php if ($acesso->menu_profesores == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-user-circle"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.teachersPortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->professores == 1 && $acesso->menu_profesores == 1) {?>
                    <li><a href="<?= base_url(lang('teacherFunsionario.teacherUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.teachersPortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->materia_professores == 1 && $acesso->menu_profesores == 1) {?>
                    <li><a href="<?= base_url(lang('materiaProfessores.materiaProfessoresUrlPortfolio')) ?>"><?=lang('sidebarPortfolio.materiaProfessoresPortfolio')?></a></li>
                <?php } ?>
            </ul>
        </li>
        <?php  } ?>

        <!-- Estudante -->
        <?php if ($acesso->menu_estudante == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-users"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.estudantePortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->estudante == 1 && $acesso->menu_estudante == 1) {?>
                    <li><a href="<?= base_url(lang('registuEstudanteFunsionario.estudanteRegistoUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.estudantePortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->valores == 1 && $acesso->menu_estudante == 1) {?>
                    <li><a href="<?= base_url(lang('valoresEstudanteFunsionario.valoresEstudanteFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.valorPortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->valores == 1 && $acesso->menu_estudante == 1) {?>
                    <li><a href="<?= base_url(lang('paymentsEstudante.paymentsEstudanteUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.seluPortfolio')?></a></li>
                <?php } ?>
            </ul>
        </li>	
        <?php  } ?>	
        
        <!-- Kategorio Materia -->
        <?php if ($acesso->menu_kategoria_materia == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-folder"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.categoriaPortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->kategorio_materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
                    <li><a href="<?= base_url(lang('materiaKursusFunsionario.materiaKursusUrlPortfolio')) ?>"><?=lang('sidebarPortfolio.materiaKursus')?></a></li>
                <?php } ?>
                <?php if ($acesso->kategorio_materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
                    <li><a href="<?= base_url(lang('sciensieCategoryFunsionario.sciensieCategoryFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.categoriaPortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
                    <li><a href="<?= base_url(lang('sciensieFunsionario.sciensieFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.materiaPortfolio')?></a></li>
                <?php } ?>
            </ul>
        </li>
        <?php  } ?>
        
        <!-- Kursus Projeito -->
        <?php if ($acesso->menu_kursus_projeito == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-folder-open"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.projeitoPortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->kursus_projeito == 1 && $acesso->menu_kursus_projeito) {?>
                    <li><a href="<?= base_url(lang('categorioProjeitoFunsionario.categorioBackendFrontendUrlPortfolio')) ?>"><?=lang('sidebarPortfolio.projeitoPortfolio')?></a></li>
                <?php } ?>
            </ul>
        </li>	
        <?php  } ?>

        <!-- Classe Horario -->
        <?php if ($acesso->menu_classe_horario == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.aulaPortfolio')?> & <?=lang('sidebarPortfolio.jadwalPortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->classe == 1 && $acesso->menu_classe_horario == 1) {?>
                    <li><a href="<?=base_url(lang('roomFunsionario.roomFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.aulaPortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->horario_kursus == 1 && $acesso->menu_classe_horario == 1) {?>
                    <li><a href="<?=base_url(lang('horarioProfessores.horarioFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.horarioPortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->horario_kursus_hotu == 1 && $acesso->menu_classe_horario == 1) {?>
                    <li><a href="<?=base_url(lang('horarioProfessores.detailHotuHorarioFunsionarioUrlPortfolio')) ?>"><?=lang('sidebarPortfolio.hotuHorarioPortfolio')?></a></li>
                <?php } ?>
    
            </ul>
        </li>	
        <?php  } ?>	

        <?php if ($acesso->menu_sertifikado == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.certifikadoPortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <li><a href="all-students.html"><?=lang('sidebarPortfolio.certifikadoPortfolio')?></a></li>
            </ul>
        </li>	
        <?php  } ?>	
    <?php endforeach;?>				
    <?php }elseif (session()->sistema_administrator == 3) {?>
        <?php
            $naran = helperProfessores()->naran_kompleto;
            $this->db = \Config\Database::connect();
            $builder = $this->db->table('direito_acesso');
            $builder->select('*');

            $builder->join('menu_acesso', 'direito_acesso.id_administrator_acesso  = menu_acesso.id_menu_acesso', 'menu_profile', 'sistemmenu_finansa','menu_funsionario','menu_profesores','menu_estudante','menu_kategoria_materia','menu_kursus_projeito','menu_classe_horario', 'menu_sertifikado','left');

            $builder->join('administrator', 'menu_acesso.menu_administrator  = administrator.id_administrator', 'naran_kompleto', 'naran_ikus','naran_primeiro','email', 'status_servisu', 'left');

            $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'kode_sistema', 'sistema','left');

            $builder->where('id_administrator', session('id_administrator'));
            $builder->where('naran_kompleto=', $naran);
            $query = $builder->get()->getResult(); 
        ?>
        <?php foreach($query as $acesso): ?>
        <li><a class="ai-icon" href="<?= base_url(lang('homeLogin.homeUrlfunsionario')) ?>" aria-expanded="false">
                <i class="la la-home"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.dashboardPortfolio')?></span>
            </a>
        </li>
        <!-- Profile -->
        <?php if ($acesso->menu_profile == 1) {?>
            <li><a class="ai-icon" href="<?= base_url(lang('profileFunsionario.profilefunsionarioUrlPortfolio')) ?>" aria-expanded="false">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <span class="nav-text"><?=lang('sidebarPortfolio.profilePortfolio')?></span>
                </a>
            </li>
        <?php  } ?>

        <!-- Finansa -->
        <?php if ($acesso->menu_finansa == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-money" aria-hidden="true"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.saldoFinanca')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->total_saldo == 1 && $acesso->menu_finansa == 1) { ?>
                    <li><a href="<?= base_url(lang('homeLogin.totalsaldoUrlFunsionario')) ?>"><?=lang('saldoPortfolio.totalSaldo')?></a></li>
                <?php } ?>

                <?php if ($acesso->total_osan_tama == 1 && $acesso->menu_finansa == 1) {?>
                    <li><a href="<?= base_url(lang('saldodonatorFunsionario.saldoDonatorFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.saldoTamaPrivado')?></a></li>
                <?php } ?>

                <?php if ($acesso->salario_funsionario == 1 && $acesso->menu_finansa == 1) {?>
                    <li><a href="<?= base_url(lang('salarioFunsionario.salarioFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.salarioFunionarioPortfolio')?></a></li>
                <?php } ?>

                <?php if ($acesso->salario_professores == 1 && $acesso->menu_finansa == 1) {?>
                    <li><a href="<?= base_url(lang('salarioProfessores.salarioProfessoresUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.salarioProfessoresPortfolio')?></a></li>
                <?php } ?>

                <?php if ($acesso->osan_impresta_funsionario == 1 && $acesso->menu_finansa == 1) {?>
                    <li><a href="<?= base_url(lang('imprestaSalarioFunsionario.imprestaSalarioFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.imprestasalarioFunsionarioPortfolio')?></a></li>
                <?php } ?>

                <?php if ($acesso->osan_impresta_professores == 1 && $acesso->menu_finansa == 1) {?>
                    <li><a href="<?= base_url(lang('imprestaSalarioProfessores.imprestaSalarioProfessoresUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.imprestasalarioProfessoresPortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->osan_subsidio == 1 && $acesso->menu_finansa == 1) {?>
                    <li><a href="<?= base_url(lang('subsidioPortfolio.subsidioUrlfunsionario')) ?>"><?=lang('sidebarPortfolio.subsidioPortfolio')?></a></li>
                <?php } ?>

            </ul>
        </li>
        <?php  } ?>

        <!-- Funsionario -->
        <?php if ($acesso->menu_funsionario == 1) {?>            
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.employeePortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->funsionario == 1 && $acesso->menu_funsionario == 1) {?>
                    <li><a href="<?= base_url(lang('employeeFunsionario.employeeUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.employeePortfolio')?></a></li>
                <?php } ?>
            </ul>
        </li>
        <?php  } ?>

        <!-- Professores -->
        <?php if ($acesso->menu_profesores == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-user-circle"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.teachersPortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->professores == 1 && $acesso->menu_profesores == 1) {?>
                    <li><a href="<?= base_url(lang('teacherFunsionario.teacherUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.teachersPortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->materia_professores == 1 && $acesso->menu_profesores == 1) {?>
                    <li><a href="<?= base_url(lang('materiaProfessores.materiaProfessoresUrlPortfolio')) ?>"><?=lang('sidebarPortfolio.materiaProfessoresPortfolio')?></a></li>
                <?php } ?>
            </ul>
        </li>
        <?php  } ?>

        <!-- Estudante -->
        <?php if ($acesso->menu_estudante == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-users"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.estudantePortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->estudante == 1 && $acesso->menu_estudante == 1) {?>
                    <li><a href="<?= base_url(lang('registuEstudanteFunsionario.estudanteRegistoUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.estudantePortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->valores == 1 && $acesso->menu_estudante == 1) {?>
                    <li><a href="<?= base_url(lang('valoresEstudanteFunsionario.valoresEstudanteFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.valorPortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->valores == 1 && $acesso->menu_estudante == 1) {?>
                    <li><a href="<?= base_url(lang('paymentsEstudante.paymentsEstudanteUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.seluPortfolio')?></a></li>
                <?php } ?>
            </ul>
        </li>	
        <?php  } ?>	
        
        <!-- Kategorio Materia -->
        <?php if ($acesso->menu_kategoria_materia == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-folder"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.categoriaPortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->kategorio_materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
                    <li><a href="<?= base_url(lang('materiaKursusFunsionario.materiaKursusUrlPortfolio')) ?>"><?=lang('sidebarPortfolio.materiaKursus')?></a></li>
                <?php } ?>
                <?php if ($acesso->kategorio_materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
                    <li><a href="<?= base_url(lang('sciensieCategoryFunsionario.sciensieCategoryFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.categoriaPortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
                    <li><a href="<?= base_url(lang('sciensieFunsionario.sciensieFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.materiaPortfolio')?></a></li>
                <?php } ?>
            </ul>
        </li>
        <?php  } ?>
        
        <!-- Kursus Projeito -->
        <?php if ($acesso->menu_kursus_projeito == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-folder-open"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.projeitoPortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->kursus_projeito == 1 && $acesso->menu_kursus_projeito) {?>
                    <li><a href="<?= base_url(lang('categorioProjeitoFunsionario.categorioBackendFrontendUrlPortfolio')) ?>"><?=lang('sidebarPortfolio.projeitoPortfolio')?></a></li>
                <?php } ?>
            </ul>
        </li>	
        <?php  } ?>

        <!-- Classe Horario -->
        <?php if ($acesso->menu_classe_horario == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.aulaPortfolio')?> & <?=lang('sidebarPortfolio.jadwalPortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <?php if ($acesso->classe == 1 && $acesso->menu_classe_horario == 1) {?>
                    <li><a href="<?=base_url(lang('roomFunsionario.roomFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.aulaPortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->horario_kursus == 1 && $acesso->menu_classe_horario == 1) {?>
                    <li><a href="<?=base_url(lang('horarioProfessores.horarioFunsionarioUrlPortofolio')) ?>"><?=lang('sidebarPortfolio.horarioPortfolio')?></a></li>
                <?php } ?>
                <?php if ($acesso->horario_kursus_hotu == 1 && $acesso->menu_classe_horario == 1) {?>
                    <li><a href="<?=base_url(lang('horarioProfessores.detailHotuHorarioFunsionarioUrlPortfolio')) ?>"><?=lang('sidebarPortfolio.hotuHorarioPortfolio')?></a></li>
                <?php } ?>
    
            </ul>
        </li>	
        <?php  } ?>	

        <?php if ($acesso->menu_sertifikado == 1) {?>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                <span class="nav-text"><?=lang('sidebarPortfolio.certifikadoPortfolio')?></span>
            </a>
            <ul aria-expanded="false">
                <li><a href="all-students.html"><?=lang('sidebarPortfolio.certifikadoPortfolio')?></a></li>
            </ul>
        </li>	
        <?php  } ?>	
    <?php endforeach;?>
    <?php } ?>
</ul>