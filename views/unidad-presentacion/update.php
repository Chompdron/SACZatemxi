<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UnidadPresentacion */

$this->title = 'Update Unidad Presentacion: ' . $model->UnidadPresentacionID;
$this->params['breadcrumbs'][] = ['label' => 'Unidad Presentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->UnidadPresentacionID, 'url' => ['view', 'id' => $model->UnidadPresentacionID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unidad-presentacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
