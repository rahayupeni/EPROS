<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TimbalBalikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timbal Baliks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timbal-balik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Timbal Balik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtimbal',
            'timbal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
