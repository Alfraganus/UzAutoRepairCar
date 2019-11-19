<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $test1
 * @property int $test2
 * @property int $test3
 * @property int $test4
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }
    public $ponno;

    public $search;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['test2', 'test3', 'test4'], 'required'],
            [['test2', 'test3', 'test4','search','ponno'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'test1' => 'Test1',
            'test2' => 'Test2',
            'test3' => 'Test3',
            'test4' => 'Test4',
        ];
    }
}
