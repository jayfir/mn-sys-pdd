<?php

namespace jayfir\pdd\request;

use jayfir\pdd\RequestCheckUtil;

/**
 * @filename CheckInProUrlGenerateRequest.php
 * 
 * @encoding UTF-8
 * @author jinhuiZhang <chinhui@coderfarmer.com>
 * @datetime 2018-5-9 17:40:15
 */
class CheckInPromUrlGenerateRequest
{

    private $pid;
    private $apiParas = array();

    public function getApiMethodName()
    {
        return "pdd.ddk.check.in.prom.url.generate";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function setPid($pid)
    {
        $this->pid = $pid;
        $this->apiParas['p_id'] = $pid;
    }

    public function getPid()
    {
        return $this->pid;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->pid, 'p_id');
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

}
