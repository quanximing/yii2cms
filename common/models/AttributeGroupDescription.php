<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "attribute_group_description".
 *
 * @property int $attribute_group_id
 * @property int $language_id
 * @property string $name
 */
class AttributeGroupDescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attribute_group_description';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attribute_group_id', 'language_id', 'name'], 'required'],
            [['attribute_group_id', 'language_id'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['attribute_group_id', 'language_id'], 'unique', 'targetAttribute' => ['attribute_group_id', 'language_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attribute_group_id' => '属性组ID',
            'language_id' => '语言ID',
            'name' => '名称',
        ];
    }
}
