<?php

namespace app\controllers;

use Yii;
use app\models\PedidoProv;
use app\models\Insumo;
use app\models\Producto;
use app\models\PedidoProvlista;
use app\models\PedidoProvSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kartik\mpdf\Pdf;

/**
 * PedidoProvController implements the CRUD actions for PedidoProv model.
 */
class PedidoProvController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
          return [
            'access' => [
                'class'        => AccessControl::className(),
                'rules'        => [
                    [
                        'actions' => [],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],

                ],
                'denyCallback' => function () {
                    return Yii::$app->response->redirect(['/']);
                },
            ],
        ];
    }

    /**
     * Lists all PedidoProv models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidoProvSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PedidoProv model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PedidoProv model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PedidoProv();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->PedidoProvID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PedidoProv model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->PedidoProvID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PedidoProv model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PedidoProv model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PedidoProv the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PedidoProv::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function init()
    {
        Yii::$app->language = 'es';
    }
  
    /*Crear una venta*/
    public function actionNuevacompra()
    {
        //Para que no se reemplazen los detalles de venta cada vez que carga
        if(isset($_SESSION["detc"])){}else{
        $_SESSION["detc"] = array();
        }

        $compra = new PedidoProv();
        //$_SESSION["compra"] = $venta;

        if ($compra->load(Yii::$app->request->post())) {
            //$_SESSION["compra"]->save();
            $_SESSION["compra"] = $compra;
            return $this->redirect(['agregarprod', 'model' => $_SESSION["detc"]]);
        }

        return $this->render('nuevacompra', [
            'model' => $compra,
            'detc' => $_SESSION["detc"],
        ]);
        
        
    }


    
    /*Agregar un Insumo*/
    public function actionAgregarprod()
    {
        
        $model = new Pedidoprov();
        $detc = new Pedidoprovlista();
        $permiso = 0; 
        $nump= -1;
        if ($detc->load(Yii::$app->request->post())) {
            
            
            $InsCompra = Insumo::findone($detc->InsumoID);
            
            if($permiso == 0){
             
            //$_SESSION["compra"]->save();
            //Conseguir el precio
            $InsCompra = Insumo::findone($detc->InsumoID);
            $detc->ImportePorPieza=$InsCompra->PrecioXUnidad;
            
            array_push($_SESSION["detc"],$detc);   
            }            
            
            return $this->redirect(['nuevacompra']);
        }
        
        return $this->render('agregarprod', [
            'model' => $model,
            'detc' => $detc,
        ]);
        
        
    }
    
    /*Para finalizar la venta*/
    public function actionFinalizarcompra()
    {
        if (Yii::$app->request->post()) {
            //session_unset($_SESSION["compra"]);
            $_SESSION["compra"]->save();
            foreach ($_SESSION["detc"] as $detallev) {
                $detallev->PedidoProvID=$_SESSION["compra"]->PedidoProvID;
                $detallev->save();
                
                
                $ProdCompra = Insumo::findone($detallev->InsumoID);
                $ProdCompra->Stock += $detallev->Cantidad;
                $ProdCompra->Save();
                
            }
            
            return $this->redirect(['view', 'id' => $_SESSION["compra"]->PedidoProvID]);
        }

        return $this->render('finalizarcompra', [
            'model' => $_SESSION["compra"],
        ]);
        
        
    }
     public function actionPdf($id)
    {
         
          $content = $this->renderPartial('view', [
            'model' => $this->findModel($id),
        ]);
    
            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_CORE, 
                // A4 paper format
                'format' => Pdf::FORMAT_A4, 
                // portrait orientation
                'orientation' => Pdf::ORIENT_PORTRAIT, 
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER, 
                // your html content input
                'content' => $content,  
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting 
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                'cssInline' => '.kv-heading-1{font-size:18px}', 
                 // set mPDF properties on the fly
                'options' => ['title' => 'Título de tu reporte'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>['TICKET DE COMPRA'], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
            
            // return the pdf output as per the destination setting
            return $pdf->render(); 

    }
    
}
