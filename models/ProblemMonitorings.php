<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "problem_monitorings".
 *
 * @property int $id
 * @property int $sector
 * @property string $shift
 * @property string $date
 * @property string $model
 * @property int $department
 * @property string $PO
 * @property string $problem
 * @property int $spent_on
 * @property string $comment
 * @property string $winno
 * @property int $user_id
 * @property string $created_at
 */
class ProblemMonitorings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'problem_monitorings';
    }
    public $search;
    public $tag;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sector', 'department', 'spent_on', 'user_id'], 'integer'],
            // [['shift', 'department'], 'required'],
            [['date', 'created_at'], 'safe'],
            [['problem', 'comment'], 'string'],
            [['shift'], 'string', 'max' => 10],
            [['model'], 'string', 'max' => 150],
            [['PO', 'winno'], 'string', 'max' => 100],
            [['ponno','search','tag'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sector' => 'Uchastka',
            'shift' => 'Smena',
            'date' => 'Sana',
            'model' => 'Model',
            'department' => 'Bo\'lim',
            'PO' => 'P/O',
            'problem' => 'Muammo',
            'spent_on' => 'Sarflangan',
            'comment' => 'Izoh',
            'winno' => 'Win kod',
            'user_id' => 'Kiritdi',
            'created_at' => 'Tizimga kiritilgan sana',
            'search' => 'Tizimdan izlash (Win kodi, P/O yoki model bo\'yicha)',
            'tag' => 'Kod',
        ];
    }
}
