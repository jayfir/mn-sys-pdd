<?php

namespace jayfir\pdd\request;

use jayfir\pdd\RequestCheckUtil;

/**
 * @filename CheckInPromBillIncrGetRequest.php
 * 
 * @encoding UTF-8
 * @author jinhuiZhang <chinhui@coderfarmer.com>
 * @datetime 2018-5-9 17:52:16
 */
class CheckInPromBillIncrGetRequest
{

    public $pid;

    /**
     * 最后更新时间--查询时间开始。
     * @var type 
     */
    public $startTime;

    /**
     * 最后更新时间--查询时间结束。
     * @var type 
     */
    public $endTime;
    public $page;
    public $pageSize;
    private $apiParas = array();

    public function getApiMethodName()
    {
        return "pdd.ddk.check.in.prom.bill.incr.get";
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

    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
        $this->apiParas[' start_time'] = $startTime;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }

    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
        $this->apiParas['end_time'] = $endTime;
    }

    public function getEndTime()
    {
        return $this->endTime;
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
        RequestCheckUtil::checkNotNull($this->parentOptId, 'parent_opt_id');
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

}
