<?php 
use yii\web\JsExpression;
use yii\helpers\Html;
use yii\web\View;
use app\models\Fechaconsulta;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker
?>

<?php $form = ActiveForm::begin(); ?>
<div class="col-md-6">
            <label>Fecha de Inicio</label>
        <?= DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'FechaInicio',
                    'options' => ['required'=>true],
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                ]);?>
</div>

<div class="col-md-6">
            <label>Fecha de Término</label>
        <?= DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'FechaFin',
                    'options' => ['required'=>true],
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                ]);?>
</div>
<div class="col-md-4"></div>
    <div class="col-md-4">
       
<br><br><br><br>
        <?= Html::submitButton('GENERAR', ['class' => 'btn btn-success']) ?>
    </div>
<div class="col-md-4"></div>
    <?php ActiveForm::end(); ?>
