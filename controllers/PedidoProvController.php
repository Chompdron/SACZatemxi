<?php

namespace app\controllers;

use Yii;
use app\models\PedidoProv;
use app\models\Insumo;
use app\models\PedidoProvlista;
use app\models\PedidoProvSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
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
                
                $InsCompra = Insumo::findone($detallev->InsumoID);
                $InsCompra->Stock += $detallev->Cantidad;
                $InsCompra->Save();
                
            }
            
            return $this->redirect(['view', 'id' => $_SESSION["compra"]->PedidoProvID]);
        }

        return $this->render('finalizarcompra', [
            'model' => $_SESSION["compra"],
        ]);
        
        
    }
    
}