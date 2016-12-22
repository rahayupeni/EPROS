<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Acara */

$this->title = 'Create Acara';
$this->params['breadcrumbs'][] = ['label' => 'Acaras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acara-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
