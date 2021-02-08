<?php

namespace backend\models;

use Yii;
use common\models\AuthAssignment;
/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property int $created_at
 *
 * @property AuthItem $itemName
 */
class BauthAssignment extends AuthAssignment
{

}
