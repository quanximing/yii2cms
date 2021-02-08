<?php

namespace common\models;

use Yii;
use common\models\AttributeDescription;
use common\models\AttributeGroupDescription;
/**
 * This is the model class for table "attribute".
 *
 * @property int $attribute_id
 * @property int $attribute_group_id
 * @property int $sort_order
 */
class Attribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attribute_group_id', 'sort_order'], 'required'],
            [['attribute_group_id', 'sort_order'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attribute_id' => 'Attribute ID',
            'attribute_group_id' => 'Attribute Group ID',
            'sort_order' => '排序',
        ];
    }

    public function getDescription()
    {
        return $this->hasOne(AttributeDescription::className(),['attribute_id'=>'attribute_id']);
    }

    public function getGroupdescription()
    {
        return $this->hasOne(AttributeGroupDescription::className(),['attribute_group_id'=>'attribute_group_id']);
    }
}
