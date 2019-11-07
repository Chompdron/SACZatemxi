<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
        <title>Zatemxi</title>
    <meta name="viewport" content="width-devide-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-sacle=1.0">
        <link rel=stylesheet
              href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="<?=Yii::getAlias('@web')?>/estilos.css">
    </head>
    <body>
        <?php $this->beginBody() ?>
        <?=$content?>
        <?php $this->endBody() ?>
    </body>
</html>

<?php $this->endPage() ?>


