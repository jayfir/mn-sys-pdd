<?php

namespace jayfir\pdd\request;

use jayfir\pdd\RequestCheckUtil;

/**
 * @filename ItemPidGenerateRequest.php
 * 推广位生成
 * @encoding UTF-8
 * @author jinhuiZhang <chinhui@coderfarmer.com>
 * @datetime 2018-5-7 10:23:09
 */
class ItemPidGenerateRequest
{

    /**
     * 要生成的推广位数量，默认为10，范围为：1~100
     * @var type 
     */
    private $number;

    /**
     *
     *
     */
    private $pidNameList;
    private $apiParas = array();

    public function getApiMethodName()
    {
        return "pdd.ddk.goods.pid.generate";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function setNumber($number)
    {
        $this->number = $number;
        $this->apiParas['number'] = $number;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setPidNameList($pidNameList)
    {
        $this->pidNameList = $pidNameList;
        $this->apiParas['p_id_name_list'] = $pidNameList;
    }

    public function getPidNameList()
    {
        return $this->pidNameList;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->number, 'number');
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

}
