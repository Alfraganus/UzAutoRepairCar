<?php

namespace app\controllers;

use Yii;
use app\models\Quality;
use app\models\QualitySearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * QualityController implements the CRUD actions for Quality model.
 */
class QualityController extends Controller
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
     * Lists all Quality models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QualitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Quality model.
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
     * Creates a new Quality model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Quality();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
	        $model->image = UploadedFile::getInstance($model, 'image');
	        if ($model->image and $model->upload()) {
		        $model->image = $model->image->baseName.time().'.'.$model->image->extension;
		        $model->save();
	        }
        	$model->date = date('Y-m-d');
        	$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Quality model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
	    if(Yii::$app->user->identity->role=='quality_writer'){
		    throw new ForbiddenHttpException('Sizda ushbu amal uchun ruxsat mavjud emas!');
	    }

        $model = $this->findModel($id);
	    $image = $model->image;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        	$model->image = UploadedFile::getInstance($model, 'image');
	        if ($model->image and $model->upload()) {
		        $model->image = $model->image->baseName.time().'.'.$model->image->extension;
		        $model->save(false);
	        }else{
		        $model->image = $image;
		        $model->save(false);
	        }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Quality model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
	    if(Yii::$app->user->identity->role=='quality_writer'){
		    throw new ForbiddenHttpException('Sizda ushbu amal uchun ruxsat mavjud emas!');
	    }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Quality model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quality the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quality::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
