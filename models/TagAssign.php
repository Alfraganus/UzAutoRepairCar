<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "tag_assign".
 *
 * @property integer $id
 * @property integer $tag_id
 * @property integer $post_id
 * @property integer sector
 * @property integer department
 * @property integer money_spent
 * @property integer shift
 * @property integer model
 * @property integer date
 *
 * @property Post $post
 * @property Tag $tag
 */
class TagAssign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag_assign';
    }
    public $cnt;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_id', 'post_id'], 'required'],
            [['cnt','shift','date'], 'safe'],
            [['tag_id', 'post_id','sector','department','money_spent'], 'integer'],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProblemMonitorings::className(), 'targetAttribute' => ['post_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_id' => 'Tag ID',
            'post_id' => 'Post ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(ProblemMonitorings::className(), ['id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }
}
