<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JangkaWaktu */

$this->title = 'Update Jangka Waktu: ' . $model->idjangka;
$this->params['breadcrumbs'][] = ['label' => 'Jangka Waktus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idjangka, 'url' => ['view', 'id' => $model->idjangka]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jangka-waktu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
