<?php

namespace backend\models;

use Yii;
use common\models\CategoryDescription;
/**
 * This is the model class for table "category_description".
 *
 * @property int $category_id
 * @property int $language_id
 * @property string $name
 * @property string $description
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 */
class BcategoryDescription extends CategoryDescription
{

}
