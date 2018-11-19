<?php
namespace app\models;
use yii\db\Command;


class Data extends \yii\base\BaseObject
{
    function __construct() {
    $data = \Yii::$app->db->createCommand("SELECT id, username, password FROM users")->queryAll();
   // $data = array();
   // while( $dat = mysqli_fetch_assoc($result) )
   // $data = $dat;
    return $data;
}
}
