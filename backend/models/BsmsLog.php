<?php

namespace backend\models;

use Yii;
use common\models\SmsLog;
/**
 * This is the model class for table "sms_log".
 *
 * @property int $id 表id
 * @property string $mobile 手机号
 * @property string $session_id session_id
 * @property string $code 验证码
 * @property int $status 发送状态,1:发送成功未使用,0:失败 2 已用
 * @property string $msg 短信内容
 * @property int $scene 发送场景,1:用户注册,2:找回密码,3:客户下保,4:客户支付,5:身份验证
 * @property string $error_msg 发送短信异常内容
 * @property int $create_time 发送时间
 * @property int $used_time 使用时间
 */
class BsmsLog extends SmsLog
{

}
