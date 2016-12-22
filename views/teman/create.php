<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Teman */

$this->title = 'Create Teman';
$this->params['breadcrumbs'][] = ['label' => 'Temen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
