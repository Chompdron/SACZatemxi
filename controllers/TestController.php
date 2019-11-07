<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use kartik\mpdf\Pdf;

class TestController extends Controller
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
                        'actions' => ['pdf','pdf2','tablaajax','graficos'],
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


        public function init()
    {
        parent::init();
        \Yii::$app->language = 'es';
        \Yii::$app->layout   = 'mainCustom';
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionPdf()
    {

          $content = $this->renderPartial('_reportView');
    
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
                    'SetHeader'=>['Header de tu reporte'], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
            
            // return the pdf output as per the destination setting
            return $pdf->render(); 

    }

    public function actionPdf2()
    {

        $pdf = Yii::$app->pdf;
        $pdf->content = "Contenido del reporte 2";
        return $pdf->render();
    }


    public function actionGraficos()
    {
        return $this->render('_graficos.php',[]);
    }


    public function actionTablaajax(){
        \Yii::$app->layout   = 'main';

        $searchModel = new \app\models\UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('_tablaajax.php',["dataProvider"=>$dataProvider, "searchModel"=>$searchModel]);
    }


}
