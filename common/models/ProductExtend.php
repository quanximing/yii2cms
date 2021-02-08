<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_extend".
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $url 有url跳url,否则展示desction
 * @property string $desction
 * @property int $status
 * @property int $at_time
 */
class ProductExtend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_extend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'status', 'at_time'], 'integer'],
            [['desction'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'name' => 'Name',
            'url' => 'Url',
            'desction' => 'Desction',
            'status' => 'Status',
            'at_time' => 'Aitime',
        ];
    }
}
