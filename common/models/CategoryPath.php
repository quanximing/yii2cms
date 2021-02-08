<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category_path".
 *
 * @property int $category_id
 * @property int $path_id
 * @property int $level
 */
class CategoryPath extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_path';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'path_id', 'level'], 'required'],
            [['category_id', 'path_id', 'level'], 'integer'],
            [['category_id', 'path_id'], 'unique', 'targetAttribute' => ['category_id', 'path_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'path_id' => 'Path ID',
            'level' => 'Level',
        ];
    }
}
