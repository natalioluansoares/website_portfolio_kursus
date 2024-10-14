<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificate</title>
  <style>
    body {
  /* font-family: Arial, sans-serif; */
  font-family: 'Times New Roman', Times, serif;
  margin: 0;
  padding: 0;
  
}

.certificate {
  width: 100%;
  height: 200vh;
  border: 5px solid lavender;
  background-color: #ffffff; /* warna latar belakang */
  box-shadow: 0px 0px 20px rgba(0, 0, 0.7, 0.9);
  background: #ffffff; /* gambar latar belakang */
  background: rgba(0, 0, 0, 0.1)
}

.content {
  text-align: center;
  color: #333333; /* warna teks */
}

.content p{
  font-size: 16px;
  color: #333333;
  margin-bottom: 20px; 
}
.content img{
  width: 100px;
  height: 100px;
  border: 3px solid #ffffff;
  overflow: hidden;
  border-radius: 50%;
}
.container{
  position: relative;
  width: -100px;
  height: 90px;
 
}
.container,.okos{
  text-align: center;
  font-family: 'Times New Roman', Times, serif;
  color: #ffffff;
}
.left-image, .right-image{
  position: absolute;
  width: 63px;
  height: 10vh;
  border: 3px solid #ffffff;
  margin-bottom: 10%;
  border-radius: 50%;
}
.left-image{
  left: 0;
}
.right-image{
  right: 0;
}


.content h1 {
  font-size: 32px;
  color: #333333;
  margin-bottom: 20px;
}


.content h2 {
  font-size: 28px;
  color: #333333;
  margin-top: 20px;
}

.soares{
  color: #333333;
}

.content h3 {
  font-size: 20px;
  color: #333333;
  margin-top: 20px;
}

.date {
  font-size: 18px;
  margin-top: 20px;
  color: #333333;
}

.certificate {
  background-size: cover;
}
  </style>
</head>
<body>
  <div class="certificate">
      <div class="content">
        <h1 class="okos">Haburas Matenek Iha Kursus</h1><br>
        <strong style="color: #333333;">**********************************************************************************</strong>
        <h2>Certificate of Achievement</h2>
        <p>This is to certify that</p>
        <h3><?=helperEstudante()->naran_kompletos ?></h3>
        <p>has successfully completed the course on</p>
        <h3><?=$valores->materia_kursus ?>/<?=$valores->level_materia_kursus ?></h3>
        <?php $total = 0; foreach($valoresestudante as $valor): ?>
        <?php 
        $total += $valor->total_valores/4;
        endforeach; ?>
        <h3><strong><?= $total ?></strong></h3>
        <?php if ($total >= 7.5) { ?>
          <p><strong>Muito Bom</strong></p>
       <?php }elseif ($total >= 6) {?>
          <p><strong>Bom</strong></p>
       <?php } ?>
        <p>awarded on</p>
        <p class="date"><?= $valores->data_horario_estudante ?></p>
    </div>
    <table class="soares">
        <thead>
        <tr>
            <th></th>
            <th colspan=""><strong>Same, </strong></th>
            <th width="350"><strong>Dili,</strong></th>
        </tr>
            <tr>
                <th width="" style="margin-right:4%;margin-bottom: 4%;"></th>
                <th colspan="" width="350" style="margin-left:4%; margin-bottom: 4%;">Prepara Husi</th>
                <th colspan="1" align="center">Aprova Husi</th>
        </tr>
        </thead>
      </table><br><br><br><br> 
      <table class="soares">
          <thead>
            <tr>
              <th width=""></th>
                <th width="350"><u><?= $valores->naran_kompleto_professores ?></u></th>
                <th width="350"><u><?=helperEstudante()->naran_kompletos ?></u></th>
          </tr>
          <tr>
              <th></th>
                  <th colspan="" width="259">Prepara Husi</th>
              <th colspan="1" align="center">Aprova Husi</td>
            </tr>
          </thead>
      </table>
  </div>
</body>
</html>