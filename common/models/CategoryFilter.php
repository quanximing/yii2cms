<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category_filter".
 *
 * @property int $category_id
 * @property int $filter_id
 */
class CategoryFilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_filter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'filter_id'], 'required'],
            [['category_id', 'filter_id'], 'integer'],
            [['category_id', 'filter_id'], 'unique', 'targetAttribute' => ['category_id', 'filter_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'filter_id' => 'Filter ID',
        ];
    }
}
