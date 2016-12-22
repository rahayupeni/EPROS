<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\BaseUrl;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TemanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="teman-index">

    <div class="panel panel-default">
        <div class="panel-heading">Berteman dengan anda</div>
        <div class="panel-body">
            <?php
//            //            $mauteman = Teman::find()->where(['ini' => Yii::$app->user->identity->username, 'status' => 0]);
            if (isset($sudahteman)){
                $index = 0;
//                var_dump($sudahteman);
//                die();
                foreach ($sudahteman as $key){
                    echo "<div class=\"col-md-10\"><a href=".Url::toRoute(['users/anotherprofile', 'username' => $sudahteman[$index]["denganini"]]).">".$sudahteman[$index]["denganini"] ."</a> </div>";
                    $index++;
                }
            }else {
                echo "belum ada";
            }
            ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Ingin berteman dengan anda</div>
        <div class="panel-body">
            <?php
//            $mauteman = Teman::find()->where(['ini' => Yii::$app->user->identity->username, 'status' => 0]);
                $index = 0;
                if ($mauteman) {
                    foreach ($mauteman as $key) {
                        echo "<div class=\"col-md-10\"><a href=" . Url::toRoute(['users/anotherprofile', 'username' => $mauteman[$index]["denganini"]]) . ">" . $mauteman[$index]["denganini"] . "</a> </div><div class=\"col-md-2\"><a href=" . Url::toRoute(['addfriend', 'username' => $mauteman[$index]["denganini"]]) . "><span class=\"glyphicon glyphicon-ok\"></span></a></div>";
                        $index++;
                    }
                }else {
                    echo "belum ada";
                }

            ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Semua user</div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'username',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
