<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menerima */

$this->title = 'Update Menerima: ' . $model->idmenerima;
$this->params['breadcrumbs'][] = ['label' => 'Menerimas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmenerima, 'url' => ['view', 'id' => $model->idmenerima]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="menerima-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
