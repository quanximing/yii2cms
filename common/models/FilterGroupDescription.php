<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "filter_group_description".
 *
 * @property int $filter_group_id
 * @property int $language_id
 * @property string $name
 */
class FilterGroupDescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filter_group_description';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filter_group_id', 'language_id', 'name'], 'required'],
            [['filter_group_id', 'language_id'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['filter_group_id', 'language_id'], 'unique', 'targetAttribute' => ['filter_group_id', 'language_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'filter_group_id' => 'Filter Group ID',
            'language_id' => 'Language ID',
            'name' => '筛选分组名称',
        ];
    }
}
