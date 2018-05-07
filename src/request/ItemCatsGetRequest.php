<?php

namespace jayfir\pdd\request;

use jayfir\pdd\RequestCheckUtil;

/**
 * @filename ItemCatsGetRequest.php
 * 
 * @encoding UTF-8
 * @author jinhuiZhang <chinhui@coderfarmer.com>
 * @datetime 2018-5-7 17:34:06
 */
class ItemCatsGetRequest
{

    /**
     * 值=0时为顶点cat_id,通过树顶级节点获取cat树
     * @var type 
     */
    private $parentCatId;
    private $apiParas = array();

    public function getApiMethodName()
    {
        return "pdd.goods.cats.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function setParentCatId($parentCatId)
    {
        $this->parentCatId = $parentCatId;
        $this->apiParas['parent_cat_id'] = $parentCatId;
    }

    public function getParentOptId()
    {
        return $this->parentOptId;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->parentCatId, 'parent_cat_id');
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

}
