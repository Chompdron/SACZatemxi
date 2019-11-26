<?php

namespace app\controllers;


use Yii;
use app\models\Cliente;
use app\models\ClienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ReporteSearch;


/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class GraficoController extends Controller
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
     * Lists all Cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionProdventas()
    {
        return $this->render('prodventas.php',[]);
    }
    
    public function actionClientemes()
    {
        return $this->render('clientemes.php',[]);
    }
}    
    
