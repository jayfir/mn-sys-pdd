<?php

namespace jayfir\pdd\request;

use jayfir\pdd\RequestCheckUtil;

/**
 * @filename ItemPidQueryRequest.php
 * 
 * @encoding UTF-8
 * @author jinhuiZhang <chinhui@coderfarmer.com>
 * @datetime 2018-5-7 17:12:24
 */
class ItemPidQueryRequest
{

    /**
     * 返回的页数
     * @var type 
     */
    private $page;

    /**
     * 返回的每页推广位数量
     * @var type 
     */
    private $pageSize;
    private $apiParas = array();

    public function getApiMethodName()
    {
        return "pdd.ddk.goods.pid.query";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function setPage($page)
    {
        $this->page = $page;
        $this->apiParas['page'] = $page;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
        $this->apiParas['page_size'] = $pageSize;
    }

    public function getPageSize()
    {
        return $this->pageSize;
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
