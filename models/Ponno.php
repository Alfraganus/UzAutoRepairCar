<?php

namespace app\models;

use Yii;
use yii\base\Model;
/**
 * This is the model class for table "test".
 *
 * @property int $test1
 * @property int $test2
 * @property int $test3
 * @property int $test4
 */
class Ponno extends Model
{
    /**
     * {@inheritdoc}
     */
   
    public $ponno;

    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['test2', 'test3', 'test4'], 'required'],
            [['ponno'], 'required','message'=>'So\'rovni yuborish uchun, Ponno raqamini kiritish kerak'],
             [['ponno'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ponno' => 'ponno',
            
        ];
    }
}
