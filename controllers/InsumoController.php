<?php

namespace app\controllers;

use Yii;
use app\models\Insumo;
use app\models\InsumoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * InsumoController implements the CRUD actions for Insumo model.
 */
class InsumoController extends Controller
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
     * Lists all Insumo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InsumoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
     
    public function actionNoti()
    {
        return $this->render('noti');
    }
    
    public function actionBitacora($id)
    {
        
        $model = $this->findModel($id);
        
        $searchModel = new \app\models\InsumoEntradaSearch();
        $searchModel->InsumoID = $id;
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('bitacora', [
            'model'=>$model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
     public function actionBitacora2($id)
    {
        
        $model = $this->findModel($id);
        
        $searchModel = new \app\models\InsumoSalidaSearch();
        $searchModel->InsumoID = $id;
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('bitacora2', [
            'model'=>$model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

    /**
     * Displays a single Insumo model.
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
     * Creates a new Insumo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Insumo();

      if ($model->load(Yii::$app->request->post())) {
            $model->Stock=0;
            $model->save();
            return $this->redirect(['view', 'id' => $model->InsumoID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Insumo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post())) {
             $p= Insumo::FindOne($model->InsumoID);
            $model->Stock=$p->Stock;
            $model->save();
            return $this->redirect(['view', 'id' => $model->InsumoID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Insumo model.
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
     * Finds the Insumo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Insumo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Insumo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function init()
    {
        Yii::$app->language = 'es';
    }
}
