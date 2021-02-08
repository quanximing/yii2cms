<?php

namespace common\models;

use Yii;
/**
 * This is the model class for table "filter".
 *
 * @property int $filter_id
 * @property int $filter_group_id
 * @property int $sort_order
 */
class Filter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filter_group_id', 'sort_order'], 'required'],
            [['filter_group_id', 'sort_order'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'filter_id' => '过滤ID',
            'filter_group_id' => '过滤分组ID',
            'sort_order' => '排序',
        ];
    }
    public function getDescription(){
        return $this->hasOne(FilterDescription::className(),['filter_id'=>'filter_id']);
    }
}
