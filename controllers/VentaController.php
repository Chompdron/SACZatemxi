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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
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

        if ($detv->load(Yii::$app->request->post())) {
            //$_SESSION["venta"]->save();
            $detv->PrecioVenta=0;
            array_push($_SESSION["detv"],$detv);
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
       
        $model = new Venta();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //session_unset($_SESSION["venta"]);
            return $this->redirect(['view', 'id' => $model->VentaID]);
        }

        return $this->render('finalizarventa', [
            'model' => $model,
        ]);
        
        
    }
    
}
