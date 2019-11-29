<?php

namespace app\controllers;

use Yii;
use app\models\PedidoProvLista;
use app\models\PedidoProvListaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PedidoProvListaController implements the CRUD actions for PedidoProvLista model.
 */
class PedidoProvListaController extends Controller
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
     * Lists all PedidoProvLista models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidoProvListaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PedidoProvLista model.
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
     * Creates a new PedidoProvLista model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PedidoProvLista();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->PedidoProvListaID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PedidoProvLista model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->PedidoProvListaID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PedidoProvLista model.
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
     * Finds the PedidoProvLista model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PedidoProvLista the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PedidoProvLista::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function init()
    {
        Yii::$app->language = 'es';
    }
}
