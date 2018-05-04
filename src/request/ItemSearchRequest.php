<?php

namespace jayfir\pdd\request;

use jayfir\pdd\RequestCheckUtil;

/**
 * @filename ItemSearchRequest.php
 *  POP pdd.ddk.goods.search
 * @encoding UTF-8
 * @author jinhuiZhang <chinhui@coderfarmer.com>
 * @datetime 2018-5-4 17:22:21
 */
class ItemSearchRequest
{

    private $apiParas = array();

    public function getApiMethodName()
    {
        return "pdd.ddk.goods.search";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {
        
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

}
