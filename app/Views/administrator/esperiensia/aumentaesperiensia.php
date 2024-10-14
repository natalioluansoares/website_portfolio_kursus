<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentaEsperiensiaPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaEsperiensiaPortfolio')?></h4>
            </div>
        </div>
    </div>
</div>
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
                <div class="tab-content">
                    <?php $errors = session()->getFlashdata('errors'); ?>
                    <div class="tab-pane show active" id="form-row-preview">
                        <form action="<?=base_url(lang('esperiensiaPortfolio.inputEsperiensiaUrlPortfolio')) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('esperiensiaPortfolio.fatinEsperiensia')?></label>
                                    <input type="text" name="fatin_esperiensia" value="<?=old('fatin_esperiensia') ?>" class="form-control <?=isset($errors['fatin_esperiensia']) ? 'is-invalid' : null ?>" id="inputEmail4" placeholder="<?=lang('esperiensiaPortfolio.fatinEsperiensia')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['fatin_esperiensia']) ?  $errors['fatin_esperiensia'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('esperiensiaPortfolio.dataEsperiensia')?></label>
                                    <input type="date" name="loron_esperiensia" value="<?=old('loron_esperiensia') ?>" class="form-control <?=isset($errors['loron_esperiensia']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('esperiensiaPortfolio.dataEsperiensia')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['loron_esperiensia']) ?  $errors['loron_esperiensia'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('esperiensiaPortfolio.sistemaEsperiensia')?></label>
                                    <select name="esperiensia_administrator" id="" class="form-control <?=isset($errors['esperiensia_administrator']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('esperiensiaPortfolio.hiliSistemaEsperiensia')?></option>
                                        <?php foreach($administrator as $portfolio):?>
                                        <option value="<?=$portfolio->id_administrator ?>"<?= old('esperiensia_administrator') == $portfolio->id_administrator ? 'selected' : null ?>><?=$portfolio->naran_kompleto ?><sub>(<?=$portfolio->sistema ?>)</sub></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['esperiensia_administrator']) ?  $errors['esperiensia_administrator'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('esperiensiaPortfolio.lianEsperiensia')?></label>
                                    <select name="lian_esperiensia" id="" class="form-control <?=isset($errors['lian_esperiensia']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('esperiensiaPortfolio.hiliLianEsperiensia')?></option>
                                        <option value="<?=lang('esperiensiaPortfolio.lianEsperiensialPortfolio')?>"<?= old('lian_esperiensia') == lang('esperiensiaPortfolio.lianEsperiensialPortfolio') ? 'selected' : null ?>><?=lang('esperiensiaPortfolio.lianEsperiensialPortfolio')?></option>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['lian_esperiensia']) ?  $errors['lian_esperiensia'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label"><?=lang('esperiensiaPortfolio.imageEsperiensia')?></label>
                                    <input type="file" name="image_esperiensia" class="form-control <?=isset($errors['image_esperiensia']) ? 'is-invalid' : null ?>" id="inputEmail4" placeholder="<?=lang('esperiensiaPortfolio.fatinEsperiensia')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['image_esperiensia']) ?  $errors['image_esperiensia'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputPassword4" class="form-label"><?=lang('esperiensiaPortfolio.esperiensia')?></label>
                                    <textarea name="esperiensia" id="" cols="30" class="form-control <?=isset($errors['esperiensia']) ? 'is-invalid' : null ?>" rows="10"><?=old('esperiensia')?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['esperiensia']) ?  $errors['esperiensia'] : null ?>
                                    </div>
                                </div>
                            </div>
                           <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('esperiensiaPortfolio.esperiensiaUrlPortfolio'))?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('esperiensia');
</script>
<?= $this->endSection() ?>