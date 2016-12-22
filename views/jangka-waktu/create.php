<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JangkaWaktu */

$this->title = 'Create Jangka Waktu';
$this->params['breadcrumbs'][] = ['label' => 'Jangka Waktus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jangka-waktu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
