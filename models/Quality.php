<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quality".
 *
 * @property int $id
 * @property string $tabel
 * @property string $gsip
 * @property string $latter
 * @property string $date
 */
class Quality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tabel'], 'required'],
            [['date','uchastka','smena'], 'safe'],
            [['tabel', 'gsip'], 'string', 'max' => 50],
            [['image'], 'file',  'extensions' => ['png','jpg','jpeg']],
        ];
    }

	public function upload()
	{
		if ($this->validate()) {
			$this->image->saveAs(Yii::$app->basePath.'/uploads/' . $this->image->baseName.time().'.' . $this->image->extension);
			return true;
		} else {
			return false;
		}
	}


	/**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tabel' => 'Xodim tabel raqami',
            'gsip' => 'GSIP',
            'image' => 'Tushuntirish xati',
            'latter' => 'Xodim tushuntirish xati',
            'date' => 'Sana',
        ];
    }
}
