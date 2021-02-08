<?php

namespace common\models;

use Yii;
use common\models\FilterGroupDescription;
/**
 * This is the model class for table "filter_group".
 *
 * @property int $filter_group_id
 * @property int $sort_order
 */
class FilterGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filter_group';
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
            'filter_group_id' => 'Filter Group ID',
            'sort_order' => '排序',
        ];
    }

    public function getGroupdescription()
    {
        return $this->hasOne(FilterGroupDescription::className(),['filter_group_id'=>'filter_group_id']);
    }
}
