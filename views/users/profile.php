<?php

use yii\grid\GridView;
use yii\helpers\Html;


?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Widgets</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<div class="container">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->


            <div class="widget-user-header bg-aqua-active" style="height: 250px;">
                <div class="media" style="margin-top: 65px;">
                    <div class="media-left media-middle">
                        <img class="img-rounded" src="<?php echo "../../". $model[3]; ?>" alt="User Avatar" style="width:auto; height: 150px;">


                        <div style="position: absolute; top: 8px; right: 16px; font-size: 18px;">
                            <?php
                            echo Html::beginForm(['uprofile'], 'post')
                                . Html::submitButton(
                                    '<i class=" glyphicon glyphicon-pen">edit</i>',
                                    ['class' => 'btn btn-link logout']
                                )
                                . Html::endForm(); ?>
                        </div>
                    </div>
                    <div class="media-body">
                        <h3><?php echo $model[4]; ?> <i>(belum diverfikasi)</i></h3>
                        <h5><?php echo $model[5] ?></h5>
                        <?php
                        if ($model[2][0] == 1){
                            echo "<i class=\" glyphicon glyphicon-user\" style=\"color: greenyellow\">&nbsp;</i></a>";
                        }else {
                            echo "<a href='uprofile'><i class=\" glyphicon glyphicon-user\">&nbsp;</i></a>";
                        }
                        if ($model[2][1] == 1){
                            echo "<i class=\" glyphicon glyphicon-envelope\" style=\"color: greenyellow\">&nbsp;</i>";
                        }else {
                            echo "<a href='kirimemail'><i class=\" glyphicon glyphicon-envelope\">&nbsp;</i></a>";
                        }
                        if ($model[2][2] == 1){
                            echo "<i class=\" glyphicon glyphicon-earphone\" style=\"color: greenyellow\">&nbsp;</i>";
                        }else {
                            echo "<a href='kirimsms'><i class=\" glyphicon glyphicon-earphone\">&nbsp;</i></a>";
                        }
                        if ($model[2][3] == 1){
                            echo "<i class=\" glyphicon glyphicon-open-file\" style=\"color: greenyellow\">&nbsp;</i>";
                        }else {
                            echo "<a href='uploadberkas'><i class=\" glyphicon glyphicon-open-file\">&nbsp;</i></a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="box-footer" >
                <div style="padding: 0px 10px;">
                    <?php
                    if ($model[1] == 1 ){
                        echo "
                        <h4><b>Email perusahaan</b></h4>
                        <p>" . $model[6] . "</p>
                        <h4><b>Nomor Telpon Perusahaan</b></h4>
                        <p>" . $model[7].  "</p>
                        <h4><b>Alamat Perusahaan</b></h4>
                        <p>" . $model[8] . "</p>
                        <h4><b>Tanggal Perusahaan</b></h4>
                        <p>" . $model[9] . "</p>
                        <h4><b>Cabang Perusahaan</b></h4>
                        <p>" . $model[10] . "</p>
                        <h4><b>Acara Perusahaan</b></h4>
                        <p>" . $model[11] . "</p>
                        <h4><b>Memiliki Perusahaan</b></h4>
                        <p>" .$model[12]. "</p>
                        <h4><b>Jangka Waktu Perusahaan</b></h4>
                        <p>". $model[13]. "</p>
                        <h4><b>Sponsor Perusahaan</b></h4>
                        <p>" . $model[14]. "</p>
                        <h4><b>Timbal Balik Perusahaan</b></h4>
                        <p>". $model[15]. "</p>
                        ";

                    } else {
                        echo "
                        <h4><b>Email Komunitas / Instansi</b></h4>
                        <p>" . $model[6] . "</p>
                        <h4><b>Nomor Telpon / Instansi</b></h4>
                        <p>" . $model[7].  "</p>
                        <h4><b>Alamat Komunitas / Instansi</b></h4>
                        <p>" . $model[8] . "</p>
                        <h4><b>Tanggal Komunitas / Instansi</b></h4>
                        <p>" . $model[9] . "</p>
                        <h4><b>Cabang Komunitas / Instansi</b></h4>
                        <p>" . $model[10] . "</p>
                        ";

                    } ?>

                </div>
            </div>
        </div>
        <?= Yii::$app->session->getFlash('error'); ?>
    </div>
    <div class="col-md-2"></div>
</div>
