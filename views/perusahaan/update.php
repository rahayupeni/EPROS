<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Perusahaan */

$this->title = 'Update Perusahaan: ' . $model->idperusahaan;
$this->params['breadcrumbs'][] = ['label' => 'Perusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idperusahaan, 'url' => ['view', 'id' => $model->idperusahaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perusahaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
