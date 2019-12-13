<?php
namespace app\controllers;

use Yii;
use app\models\Tag;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * TagController implements the CRUD actions for Tag model.
 */
class TagController extends Controller
{
    /**
     * @inheritdoc
     */


    /**
     * Lists all Tag models.
     * @return mixed
     */
 
    public function actionList($query)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $items = [];
        $query = urldecode(mb_convert_encoding($query, "UTF-8"));
        foreach (\app\models\Tag::find()->where(['like', 'id', $query])->asArray()->all() as $tag) {
            $items[] = ['keyword' => $tag['id'].', '.$tag['name']];
        }
        return $items;
    }

    
    protected function findModel($id)
    {
        if (($model = Tag::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
