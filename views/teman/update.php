<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Teman */

$this->title = 'Update Teman: ' . $model->idteman;
$this->params['breadcrumbs'][] = ['label' => 'Temen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idteman, 'url' => ['view', 'id' => $model->idteman]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
