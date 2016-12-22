<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Acara */

$this->title = 'Update Acara: ' . $model->idacara;
$this->params['breadcrumbs'][] = ['label' => 'Acaras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idacara, 'url' => ['view', 'id' => $model->idacara]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acara-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
