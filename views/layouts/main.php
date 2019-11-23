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
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />
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
            ['label' => 'Producto', 'url' => ['/producto/index']],
            ['label' => 'Proveedor', 'url' => ['/proveedor/index']],
            ['label' => 'Recetas',
                'items' => [
                     '<li class="divider"></li>',
                     '<li class="dropdown-header"></li>',
                     ['label' => 'Insumo', 'url' => ['/insumo/index']],
                     ['label' => 'Receta', 'url' => ['/receta/index']],
                     ['label' => 'Unidad de Presentacion', 'url' => ['/unidad-presentacion/index']],
                ],
            ],
            ['label' => 'Pedidos',
                'items' => [
                     '<li class="divider"></li>',
                     '<li class="dropdown-header"></li>',
                     ['label' => 'Pedido', 'url' => ['/pedido/index']],
                     ['label' => 'Pedido Proveedor', 'url' => ['/pedido-prov/index']],
                     ['label' => 'Pedido proveedor lista', 'url' => ['/pedido-prov-lista/index']],
                     
                ],
            ],
            ['label' => 'Usuario',
            'items' => [
                 '<li class="divider"></li>',
                 '<li class="dropdown-header"></li>',
                 ['label' => 'Usuarios', 'url' => ['/users/index']],
                 ['label' => 'Empleado', 'url' => ['/empleado/index']],
                 ['label' => 'Roles', 'url' => ['/role/index']],
                 ['label' => 'Usuario Rol', 'url' => ['/user-role/index']],
            ],
        ],
            ['label' => 'Ventas',
            'items' => [
            '<li class="divider"></li>',
                 '<li class="dropdown-header"></li>',
                 ['label' => 'Venta', 'url' => ['/venta/index']],
                 
                 ['label' => 'venta-lista', 'url' => ['/venta-lista/index']],
            ],
        ],

         ['label' => 'Reportes',
            'items' => [
            '<li class="divider"></li>',
                 '<li class="dropdown-header"></li>',
                 ['label' => 'Reporte de Ventas', 'url' => ['/reporte/index']],
            ],
        ],


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
  

            <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Zatemxi <?= date('Y') ?></p>

            <!--<p class="pull-right"><?= Yii::powered() ?></p>-->
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
