<?php

namespace app\controllers;

use Yii;
use app\models\Venta;
use app\models\VentaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Producto;
use app\models\VentaLista;
use yii\filters\AccessControl;
use kartik\mpdf\Pdf;

/**
 * VentaController implements the CRUD actions for Venta model.
 */
class VentaController extends Controller
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
     * Lists all Venta models.
     * @return mixed
     */
    public function actionIndex()
    {
        unset($_SESSION["venta"]);
        unset($_SESSION["detv"]);
        $searchModel = new VentaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Venta model.
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
     * Creates a new Venta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Venta();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->VentaID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Venta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->VentaID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Venta model.
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
     * Finds the Venta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Venta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Venta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    
    /*Crear una venta*/
    public function actionNuevaventa()
    {
        //Para que no se reemplazen los detalles de venta cada vez que carga
        if(isset($_SESSION["detv"])){}else{
        $_SESSION["detv"] = array();
        }

        $venta = new Venta();
        //$_SESSION["venta"] = $venta;

        if ($venta->load(Yii::$app->request->post())) {
            //$_SESSION["venta"]->save();
            $_SESSION["venta"] = $venta;
            return $this->redirect(['agregarprod', 'model' => $_SESSION["detv"]]);
        }

        return $this->render('nuevaventa', [
            'model' => $venta,
            'detv' => $_SESSION["detv"],
        ]);
        
        
    }


    
    /*Agregar un producto*/
    public function actionAgregarprod()
    {
        
        $model = new Venta();
        $detv = new VentaLista();
        $permiso = 0; 
        $nump= -1;
        if ($detv->load(Yii::$app->request->post())) {
            
            
            $ProdCompra = Producto::findone($detv->ProductoID);
            if($ProdCompra->Stock >= $detv->Cantidad){
                {
                //Sumar cantidad si se quiere agregar algo que ya está
            foreach ($_SESSION["detv"] as $detallev) {
                
                $nump+=1;
                if($detallev->ProductoID == $detv->ProductoID){
                    $detallev->Cantidad += $detv->Cantidad;
                    $permiso = 1;
                    if($detallev->Cantidad <= 0){
                        unset($_SESSION["detv"][$nump]);
                    }
                }
            }
            
            if($permiso == 0){
             
            //$_SESSION["venta"]->save();
            //Conseguir el precio
            $ProdCompra = Producto::findone($detv->ProductoID);
            $detv->PrecioVenta=$ProdCompra->Precio;
            
            array_push($_SESSION["detv"],$detv);   
            }
                
            }
            }else{return $this->redirect(['nuevaventa']);}
            
            
            
            return $this->redirect(['nuevaventa']);
        }
        
        return $this->render('agregarprod', [
            'model' => $model,
            'detv' => $detv,
        ]);
        
        
    }
    
    /*Para finalizar la venta*/
    public function actionFinalizarventa()
    {
        if (Yii::$app->request->post()) {
            //session_unset($_SESSION["venta"]);
            $_SESSION["venta"]->save();
            foreach ($_SESSION["detv"] as $detallev) {
                $detallev->VentaID=$_SESSION["venta"]->VentaID;
                $detallev->save();
                
                $ProdCompra = Producto::findone($detallev->ProductoID);
                $ProdCompra->Stock -= $detallev->Cantidad;
                $ProdCompra->Save();
                
            }
            
            return $this->redirect(['view', 'id' => $_SESSION["venta"]->VentaID]);
        }

        return $this->render('finalizarventa', [
            'model' => $_SESSION["venta"],
        ]);
        
        
    }
    public function init()
    {
        Yii::$app->language = 'es';
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
                    'SetHeader'=>['TICKET DE VENTA'], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
            
            // return the pdf output as per the destination setting
            return $pdf->render(); 

    }
    
}