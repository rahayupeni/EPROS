<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KomunitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Komunitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komunitas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Komunitas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idkomunitas',
            'iduser',
            'nama',
            'phone',
            'alamat:ntext',
            // 'usia',
            // 'cabang',
            // 'gambar:ntext',
            // 'latitude',
            // 'longitude',
            // 'bukti:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
