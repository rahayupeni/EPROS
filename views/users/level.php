<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\Level;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

	<img src="img/asset/bar03.png" style="margin-bottom: 20px; width: 100%;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'level')->dropDownList(ArrayHelper::map(level::find()->all(),'idlevel', 'level'),array('empty' => 'Pilih Level Anda')) ?>

    <div class="form-group">
        <?= Html::submitButton('Ok', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
