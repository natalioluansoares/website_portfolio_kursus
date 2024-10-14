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
           <h3><strong><?=lang('sidebarPortfolio.hotuHorarioPortfolio')?></strong></h3><br>
        </p>
    </center>
        <table class="border-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th><?=lang('osanSaiPortfolio.kodeOsanSai') ?></th>
                    <th><?=lang('osanSaiPortfolio.naranOsanSai') ?></th>
                    <th class="text-center"><?=lang('osanSaiPortfolio.timeOsanSai') ?></th>
                    <th class="text-center"><?=lang('osanSaiPortfolio.dataOsanSai') ?></th>
                    <th class="text-center"><?=lang('osanSaiPortfolio.montanteOsanSai') ?></th>
                </tr>
                </thead>
                <tbody>
                        <?php 
                        $saldo =0;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $no = 1 +(6 * ($page - 1));
                        $no=1; foreach($saldoosansai as $portfolio): ?>
                        <tr align="center">
                            <td><?=$no++?></td>
                            <td><?=$portfolio->kode_osan_sai?></td>
                            <td><?=$portfolio->naran_osan_sai?></td>
                            <td colspan="1"><?=$portfolio->horas_saldo_sai?></td>
                            <td colspan="1"><?=$portfolio->data_saldo_sai?></td>
                            <td align="center"><strong><span style="color: darkred;">$ <?=number_format($portfolio->total_saldo_sai, 2)?></span></strong></td>
                        <?php
                        $saldo += $portfolio->total_saldo_sai;
                        endforeach; ?>
                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="5"><h3><strong><?=lang('saldotamaPortfolio.totalSaldo') ?></strong></h3></td>
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
              <th width="300"><u><?= helperSistema()->naran_kompleto ?></u></th>
              <?php foreach($administrator as $portfolio): ?>
              <th width="450"><u><?= $portfolio->naran_kompleto ?></u></th>
              <?php endforeach;?>
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