<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category_to_layout".
 *
 * @property int $category_id
 * @property int $store_id
 * @property int $layout_id
 */
class CategoryToLayout extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_to_layout';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'store_id', 'layout_id'], 'required'],
            [['category_id', 'store_id', 'layout_id'], 'integer'],
            [['category_id', 'store_id'], 'unique', 'targetAttribute' => ['category_id', 'store_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'store_id' => 'Store ID',
            'layout_id' => 'Layout ID',
        ];
    }
}
