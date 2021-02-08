<?php

namespace backend\models;

use Yii;
use common\models\Review;
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
class Breview extends Review
{

}
