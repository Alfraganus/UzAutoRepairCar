<?php

namespace app\controllers;

use app\models\ProblemMonitorings;
use app\models\Sectors;
use app\models\TagAssign;
use Yii;
use app\models\Test;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TestController implements the CRUD actions for Test model.
 */
class TestController extends Controller
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

	public function actionRepairSectorMonitorings()
	{
		$cars_in_monitorings = ProblemMonitorings::find()
		                          ->select(['id','PO','COUNT(*) as cnt'])
		                          ->groupBy(['PO'])
		                          ->orderBy('cnt desc')
		                          ->limit(15)
		                          ->all();
		$sectors = Sectors::find()->groupBy(['name'])->all();

		return $this->render('repair_sector_monitorings',compact(
			'sectors',
			'cars_in_monitorings'
		));
	}

	public function actionDetailCar($po)
	{
		$car = ProblemMonitorings::find()->where(['PO'=>$po])->all();
		return $this->render('detail',compact('car'));
	}

    public function actionGetoperations()
    {
        $id = Yii::$app->request->post('id');
        if(Yii::$app->request->post('id')) {
            $arrayed =  (explode(" ",$id));
            $res = $arrayed[2];
            
              return "<option>$res</option>";; 
        } 
        
      // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
     
    }

    public function actionGetoperation()
    {
        $id = Yii::$app->request->post('idtwo');
        if(Yii::$app->request->post('idtwo')) {
            // $arrayed =  (explode(" ",$id));
            // $res = $arrayed[2];
            
              return "<option>ishladim</option>";; 
        } 
        
      // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
     
    }


    /**
     * Lists all Test models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Test(); 
        $dataProvider = new ActiveDataProvider([
            'query' => Test::find(),
        ]);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create', 'ponno' => $model->ponno]);
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Test model.
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
     * Creates a new Test model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Test();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->test1]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Test model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->test1]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Test model.
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
     * Finds the Test model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Test the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Test::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
