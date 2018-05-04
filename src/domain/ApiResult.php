<?php

namespace jayfir\pdd\domain;

/**
 * 根据站点名称查询产品
 * @author auto create
 */
class ApiResult extends \yii\base\Model
{

    /**
     * 执行成功
     * */
    public $code;

    /**
     * 执行成功后的结果
     * 
     * */
    public $data;

    /**
     * 错误信息
     * */
    public $error_msg;

}

?>