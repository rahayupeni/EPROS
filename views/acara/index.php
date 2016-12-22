<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AcaraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acaras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acara-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Acara', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idacara',
            'acara',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
