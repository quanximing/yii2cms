<?php

namespace backend\models;

use Yii;
use common\models\BannerImage;
/**
 * This is the model class for table "banner_image".
 *
 * @property int $banner_image_id
 * @property int $banner_id
 * @property int $language_id
 * @property string $title
 * @property string $link
 * @property string $image
 * @property int $sort_order
 */
class BbannerImage extends BannerImage
{

}
