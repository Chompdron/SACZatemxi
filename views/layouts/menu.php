<?php
use yii\helpers\Url;


?>
<a class="mdc-drawer-link" href="<?=Url::to(["/cliente"])?>">
    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
    CLIENTES
</a>
<a class="mdc-drawer-link" href="<?=Url::to(["/producto"])?>">
    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
    PRODUCTOS
</a>
<a class="mdc-drawer-link" href="<?=Url::to(["/proveedor"])?>">
    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
    PROVEEDOR
</a>
   <a class="mdc-drawer-link" href="<?=Url::to(["/venta"])?>">
    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
    PUNTO DE VENTA
</a>
   <a class="mdc-drawer-link" href="<?=Url::to(["/grafico"])?>">
    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
    GRÁFICOS CHULOS
</a>
<div class="mdc-list-item mdc-drawer-item">
    <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="ui-sub-menu">
        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">dashboard</i>
        RECETAS
        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
    </a>
    <div class="mdc-expansion-panel" id="ui-sub-menu">
        <nav class="mdc-list mdc-drawer-submenu">
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="<?=Url::to(["/insumo"])?>">
                    INSUMOS
                </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="<?=Url::to(["/receta"])?>">
                    RECETAS
                </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="<?=Url::to(["/unidad-presentacion"])?>">
                    UNIDADES
                </a>
            </div>
        </nav>
    </div>
</div>
<div class="mdc-list-item mdc-drawer-item">
    <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="pedido">
        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="	true">dashboard</i>
        PEDIDOS
        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
    </a>
    <div class="mdc-expansion-panel" id="pedido">
        <nav class="mdc-list mdc-drawer-submenu">
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="<?=Url::to(["/pedido-prov"])?>">
                    A PROVEEDOR
                </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="<?=Url::to(["/pedido"])?>">
                    A PRODUCCIÓN
                </a>
        </nav>
    </div>
</div>
<div class="mdc-list-item mdc-drawer-item">
    <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="reporte">
        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="	true">dashboard</i>
        REPORTES
        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
    </a>
    <div class="mdc-expansion-panel" id="reporte">
        <nav class="mdc-list mdc-drawer-submenu">
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="<?=Url::to(["/reporte/index"])?>">

                    VENTAS
                </a>
            </div><div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="<?=Url::to(["/reporte1/index"])?>">
                    ADQUISICIÓN
                </a>
            </div><div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="<?=Url::to(["/reporte3/index"])?>">
                    PEDIDOS
                </a>
            </div>
        </nav>
</div>
</div>
<div class="mdc-list-item mdc-drawer-item">
    <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="usuario">
        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="	true">dashboard</i>
        USUARIO
        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
    </a>
    <div class="mdc-expansion-panel" id="usuario">
        <nav class="mdc-list mdc-drawer-submenu">
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="<?=Url::to(["/users"])?>">
                    LISTA DE USUARIOS
                </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="<?=Url::to(["/empleado"])?>">
                    EMPLEADOS
                </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="<?=Url::to(["/role"])?>">
                    ROLES
                </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item-icontem">
                <a class="mdc-drawer-link" href="<?=Url::to(["/user-role"])?>">
                    USUARIO ROL
                </a>
        </nav>
    </div>