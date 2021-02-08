<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_recurring".
 *
 * @property int $recurring_id
 * @property int $product_id
 * @property string $fee
 * @property string $frequency
 * @property int $duration
 * @property int $cycle
 * @property string $name
 * @property int $status
 * @property int $sort_order
 */
class ProductRecurring extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_recurring';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'fee', 'frequency', 'duration', 'cycle', 'name', 'status', 'sort_order'], 'required'],
            [['product_id', 'duration', 'cycle', 'sort_order'], 'integer'],
            [['fee'], 'number'],
            [['frequency'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recurring_id' => 'Recurring ID',
            'product_id' => 'Product ID',
            'fee' => 'Fee',
            'frequency' => 'Frequency',
            'duration' => 'Duration',
            'cycle' => 'Cycle',
            'name' => 'Name',
            'status' => 'Status',
            'sort_order' => 'Sort Order',
        ];
    }
}
