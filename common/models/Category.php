<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $category
 * @property integer $count
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => '文章类别',
            'count' => '文章数量',
        ];
    }

    public static function updateCount($oldCategory, $newCategory)
    {
        if (!empty($oldCategory) || !empty($newCategory)) {

            if (!is_null($oldCategory) && $oldCategory  != -1) {
                $old = Category::find()->where(['id' => $oldCategory])->one();
                $old->count -= 1;
                $old->save();
            }
            
            if ($newCategory != -1) {
                $new = Category::find()->where(['id' => $newCategory])->one();
                $new->count += 1;
                $new->save();
            }
        }
    }
}