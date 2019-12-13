<?php

namespace app\controllers;

use app\models\ProblemMonitorings;
use app\models\Sectors;
use Yii;
use yii\base\ErrorException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['login', 'error'],
						'allow' => true,
					],
					[
						'actions' => ['logout', 'index','manageCountry'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
				],
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
    	/*for cars report n1*/
	   $sectors= Sectors::find()->all();
	    $model = new ProblemMonitorings();
	    $model->dateSearch= date('Y-m-d 08:00:00').' - '.date('Y-m-d 24:00:00');




	    foreach($sectors as $sector)
	    {
	    	$labels[]=$sector->name;
	    }

	    if ($model->load(Yii::$app->request->post()) ){
		    $statisticsDateBegin = ProblemMonitorings::GetStatisticsDateStart($model->dateSearch);
		    $statisticsDateFinish = ProblemMonitorings::GetStatisticsDateEnd($model->dateSearch);

	    }

        return $this->render('index',compact(
		        'labels',
		              'sectors',
		               'model',
		        'statisticsDateBegin',
	                  'statisticsDateFinish'
        ));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
	public function actionLogin()
	{
		{
			// user is logged in, he doesn't need to login
			$this->layout = "user-login";
			if (!Yii::$app->user->isGuest) {
				return $this->goHome();
			}

			// get setting value for 'Login With Email'
			$lwe = Yii::$app->params['lwe'];

			// if 'lwe' value is 'true' we instantiate LoginForm in 'lwe' scenario
			$model = $lwe ? new LoginForm(['scenario' => 'lwe']) : new LoginForm();

			// monitor login status
			$successfulLogin = true;

			// posting data or login has failed
			if (!$model->load(Yii::$app->request->post()) || !$model->login()) {
				$successfulLogin = false;
			}

			// if user's account is not activated, he will have to activate it first
			if ($model->status === 0 && $successfulLogin === false) {
				Yii::$app->session->setFlash('error', Yii::t('app',
				                                             'You have to activate your account first. Please check your email.'));
				return $this->refresh();
			}

			// if user is not denied because he is not active, then his credentials are not good
			if ($successfulLogin === false) {
				return $this->render('login', ['model' => $model]);
			}

			// login was successful, let user go wherever he previously wanted
			return $this->goBack();
		}

	}


	/**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


}
