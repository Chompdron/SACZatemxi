<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Clientes', 'url' => ['/cliente/index']],
            ['label' => 'Insumo', 'url' => ['/insumo/index']],
            ['label' => 'Pedido', 'url' => ['/pedido/index']],
            ['label' => 'Pedido Proveedor', 'url' => ['/pedido-prov/index']],
            ['label' => 'Pedido proveedor lista', 'url' => ['/pedido-prov-lista/index']],
            ['label' => 'Producto', 'url' => ['/producto/index']],
            ['label' => 'Proveedor', 'url' => ['/proveedor/index']],
            ['label' => 'Receta', 'url' => ['/receta/index']],
            ['label' => 'Roles', 'url' => ['/role/index']],
            ['label' => 'Unidad de Presentacion', 'url' => ['/unidad-presentacion/index']],
            ['label' => 'Usuarios', 'url' => ['/users/index']],
            ['label' => 'Venta', 'url' => ['/venta/index']],
            ['label' => 'Venta Lista', 'url' => ['/venta-lista/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
        
    NavBar::end();
    ?>

    <div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
