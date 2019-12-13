<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sectors".
 *
 * @property int $id
 * @property string $name
 */
class Sectors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sectors';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Uchastka nomi',
        ];
    }

    public function getPrices()
    {
	    return $this->hasMany(ServicePrice::className(), ['sector_id' => 'id']);
    }


    public function FindDisabledCar($model,$sector,$case,$datebegin,$dateFinish)
    {
	    $previousMonth = date('m')-1;
	    $year = date('Y');
	    $day = date('01');

	    $findCar = ProblemMonitorings::find()
	                                 ->where(['model' => $model])
	                                 ->andWhere(['sector' => $sector])
		                                ->andWhere(['repair_case'=>$case])
															    ->andWhere(['>', 'date', $datebegin])
															    ->andWhere(['<', 'date', $dateFinish])
	                                 ->count();
    	return $findCar;

    }

    public function findFinalPrice($sector,$model,$case,$datebegin,$dateFinish)
    {


	    $final = ProblemMonitorings::find()
	                                 ->where(['model'=>$model])
															    ->andWhere(['sector'=>$sector])
															    ->andWhere(['repair_case'=>$case])
															    ->andWhere(['>', 'date', $datebegin])
															    ->andWhere(['<', 'date', $dateFinish])
	                                 ->sum('money_spent');
	    return $final;

    }

    public function ModelName($CarCode)
    {
	    switch ($CarCode) {
		    case "1JX69":
			    $CarCode = "Cobalt";
			    break;
		    case "13U19":
			    $CarCode = "Gentra";
			    break;
		    case "1TF69":
			    $CarCode = "Nexia";
			    break;
		    case "1CQ48":
			    $CarCode = "Spark";
			    break;
		    default:
			    echo "unknown car";
	    }
      return $CarCode;
    }
}
