<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "manufacturer".
 *
 * @property int $manufacturer_id
 * @property string $name
 * @property string $image
 * @property string $config_input json
 * @property int $sort_order
 */
class Manufacturer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manufacturer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sort_order'], 'required'],
            [['config_input'], 'string'],
            [['sort_order'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'manufacturer_id' => '制造商/品牌名称ID',
            'name' => '制造商/品牌名称',
            'image' => '图像',
            'config_input' => '投保信息配置',
            'sort_order' => '排序',
        ];
    }
}
