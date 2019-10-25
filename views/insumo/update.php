<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Insumo */

$this->title = 'Update Insumo: ' . $model->InsumoID;
$this->params['breadcrumbs'][] = ['label' => 'Insumos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->InsumoID, 'url' => ['view', 'id' => $model->InsumoID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="insumo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
