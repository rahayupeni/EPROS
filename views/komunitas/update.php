<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Komunitas */

$this->title = 'Update Komunitas: ' . $model->idkomunitas;
$this->params['breadcrumbs'][] = ['label' => 'Komunitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idkomunitas, 'url' => ['view', 'id' => $model->idkomunitas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="komunitas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
