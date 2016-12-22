<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TimbalBalik */

$this->title = 'Update Timbal Balik: ' . $model->idtimbal;
$this->params['breadcrumbs'][] = ['label' => 'Timbal Baliks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtimbal, 'url' => ['view', 'id' => $model->idtimbal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timbal-balik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
