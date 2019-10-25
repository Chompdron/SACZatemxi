<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Receta */

$this->title = 'Update Receta: ' . $model->RecetaID;
$this->params['breadcrumbs'][] = ['label' => 'Recetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->RecetaID, 'url' => ['view', 'id' => $model->RecetaID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="receta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
