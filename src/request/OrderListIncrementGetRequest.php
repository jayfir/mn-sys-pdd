<?php

namespace jayfir\pdd\request;

use jayfir\pdd\RequestCheckUtil;

/**
 * @filename OrderListIncrementGetRequest.php
 *  最后更新时间段增量同步推广订单信息
 * @encoding UTF-8
 * @author jinhuiZhang <chinhui@coderfarmer.com>
 * @datetime 2018-5-7 17:18:25
 */
class OrderListIncrementGetRequest
{

    /**
     * 最近90天内多多进宝商品订单更新时间--查询时间开始。note：此时间为时间戳
     * @var type 
     */
    private $startUpdateTime;

    /**
     * 最近90天内多多进宝商品订单更新时间--查询时间结束。note：此时间为时间戳
     * @var type 
     */
    private $endUpdateTime;

    /**
     * 推广位ID
     * @var type 
     */
    private $pid;

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
        return "pdd.ddk.order.list.increment.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function setStartUpdateTime($startUpdateTime)
    {
        $this->startUpdateTime = $startUpdateTime;
        $this->apiParas['start_update_time'] = $startUpdateTime;
    }

    public function getStartUpdateTime()
    {
        return $this->startUpdateTime;
    }

    public function setEndUpdateTime($endUpdateTime)
    {
        $this->endUpdateTime = $endUpdateTime;
        $this->apiParas['end_update_time'] = $endUpdateTime;
    }

    public function getEndUpdateTime()
    {
        return $this->endUpdateTime;
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
        RequestCheckUtil::checkNotNull($this->startUpdateTime, 'start_update_time');
        RequestCheckUtil::checkNotNull($this->endUpdateTime, 'end_update_time');
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

}
