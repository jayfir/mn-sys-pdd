<?php

namespace jayfir\pdd\request;

use jayfir\pdd\RequestCheckUtil;

/**
 * @filename ItemDetailRequest.php
 * 
 * @encoding UTF-8
 * @author jinhuiZhang <chinhui@coderfarmer.com>
 * @datetime 2018-5-7 17:09:17
 */
class ItemDetailRequest
{

    /**
     * 商品ID，仅支持单个查询。例如：[123456]
     * @var type 
     */
    private $goodsIdList;
    private $apiParas = array();

    public function getApiMethodName()
    {
        return "pdd.ddk.goods.detail";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function setGoodsIdList($goodsIdList)
    {
        $this->goodsIdList = $goodsIdList;
        $this->apiParas['goods_id_list'] = $goodsIdList;
    }

    public function getGoodsIdList()
    {
        return $this->goodsIdList;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->goodsIdList, 'goods_id_list');
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

}
