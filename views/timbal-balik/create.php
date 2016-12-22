<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TimbalBalik */

$this->title = 'Create Timbal Balik';
$this->params['breadcrumbs'][] = ['label' => 'Timbal Baliks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timbal-balik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
