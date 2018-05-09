<?php

namespace jayfir\pdd\request;

use jayfir\pdd\RequestCheckUtil;

/**
 * @filename IteOptGetRequest.php
 * 查询商品标签列表
 * @encoding UTF-8
 * @author jinhuiZhang <chinhui@coderfarmer.com>
 * @datetime 2018-5-7 17:29:30
 */
class ItemOptGetRequest
{

    /**
     * 值=0时为顶点opt_id,通过树顶级节点获取opt树
     * @var type 
     */
    private $parentOptId;
    private $apiParas = array();

    public function getApiMethodName()
    {
        return "pdd.goods.opt.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function setParentOptId($parentOptId)
    {
        $this->parentOptId = $parentOptId;
        $this->apiParas['parent_opt_id'] = $parentOptId;
    }

    public function getParentOptId()
    {
        return $this->parentOptId;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->parentOptId, 'parent_opt_id');
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

}
