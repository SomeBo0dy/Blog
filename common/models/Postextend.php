<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post_extend".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $p_view_count
 *
 * @property Post $post
 */
class Postextend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_extend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id'], 'required'],
            [['post_id', 'p_view_count'], 'integer'],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'p_view_count' => 'P View Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }
    public function upCounter($condition, $attribute, $num)
    {
        $counter = $this->findOne($condition);
        if(!$counter){
            $this->setAttributes($condition);
            $this->$attribute = $num;
            $this->save();
        }else{

            $counter->p_view_count += $num;
            $counter->save(); 
        }
        return $counter;
    }
    
}