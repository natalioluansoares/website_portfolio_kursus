

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edumin - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="<?= base_url(); ?>templatefunsionario/assets/css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text font-weight-bold">400</h1>
                        <h4><i class="fa fa-thumbs-down text-danger"></i> Bad Request</h4>
                        <p>Your Request resulted in an error</p>
						<div>
                            <a class="btn btn-primary" href="<?=base_url(lang('loginPortfolio.loginUrlEstudante'))?>"><?=lang('loginPortfolio.tamaLogin') ?></a>
                        </div>
                    </div><br>
                    <div class="text-center">
                        <div class="login-social-title" style="margin-bottom: 4%;">                
                            <h5>----- <?=lang('loginPortfolio.lianLogin') ?> -----</h5>
                        </div>
                        <div class="form-group">
                                <a href="<?= base_url('/Portuguesa/loginfunsionario/processologout')?>"><img style="width: 30px;" src="<?= base_url()?>templateadministrator/assets/images/flags/portugal_flag.jpg" alt=""></a>
                                <a href="<?= base_url('/Tetum/loginfunsionario/processologout')?>"><img style="width: 30px;" src="<?= base_url()?>templateadministrator/assets/images/flags/timor_leste_flag.jpg" alt=""></a>
                                <a href="<?= base_url('/English/loginfunsionario/processologout')?>"><img style="width: 30px;" src="<?= base_url()?>templateadministrator/assets/images/flags/us.jpg" alt=""></a>
                                <a href="<?= base_url('/Indonesia/loginfunsionario/processologout')?>"><img style="width: 30px;" src="<?= base_url()?>templateadministrator/assets/images/flags/indonesia_flag.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>