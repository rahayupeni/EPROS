<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JangkaWaktu */

$this->title = $model->idjangka;
$this->params['breadcrumbs'][] = ['label' => 'Jangka Waktus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jangka-waktu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idjangka], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idjangka], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idjangka',
            'jangka',
        ],
    ]) ?>

</div>
