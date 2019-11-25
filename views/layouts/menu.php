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
 
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="ui-sub-menu">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">dashboard</i>
                RECETA
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
              </a>
              <div class="mdc-expansion-panel" id="ui-sub-menu">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?=Url::to(["/insumo"])?>">
                      INSUMO
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?=Url::to(["/receta"])?>">
                      RECETA
                    </a>
                  </div>
                   <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?=Url::to(["/unidad-presentacion"])?>">
                      UNIDAD DE PRESENTACION
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
                      PEDIDO PROVEEDOR
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?=Url::to(["/pedido-prov-lista"])?>">
                      PEDIDO PROVEEDOR LISTA
                    </a>
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
                      USUARIOS
                    </a>
                  </div>
<div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?=Url::to(["/empleado"])?>">
                      EMPLEADO
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

