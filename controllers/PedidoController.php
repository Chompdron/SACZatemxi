<?php

namespace app\controllers;

use Yii;
use app\models\Pedido;
use app\models\Insumo;
use app\models\PedidoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
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

        return $this->render('index', [
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
            $receta = $model->getInsumos();
            foreach($receta as $r){
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                $insumoid = $r->InsumoID;
                $s = new Insumo();
                $insumo = $s->findModel($insumoid);
                $insumo->Stock -= $r->Cantidad;
=======
=======
>>>>>>> Stashed changes

                $insumo = Insumo::find()->where(["InsumoID" => $r->InsumoID])->one();
                $insumo->Stock -= ($r->Cantidad)*$model->UnidadXLote;
                
                $insumo->save(false);
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->PedidoID]);
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
        $producto->Stock+= $model->UnidadXLote;
        $producto->save();
        $model->save();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->PedidoID]);
        }

        $searchModel = new PedidoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
}
