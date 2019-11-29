<?php

namespace app\controllers;

use Yii;
use app\models\Pedido;
use app\models\Insumo;
use app\models\Receta;
use app\models\PedidoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PedidoController implements the CRUD actions for Pedido model.
 */
class PedidoController extends Controller
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
     * Lists all Pedido models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->Where('Status > 0');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionProdfin()
    {
        $searchModel = new PedidoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->Where('Status = 0');

        return $this->render('prodfin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedido model.
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
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pedido();
        
        if ($model->load(Yii::$app->request->post()) ) {
            $model->Status = true;
            $receta = Receta::find()->where(['ProductoID' => $model->ProductoID])->all();
            $permiso = 0;
            foreach($receta as $r){
                $insumo = Insumo::findOne($r->InsumoID);
                $insumo->Stock -= (($model->UnidadXLote * $r->Cantidad) / (100)); 
                if ($insumo->Stock < 0.0){
                   $permiso = 1; 
                }
            }
            if ($permiso == 0){
                
                
                foreach($receta as $r){
                $insumo = Insumo::findOne($r->InsumoID);
                $insumo->Stock -= (($model->UnidadXLote * $r->Cantidad) / (100)); 
                $insumo->save();
                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->PedidoID]);
                }else{
                 return $this->redirect(['noti']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

     

    /**
     * Updates an existing Pedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->PedidoID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionFinalizar($id)
    {
        $model = $this->findModel($id);
        $model->FechaStatusFin = date('Y-m-d');
        $model->Status = false;
        $producto = $model->getProducto();
        $producto->Stock += $model->UnidadXLote;
        $producto->save();
        $model->save();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->PedidoID]);
        }

        $searchModel = new PedidoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->Where('Status > 0');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Pedido model.
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
     * Finds the Pedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pedido::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
     public function init()
    {
        Yii::$app->language = 'es';
    }
       public function actionNoti()
    {
        return $this->render('noti');
    }
}
