<?= $this->extend('templateestudante/header') ?>

<?= $this->section('estudante') ?>
    <title><?=lang('categorioPortfolio.categorioCategorio')?></title>
<?= $this->endSection() ?>

<?= $this->section('estudante') ?>
 <!-- START HERO -->

    <!-- START SERVICES -->
    <section class="py-5">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="mt-0"><i class="mdi mdi-infinity"></i></h1>
                        <h3><?=lang('homeEstudante.funsionarioEstudante')?></h3></h3>
                        <p class="text-muted mt-2"><?=lang('homeEstudante.informasaunFunsionarioEstudante')?></p>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php foreach($funsionario as $pro): ?>
                <?php if ($pro->sistema == 'Direktor') { ?>
                <div class="col-md-4">
                    <div class="card border-success border">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="m-auto">
                                    <span class="rounded-circle">
                                        <img src="<?= base_url('uploads/fotoportfolio/'.$pro->image_administrator)?>" style="width: 80px; height: 9vh;" class="img-fluid rounded-circle mb-3" alt="">
                                    </span>
                                </div>
                                <h5 class="card-title"><?=lang('homeEstudante.direktor')?></h5>
                                <p class="card-text"><?= $pro->naran_kompleto?><sub class="text-danger">(<?=$pro->titulo_funsionario?>)</sub></p>
                                <h6 class="text-muted mt-2 mb-0"><?= $pro->fatin_moris?></h6>
                                <h6 class="text-muted mt-2 mb-0">(<?= $pro->loron_moris?>)</h6>
                                <?php if ($pro->jenero == 'Mane') {?>
                                    <h5 class="text-muted mt-2 mb-0"><?=lang('homeEstudante.mane')?></h5>
                                <?php }else {?>
                                    <h5 class="text-muted mt-2 mb-0"><?=lang('homeEstudante.feto')?></h5>
                                <?php } ?>
                                <h4><b>$<?= number_format($pro->total_salario,2)?></b></h4>
                                <a href="" class="text-success ms-2"><strong><i class="mdi mdi-file"></i>>><?=lang('homeEstudante.detail')?><<<i class="mdi mdi-file"></i></strong></a>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <?php } ?>
            <?php endforeach; ?>
            <?php foreach($funsionario as $pro): ?>
                <?php if ($pro->sistema == 'Administrasaun') { ?>
                <div class="col-md-4">
                    <div class="card border-warning border">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="m-auto">
                                    <span class="rounded-circle">
                                        <img src="<?= base_url('uploads/fotoportfolio/'.$pro->image_administrator)?>" style="width: 80px; height: 9vh;" class="img-fluid rounded-circle mb-3" alt="">
                                    </span>
                                </div>
                                <h5 class="card-title"><?=lang('homeEstudante.funsionario')?></h5>
                                <p class="card-text"><?= $pro->naran_kompleto?><sub class="text-danger">(<?=$pro->titulo_funsionario?>)</sub></p>
                                <h6 class="text-muted mt-2 mb-0"><?= $pro->fatin_moris?></h6>
                                <h6 class="text-muted mt-2 mb-0">(<?= $pro->loron_moris?>)</h6>
                                <?php if ($pro->jenero == 'Mane') {?>
                                    <h5 class="text-muted mt-2 mb-0"><?=lang('homeEstudante.mane')?></h5>
                                <?php }else {?>
                                    <h5 class="text-muted mt-2 mb-0"><?=lang('homeEstudante.feto')?></h5>
                                <?php } ?>
                                <h4><b>$<?= number_format($pro->total_salario,2)?></b></h4>
                                <a href="" class="text-warning ms-2"><strong><i class="mdi mdi-file"></i>>><?=lang('homeEstudante.detail')?><<<i class="mdi mdi-file"></i></strong></a>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <?php } ?>
                <?php endforeach; ?>
            <?php foreach($professores as $pro): ?>
                <?php if ($pro->sistema == 'Professores') { ?>
                <div class="col-md-4">
                    <div class="card border-secondary border">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="m-auto">
                                    <span class="rounded-circle">
                                        <img src="<?= base_url('uploads/fotoportfolio/'.$pro->image_administrator)?>" style="width: 80px; height: 9vh;" class="img-fluid rounded-circle mb-3" alt="">
                                    </span>
                                </div>
                                <h5 class="card-title"><?=lang('homeEstudante.professores')?></h5>
                                <p class="card-text"><?= $pro->naran_kompleto?><sub class="text-danger">(<?=$pro->titulo_professores?>)</sub></p>
                                <h6 class="text-muted mt-2 mb-0"><?= $pro->fatin_moris?></h6>
                                <h6 class="text-muted mt-2 mb-0">(<?= $pro->loron_moris?>)</h6>
                                <?php if ($pro->jenero == 'Mane') {?>
                                    <h5 class="text-muted mt-2 mb-0"><?=lang('homeEstudante.mane')?></h5>
                                <?php }else {?>
                                    <h5 class="text-muted mt-2 mb-0"><?=lang('homeEstudante.feto')?></h5>
                                <?php } ?>
                                <h4><b>$<?= number_format($pro->total_salario,2)?></b></h4>
                                <a href="" class="text-secondary ms-2"><strong><i class="mdi mdi-file"></i>>><?=lang('homeEstudante.detail')?><<<i class="mdi mdi-file"></i></strong></a>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <?php } ?>
                <?php endforeach; ?>
            </div> <!-- end row -->
            <div class="row py-4">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="mt-0"><i class="mdi mdi-infinity"></i></h1>
                        <h3><?=lang('homeEstudante.judulMateriaEstudante')?></h3>
                        <p class="text-muted mt-2"><?=lang('homeEstudante.informasaunMateriaEstudante')?></p>
                    </div>
                </div>
            </div>

            <div class="row">
            <?php foreach($materia as $pro): ?>
                <div class="col-lg-4" width="25%">
                    <div class="text-center p-3">
                        <div class="avatar-sm m-auto">
                            <span class="avatar-title bg-primary-lighten rounded-circle">
                                <i class="uil uil-book-open text-primary font-24"></i>
                            </span>
                        </div>
                        <h4 class="mt-3"><?= $pro->materia_kursus?></h4>
                        <h5 class="mt-3"><?= $pro->level_materia_kursus?></h5>
                        <h4 class="mt-3">$<?= number_format( $pro->preso_materia_kursus, 2)?></h4>
                        <p class="text-muted mt-2 mb-0"><?=lang('homeEstudante.materiaEstudante')?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- <div class="row">
                <div class="col-lg-4">
                    <div class="text-center p-3">
                        <div class="avatar-sm m-auto">
                            <span class="avatar-title bg-primary-lighten rounded-circle">
                                <i class="uil uil-apps text-primary font-24"></i>
                            </span>
                        </div>
                        <h4 class="mt-3">Multiple Applications</h4>
                        <p class="text-muted mt-2 mb-0">Et harum quidem rerum as expedita distinctio nam libero tempore
                            cum soluta nobis est cumque quo.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="text-center p-3">
                        <div class="avatar-sm m-auto">
                            <span class="avatar-title bg-primary-lighten rounded-circle">
                                <i class="uil uil-shopping-cart-alt text-primary font-24"></i>
                            </span>
                        </div>
                        <h4 class="mt-3">Ecommerce Pages</h4>
                        <p class="text-muted mt-2 mb-0">Temporibus autem quibusdam et aut officiis necessitatibus saepe
                            eveniet ut sit et recusandae.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="text-center p-3">
                        <div class="avatar-sm m-auto">
                            <span class="avatar-title bg-primary-lighten rounded-circle">
                                <i class="uil uil-grids text-primary font-24"></i>
                            </span>
                        </div>
                        <h4 class="mt-3">Multiple Layouts</h4>
                        <p class="text-muted mt-2 mb-0">Nam libero tempore, cum soluta a est eligendi minus id quod
                            maxime placeate facere assumenda est.
                        </p>
                    </div>
                </div>
            </div> -->
            <div class="row py-4">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="mt-0"><i class="mdi mdi-infinity"></i></h1>
                        <h3><?=lang('homeEstudante.funsionarioEstudante')?></h3></h3>
                        <p class="text-muted mt-2"><?=lang('homeEstudante.informasaunFunsionarioEstudante')?></p>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php foreach($materiaestudante as $pro): ?>
                <div class="col-md-4">
                    <div class="card border-success border">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="m-auto">
                                    <span class="rounded-circle">
                                        <img src="<?= base_url('uploads/fotoportfolio/'.$pro->image_administrator)?>" style="width: 80px; height: 9vh;" class="img-fluid rounded-circle mb-3" alt="">
                                    </span>
                                </div>
                                <h5 class="card-title"><?=lang('homeEstudante.professores')?></h5>
                                <p class="card-text"><?= $pro->naran_kompleto_professores?><sub class="text-danger">(<?=$pro->titulo_professores?>)</sub></p>
                                <h6 class="text-muted mt-2 mb-0"><?= $pro->kode_materia_estudante?>(<?= $pro->materia_horario_estudante?>)</h6>
                                <h6 class="text-muted mt-2 mb-2">(<?= $pro->level_horario_estudante?>)</h6>
                                <a href="<?= base_url(lang('horarioEstudante.detailMateriaUrlPortofolio').$pro->id_administrator.'/'.$pro->materia_horario_estudante) ?>" class="text-success ms-2"><strong><i class="mdi mdi-file"></i>>><?=lang('homeEstudante.detailMateria')?><<<i class="mdi mdi-file"></i></strong></a>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- END SERVICES -->

    <!-- START FEATURES 1 -->
    <section class="py-5 bg-light-lighten border-top border-bottom border-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h3>Flexible <span class="text-primary">Layouts</span></h3>
                        <p class="text-muted mt-2">There are three different layout options available to cater need for
                            any <br> modern web
                            application.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-4">
                    <div class="demo-box text-center">
                        <img src="<?= base_url()?>templateadministrator/assets/images/layouts/layout-1.png" alt="demo-img" class="img-fluid shadow-sm rounded">
                        <h5 class="mt-3 f-17">Vertical Layout</h5>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="demo-box text-center mt-3 mt-lg-0">
                        <img src="<?= base_url()?>templateadministrator/assets/images/layouts/layout-2.png" alt="demo-img" class="img-fluid shadow-sm rounded">
                        <h5 class="mt-3 f-17">Horizontal Layout</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="demo-box text-center mt-3 mt-lg-0">
                        <img src="<?= base_url()?>templateadministrator/assets/images/layouts/layout-3.png" alt="demo-img" class="img-fluid shadow-sm rounded">
                        <h5 class="mt-3 f-17">Detached Layout</h5>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                
                <div class="col-lg-4">
                    <div class="demo-box text-center">
                        <img src="<?= base_url()?>templateadministrator/assets/images/layouts/layout-5.png" alt="demo-img" class="img-fluid shadow-sm rounded">
                        <h5 class="mt-3 f-17">Light Sidenav Layout</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="demo-box text-center mt-3 mt-lg-0">
                        <img src="<?= base_url()?>templateadministrator/assets/images/layouts/layout-6.png" alt="demo-img" class="img-fluid shadow-sm rounded">
                        <h5 class="mt-3 f-17">Boxed Layout</h5>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="demo-box text-center mt-3 mt-lg-0">
                        <img src="<?= base_url()?>templateadministrator/assets/images/layouts/layout-4.png" alt="demo-img" class="img-fluid shadow-sm rounded">
                        <h5 class="mt-3 f-17">Semi Dark Layout</h5>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- END FEATURES 1 -->

    <!-- START FEATURES 2 -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="mt-0"><i class="mdi mdi-heart-multiple-outline"></i></h1>
                        <h3>Features you'll <span class="text-danger">love</span></h3>
                        <p class="text-muted mt-2">Hyper comes with next generation ui design and have multiple benefits
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-2 py-5 align-items-center">
                <div class="col-lg-5">
                    <img src="<?= base_url()?>templateadministrator/assets/images/features-1.svg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h3 class="fw-normal">Inbuilt applications and pages</h3>
                    <p class="text-muted mt-3">Hyper comes with a variety of ready-to-use applications and pages that help to speed up the development</p>

                    <div class="mt-4">
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i> Projects & Tasks</p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i> Ecommerce Application Pages</p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i> Profile, pricing, invoice</p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i> Login, signup, forget password</p>
                    </div>

                    <a href="" class="btn btn-primary btn-rounded mt-3">Read More <i class="mdi mdi-arrow-right ms-1"></i></a>

                </div>
            </div>

            <div class="row pb-3 pt-5 align-items-center">
                <div class="col-lg-6">
                    <h3 class="fw-normal">Simply beautiful design</h3>
                    <p class="text-muted mt-3">The simplest and fastest way to build dashboard or admin panel. Hyper is built using the latest tech and tools and provide an easy way to customize anything, including an overall color schemes, layout, etc.</p>

                    <div class="mt-4">
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Built with latest Bootstrap</p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Extensive use of SCSS variables</p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Well documented and structured code</p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Detailed Documentation</p>
                    </div>

                    <a href="" class="btn btn-success btn-rounded mt-3">Read More <i class="mdi mdi-arrow-right ms-1"></i></a>

                </div>
                <div class="col-lg-5 offset-lg-1">
                    <img src="<?= base_url()?>templateadministrator/assets/images/features-2.svg" class="img-fluid" alt="">
                </div>
            </div>

        </div>
    </section>
    <section class="py-5 bg-light-lighten border-top border-bottom border-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h1 class="mt-0"><i class="mdi mdi-tag-multiple"></i></h1>
                            <h3>Choose Simple <span class="text-primary">Pricing</span></h3>
                            <p class="text-muted mt-2">The clean and well commented code allows easy customization of the
                                theme.It's designed for
                                <br>describing your app, agency or business.</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 pt-3">
                    <div class="col-md-4">
                        <div class="card card-pricing">
                            <div class="card-body text-center">
                                <p class="card-pricing-plan-name fw-bold text-uppercase">Standard License </p>
                                <i class="card-pricing-icon dripicons-user text-primary"></i>
                                <h2 class="card-pricing-price">$49 <span>/ License</span></h2>
                                <ul class="card-pricing-features">
                                    <li>10 GB Storage</li>
                                    <li>500 GB Bandwidth</li>
                                    <li>No Domain</li>
                                    <li>1 User</li>
                                    <li>Email Support</li>
                                    <li>24x7 Support</li>
                                </ul>
                                <button class="btn btn-primary mt-4 mb-2 btn-rounded">Choose Plan</button>
                            </div>
                        </div>
                        <!-- end Pricing_card -->
                    </div>
                    <!-- end col -->

                    <div class="col-md-4">
                        <div class="card card-pricing card-pricing-recommended">
                            <div class="card-body text-center">
                                <div class="card-pricing-plan-tag">Recommended</div>
                                <p class="card-pricing-plan-name fw-bold text-uppercase">Multiple License</p>
                                <i class="card-pricing-icon dripicons-briefcase text-primary"></i>
                                <h2 class="card-pricing-price">$99 <span>/ License</span></h2>
                                <ul class="card-pricing-features">
                                    <li>50 GB Storage</li>
                                    <li>900 GB Bandwidth</li>
                                    <li>2 Domain</li>
                                    <li>10 User</li>
                                    <li>Email Support</li>
                                    <li>24x7 Support</li>
                                </ul>
                                <button class="btn btn-primary mt-4 mb-2 btn-rounded">Choose Plan</button>
                            </div>
                        </div>
                        <!-- end Pricing_card -->
                    </div>
                    <!-- end col -->

                    <div class="col-md-4">
                        <div class="card card-pricing">
                            <div class="card-body text-center">
                                <p class="card-pricing-plan-name fw-bold text-uppercase">Extended License</p>
                                <i class="card-pricing-icon dripicons-store text-primary"></i>
                                <h2 class="card-pricing-price">$599 <span>/ License</span></h2>
                                <ul class="card-pricing-features">
                                    <li>100 GB Storege</li>
                                    <li>Unlimited Bandwidth</li>
                                    <li>10 Domain</li>
                                    <li>Unlimited User</li>
                                    <li>Email Support</li>
                                    <li>24x7 Support</li>
                                </ul>
                                <button class="btn btn-primary mt-4 mb-2 btn-rounded">Choose Plan</button>
                            </div>
                        </div>
                        <!-- end Pricing_card -->
                    </div>
                    <!-- end col -->

                </div>

            </div>
        </section>
        <!-- END PRICING -->
        <!-- START FAQ -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h1 class="mt-0"><i class="mdi mdi-frequently-asked-questions"></i></h1>
                            <h3>Frequently Asked <span class="text-primary">Questions</span></h3>
                            <p class="text-muted mt-2">Here are some of the basic types of questions for our customers. For more 
                                <br>information please contact us.</p>

                            <button type="button" class="btn btn-success btn-sm mt-2"><i class="mdi mdi-email-outline me-1"></i> Email us your question</button>
                            <button type="button" class="btn btn-info btn-sm mt-2 ms-1"><i class="mdi mdi-twitter me-1"></i> Send us a tweet</button>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-5 offset-lg-1">
                        <!-- Question/Answer -->
                        <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question text-body">Can I use this template for my client?</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">Yup, the marketplace license allows you to use this theme
                                in any end products.
                                For more information on licenses, please refere <a href="../../licenses/index.htm" target="_blank">here</a>.</p>
                        </div>

                        <!-- Question/Answer -->
                        <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question text-body">How do I get help with the theme?</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">Use our dedicated support email (support@coderthemes.com) to send your issues or feedback. We are here to help anytime.</p>
                        </div>

                    </div>
                    <!--/col-lg-5 -->

                    <div class="col-lg-5">
                        <!-- Question/Answer -->
                        <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question text-body">Can this theme work with Wordpress?</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">No. This is a HTML template. It won't directly with
                                wordpress, though you can convert this into wordpress compatible theme.</p>
                        </div>

                        <!-- Question/Answer -->
                        <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question text-body">Will you regularly give updates of Hyper?</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">Yes, We will update the Hyper regularly. All the
                                future updates would be available without any cost.</p>
                        </div>

                    </div>
                    <!--/col-lg-5-->
                </div>
                <!-- end row -->

            </div> <!-- end container-->
        </section>
        <!-- END FAQ -->
        <!-- START CONTACT -->
        <section class="py-5 bg-light-lighten border-top border-bottom border-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3>Get In <span class="text-primary">Touch</span></h3>
                            <p class="text-muted mt-2">Please fill out the following form and we will get back to you shortly. For more 
                                <br>information please contact us.</p>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center mt-3">
                    <div class="col-md-4">
                        <p class="text-muted"><span class="fw-bold">Customer Support:</span><br> <span class="d-block mt-1">+1 234 56 7894</span></p>
                        <p class="text-muted mt-4"><span class="fw-bold">Email Address:</span><br> <span class="d-block mt-1">info@gmail.com</span></p>
                        <p class="text-muted mt-4"><span class="fw-bold">Office Address:</span><br> <span class="d-block mt-1">4461 Cedar Street Moro, AR 72368</span></p>
                        <p class="text-muted mt-4"><span class="fw-bold">Office Time:</span><br> <span class="d-block mt-1">9:00AM To 6:00PM</span></p>
                    </div>

                    <div class="col-md-8">
                        <form>
                            <div class="row mt-4">
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="fullname" class="form-label">Your Name</label>
                                        <input class="form-control form-control-light" type="text" id="fullname" placeholder="Name...">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="emailaddress" class="form-label">Your Email</label>
                                        <input class="form-control form-control-light" type="email" required="" id="emailaddress" placeholder="Enter you email...">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-lg-12">
                                    <div class="mb-2">
                                        <label for="subject" class="form-label">Your Subject</label>
                                        <input class="form-control form-control-light" type="text" id="subject" placeholder="Enter subject...">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-lg-12">
                                    <div class="mb-2">
                                        <label for="comments" class="form-label">Message</label>
                                        <textarea id="comments" rows="4" class="form-control form-control-light" placeholder="Type your message here..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-12 text-end">
                                    <button class="btn btn-primary">Send a Message <i class="mdi mdi-telegram ms-1"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- END CONTACT -->

<?= $this->endSection() ?>