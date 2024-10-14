<!DOCTYPE html>
<html>

<head>
    <title><?=lang('sidebarPortfolio.hotuHorarioPortfolio')?></title>
    <style type="text/css">
        .border-table{
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
            font-family: 'Times New Roman', Times, serif;
        }
        .border-table th{
            border: 1 solid #000;
            font-weight: bold;
            font-size: 16px;
            text-align: center;
            background-color: #e1e1e1;
        }
        .border-table td{
            border: 1 solid #000;
            font-weight: bold;
            font-size: 16px;
            color: #000;
        }
    </style>
</head>
<body>
    <center>
        <table width ="100%">
            <thead>
                <tr>
                    <!-- <th align="center">
                        <img src="uploads/img/logo.jpg" class="rounded-circle" width="80px"> -->
                    <!-- </th> -->
                    <th data-priority="1">
                        <div align="center" style="font-size: 18px;">
                            <font size="4" style="font-family:Wide Latin">
                                <b>Website Haburas Matenek Liu Husi Kursus Timor-Leste</b><br>
                                <span style="font-family:Times New Roman">Bairo Pite, Dili, Timor-Leste <br>
                                Telp.(0380)833395- 831194</span>
                            </font><br>
                            Web:<span style="font-family:Times New Roman; color:#3366cc">
                               http//www.wehamak-tl.ac.id</span>
                            Email:<span style="font-family:Times New Roman; color:#3366cc">
                               bairopite.websitehaburasmatenekliuhusikursus@gmail.com</span>
                            <hr class="line-title">
                        </div>
                    </th>
                    <!-- <th align="center"> -->
                        <!-- <img src="template/assets/img/sigaru/TimorLeste.png" class="rounded-circle" width="80px"> -->
                    <!-- </th> -->
                </tr>
            </thead>
        </table>
    </center>
    <center>
        <p>
           <h3><strong><?=lang('sidebarPortfolio.subsidioPortfolio')?></strong></h3><br>
        </p>
    </center>
        <table class="border-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th><?=lang('subsidioPortfolio.naranSubsidio') ?></th>
                    <th><?=lang('subsidioPortfolio.Subsidio') ?></th>
                    <th><?=lang('subsidioPortfolio.timeSubsidio') ?></th>
                    <th><?=lang('subsidioPortfolio.dataHahuSubsidio') ?></th>
                    <th><?=lang('subsidioPortfolio.dataRemataSubsidio') ?></th>
                    <th><?=lang('subsidioPortfolio.dataSubsidio') ?></th>
                    <th><?=lang('subsidioPortfolio.totalSubsidio') ?></th>
                </tr>
                </thead>
                <tbody>
                        <?php 
                        $saldo =0;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $no = 1 +(6 * ($page - 1));
                        $no=1; foreach($subsidio as $portfolio): ?>
                        <tr align="center">
                        <td><?=$no++?></td>
                                <td><?=$portfolio->naran_kompleto?></td>
                                <td><?=$portfolio->naran_osan_sai?></td>
                                <td><?=$portfolio->horas_foti_subsidio?></td>
                                <td><?=$portfolio->data_hahu_aktividade?></td>
                                <td><?=$portfolio->data_remata_aktividade?></td>
                                <td><b><input type="hidden" value="<?= $day = strtotime($portfolio->data_remata_aktividade) - strtotime($portfolio->data_hahu_aktividade);
                                $hari = $day / 60 / 60 / 24;
                                ?>"><?= $hari ?></b> <strong><?=lang('subsidioPortfolio.dataSubsidio') ?></strong></td>
                                <td>$<?= number_format($portfolio->total_subsidio,2)?></td>
                        <?php
                        $saldo += $portfolio->total_subsidio;
                        endforeach; ?>
                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="7"><h3><strong><?=lang('saldotamaPortfolio.totalSaldo') ?></strong></h3></td>
                            <td align="center" colspan="1"><strong><span style="color:black">$ <?= number_format($saldo, 2);?></span></strong></td>
                        </tr>
                    </tbody>
        </table><br><br>
        <table>
            <thead>
            <tr>
                <th></th>
                <th colspan=""><strong>Dili, <?= date('Y-M-d')?></strong></th>
                <th width="450"><strong>Dili, <?= date('Y-M-d')?></strong></th>
            </tr>
                <tr>
                    <th width="" style="margin-right:4;"></th>
                    <th colspan="" width="300" style="margin-left:4">Prepara Husi</th>
                <th colspan="1" align="center">Aprova Husi</th>
            </tr>
            </thead>
        </table><br><br><br><br> 
        <table class="soares">
        <thead>
          <tr>
            <th width=""></th>
            <?php foreach($administrator as $portfolio): ?>
            <th width="300"><u><?= $portfolio->naran_kompleto ?></u></th>
            <?php endforeach;?>
              <th width="450"><u><?= helperFunsionario()->naran_kompleto ?></u></th>
        </tr>
        <tr>
            <th></th>
                <th colspan="" width="259">Prepara Husi</th>
            <th colspan="1" align="center">Aprova Husi</td>
          </tr>
        </thead>
      </table>
</body>

</html