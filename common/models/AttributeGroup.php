<?php

namespace common\models;

use Yii;
use common\models\AttributeGroupDescription;
/**
 * This is the model class for table "attribute_group".
 *
 * @property int $attribute_group_id
 * @property int $sort_order
 */
class AttributeGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attribute_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort_order'], 'required'],
            [['sort_order'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attribute_group_id' => '属性组ID',
            'sort_order' => '排序',
        ];
    }

    public function getGroupdescription(){
        return $this->hasOne(AttributeGroupDescription::className(),['attribute_group_id'=>'attribute_group_id']);
    }
}
