<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $review_id
 * @property int $product_id
 * @property int $customer_id
 * @property string $author
 * @property string $text
 * @property int $rating
 * @property int $status
 * @property string $date_added
 * @property string $date_modified
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'customer_id', 'author', 'text', 'rating', 'date_added', 'date_modified'], 'required'],
            [['product_id', 'customer_id', 'rating', 'status'], 'integer'],
            [['text'], 'string'],
            [['date_added', 'date_modified'], 'safe'],
            [['author'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'review_id' => 'Review ID',
            'product_id' => 'Product ID',
            'customer_id' => 'Customer ID',
            'author' => 'Author',
            'text' => 'Text',
            'rating' => 'Rating',
            'status' => 'Status',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        ];
    }
}
