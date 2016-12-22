<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JangkaWaktuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jangka Waktus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jangka-waktu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jangka Waktu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idjangka',
            'jangka',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
