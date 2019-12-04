<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_price".
 *
 * @property int $id
 * @property int $sector_id
 * @property string $model
 * @property int $is_little
 * @property int $is_medium
 * @property int $is_large
 * @property int $is_active
 * @property int $created_by
 * @property int $last_updated_by
 */
class ServicePrice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sector_id', 'is_little', 'is_medium', 'is_large'], 'integer','message'=>'Sonlar bir biriga qo\'shilib yozilishi kerak masalan: (15000)'],
            [['sector_id', 'is_little', 'is_medium', 'is_large'], 'required','message'=>'Ushbu maydonga malumot kiritilishi shart'],
            [['model'], 'required'],
            [['created_by', 'last_updated_by','is_active'],'safe'],
            [['model'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sector_id' => 'Uchastka nomi',
            'model' => 'Model',
            'is_little' => 'Kichik',
            'is_medium' => 'O\'rta',
            'is_large' => 'Katta',
            'is_active' => 'Aktiv',
            'created_by' => 'no-aktiv',
            'last_updated_by' => 'So\'ngi tahrirlagan foydalanuvchi:',
        ];
    }

	public function getUchastka()
	{
		return $this->hasOne(Sectors::className(), ['id' => 'sector_id']);
	}
}
