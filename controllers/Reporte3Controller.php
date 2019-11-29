<?php

namespace app\controllers;


use Yii;
use app\models\Cliente;
use app\models\ClienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Reporte3Search;
use yii\filters\AccessControl;

/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class Reporte3Controller extends Controller
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
     * Lists all Cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Reporte3Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function init()
    {
        Yii::$app->language = 'es';
    }
}