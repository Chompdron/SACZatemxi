<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;


$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>



<img src="<?=Yii::getAlias('@web') ?>/Recursos/ZATEMXI%20Logo%20Dorado%20(2).png" id="logo">
<!-- 
    <form class="formulario">
        <h1>Inicia Sesion</h1>
        <div class="contenedor">
        <div class="input-contenedor">  
            <i class="fas fa-envelope-square icon"></i>
            <input type="text" placeholder="Correo Electronico" name="LoginForm[username]" >
        </div>
        <div class="input-contenedor">  
            <i class="fas fa-key icon"></i>
            <input type="password" placeholder="Contraseña" name="LoginForm[password]">
        </div>
            <input type="submit" value="Iniciar Sesion" class="button">
            <p>¿Olvidaste la contraseña? <a class="link" href="recuperar.html">Recuperar</a></p>
            <p>¿Aun no tienes una cuenta? <a class="link" href="registrarvista.html">Registrate</a></p>
        </div>
        </form>
        -->
    <?php $form = ActiveForm::begin([ 'id' => 'login-form', 'options'=>["class"=>"formulario"]]); ?>


        <h1>Inicia Sesion</h1>
        <div class="contenedor">
        <div class="input-contenedor">  
            
           
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            </div>
            
        <div class="input-contenedor">  
       
        <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
            
            <input type="submit" value="Iniciar Sesion" class="button">
            
    <?php ActiveForm::end(); ?>