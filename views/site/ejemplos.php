<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use kartik\select2\Select2; // utilizados para select2


use dosamigos\datepicker\DatePicker; //datepicker


$this->title = 'Ejemplos';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-login">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>


<!-- CAMPOS REGULARES -->

        <div class="col-md-4 col-lg-4"><?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?></div>
        <div class="col-md-4 col-lg-4"><?= $form->field($model, 'password')->passwordInput() ?></div>


<!-- COMBOS -->
        <div class="col-md-4 col-lg-4">
            <?=$form->field($model, 'id')->widget(Select2::classname(), [
                    'id'       => 'usuario',
                    'value'    => $model->id,
                    'data'     => $cmbUsuarios, 'options'  => ['placeholder' => 'Seleccione el usuario ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?></div>

        <div class="col-md-4">
            <?=Select2::widget([
                'name' => 'state_2',
                'value' => '',
                'data' => [1=>"Hombre", "M"=>"Mujer"],
                'options' => ['multiple' => true, 'placeholder' => 'Select states ...']
            ])?></div>

        <div class="col-md-4"><?=Select2::widget([
            'name' => 'state_2',
            'value' => '',
            'data' => [1=>"Hombre", "M"=>"Mujer"],
            'options' => ['multiple' => false, 'placeholder' => 'Select states ...']
        ])?></div>


<!-- FECHAS -->
        <div class="col-md-4">
            <?= DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'nacimiento',
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-M-yyyy'
                        ]
                ]);?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'fecha2')->widget(
                DatePicker::className(), [
                    // inline too, not bad
                     'inline' => true, 
                     // modify template for custom rendering
                    'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-M-yyyy'
                    ]
            ]);?>
        </div>


        <div class="form-group">
            <div class="">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
</div>
