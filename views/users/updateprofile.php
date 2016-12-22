<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Acara;
use app\models\Menerima;
use app\models\TimbalBalik;
use app\models\Sponsor;
use app\models\JangkaWaktu;


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
        <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active" style="height: 300px;">
                <div class="media" style="margin-top: 65px;">
                    <div class="media-left media-middle">
                        <img class="img-rounded" src="<?php echo "../../". $model2["urlgambar"]; ?>" alt="User Avatar" style="width: auto; height: 150px;" id="uploadPreview"  >
                    </div>
                    <div class="media-body">
                        <h5><?= $form->field($model2, 'nama')->textInput(['maxlength' => true])->label("Nama Perusahaan") ?></h5>
                        <h6><?= $form->field($note, 'note')->textInput(['maxlength' => true, 'placeholder' => 'tentang perusahaan' ])->label("Tentang perusahaan") ?></h6>
                    </div>
                    <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" style="margin-top: 15px;" />
                </div>
            </div>
            <div class="box-footer" >
                <div style="padding: 0px 10px;">
                    <?php
                    if ($model1["level"] == 1 ){ ?>
                        <h4><b>Email perusahaan</b></h4>
                        <?= $form->field($model1, 'email')->textInput(['maxlength' => true])->label(false) ?>
                        <h4><b>Nomor Telpon Perusahaan</b></h4>
                        <?= $form->field($model2, 'phone')->textInput(['maxlength' => true])->label(false) ?>
                        <h4><b>Alamat Perusahaan</b></h4>
                        <?= $form->field($model2, 'alamat')->textarea(['rows' => 6])->label(false) ?>
                        <h4><b>Tanggal Perusahaan</b></h4>
                        <?= $form->field($model2, 'tanggal')->input('date')->label(false) ?>
                        <h4><b>Cabang Perusahaan</b></h4>
                        <?= $form->field($model2, 'cabang')->textInput(['maxlength' => true])->label(false) ?>
                        <h4><b>Acara Perusahaan</b></h4>
                        <?= $form->field($model2, 'acara')->checkboxList(ArrayHelper::map(acara::find()->all(),'idacara', 'acara'),array('empty' => 'Pilih Level Anda'))->label(false) ?>
                        <h4><b>Memiliki Perusahaan</b></h4>
                        <?= $form->field($model2, 'menerima')->checkboxList(ArrayHelper::map(menerima::find()->all(),'idmenerima', 'menerima'),array('empty' => 'Pilih Level Anda'), ['placeholder' => "Alamat perusahaan"])->label(false) ?>
                        <h4><b>Jangka Waktu Perusahaan</b></h4>
                        <?= $form->field($model2, 'jangka_waktu')->dropDownList(ArrayHelper::map(jangkawaktu::find()->all(),'idjangka', 'jangka'),array('empty' => 'Pilih Level Anda'), ['placeholder' => "Alamat perusahaan"])->label(false) ?>
                        <h4><b>Sponsor Perusahaan</b></h4>
                        <?php
                        $data = ArrayHelper::map(sponsor::find()->all(),'idsponsor', 'sponsor');
                        // Tagging support Multiple
                        // initial value
                        echo $form->field($model2, 'sponsor')->widget(Select2::classname(), [
                            'data' => $data,
                            'options' => ['placeholder' => 'Pilih Sponsor', 'multiple' => true],
                            'pluginOptions' => [
                                'tags' => true,
                                'tokenSeparators' => [',', ' '],
                                'maximumInputLength' => 10
                            ],
                        ])->label(false);

                        ?>
                        <h4><b>Timbal Balik Perusahaan</b></h4>
                        <?php
                        $data1 = ArrayHelper::map(timbalbalik::find()->all(),'idtimbal', 'timbal');
                        // Tagging support Multiple
                        // initial value
                        echo $form->field($model2, 'timbal_balik')->widget(Select2::classname(), [
                            'data' => $data1,
                            'options' => ['placeholder' => 'Pilih Timbal Balik', 'multiple' => true],
                            'pluginOptions' => [
                                'tags' => true,
                                'tokenSeparators' => [',', ' '],
                                'maximumInputLength' => 10
                            ],
                        ])->label(false);

                        ?>
                        <div class="form-group">
                            <?= Html::submitButton($model1->isNewRecord ? 'Create' : 'Update', ['class' => $model1->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>

                    <?php  } else { ?>
                        <h4><b>Email Komunitas / Instansi</b></h4>
                        <?= $form->field($model1, 'email')->textInput(['maxlength' => true])->label(false) ?>
                        <h4><b>Nomor Telpon / Instansi</b></h4>
                        <?= $form->field($model2, 'phone')->textInput(['maxlength' => true])->label(false) ?>
                        <h4><b>Alamat Komunitas / Instansi</b></h4>
                        <?= $form->field($model2, 'alamat')->textarea(['rows' => 6])->label(false) ?>
                        <h4><b>Tanggal Komunitas / Instansi</b></h4>
                        <?= $form->field($model2, 'tanggal')->input('date')->label(false) ?>
                        <h4><b>Cabang Komunitas / Instansi</b></h4>
                        <?= $form->field($model2, 'cabang')->textInput(['maxlength' => true])->label(false) ?>


                        <div class="form-group">
                            <?= Html::submitButton() ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    <?php  } ?>

                </div>
            </div>

        </div>
        <script type="text/javascript">

            function PreviewImage() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("uploadPreview").src = oFREvent.target.result;
                };
            };

        </script>

    </div>
    <div class="col-md-2"></div>
</div>
