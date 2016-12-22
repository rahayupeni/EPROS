<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PerusahaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perusahaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perusahaan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Perusahaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idperusahaan',
            'nama',
            'phone',
            'alamat:ntext',
            'usia',
            // 'cabang',
            // 'gambar:ntext',
            // 'latitude',
            // 'longitude',
            // 'iduser',
            // 'acara',
            // 'menerima',
            // 'jangka_waktu',
            // 'sponsor',
            // 'timbal_balik',
            // 'bukti:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
