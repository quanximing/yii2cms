<?php

namespace backend\models;

use Yii;
use common\models\Customer;
/**
 * This is the model class for table "customer".
 *
 * @property int $customer_id
 * @property int $customer_group_id
 * @property int $sex 性别 0 男 1 女
 * @property string $username 用户名
 * @property string $email 邮箱
 * @property string $telephone 电话
 * @property int $birthday 生日
 * @property string $avatar 头像
 * @property string $password_hash 密码
 * @property string $password_reset_token
 * @property string $salt
 * @property string $wishlist 收藏列表
 * @property int $newsletter 订阅邮件
 * @property string $ip
 * @property int $status
 * @property int $safe
 * @property string $token
 * @property string $code
 * @property string $date_added
 * @property string $weixin_nackname 昵称
 * @property string $weixin_login_openid 微信openid
 * @property string $weixin_login_unionid
 * @property string $weibo_login_access_token
 * @property string $weibo_login_uid
 * @property string $qq_openid
 * @property string $auth_key
 * @property int $created_at 注册时间
 * @property int $updated_at 修改时间
 */
class Bcustomer extends Customer
{

}
