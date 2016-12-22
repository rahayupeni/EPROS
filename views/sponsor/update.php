<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sponsor */

$this->title = 'Update Sponsor: ' . $model->idsponsor;
$this->params['breadcrumbs'][] = ['label' => 'Sponsors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsponsor, 'url' => ['view', 'id' => $model->idsponsor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sponsor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
