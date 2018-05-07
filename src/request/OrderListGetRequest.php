<?php

namespace jayfir\pdd\request;

/**
 * @filename OrderListGetRequest.php
 * 查询推广订单 90天
 * @encoding UTF-8
 * @author jinhuiZhang <chinhui@coderfarmer.com>
 * @datetime 2018-5-7 10:48:37
 */
class OrderListGetRequest
{

    private $startTime;
    private $endTime;
    private $pid;
    private $pageSize;
    private $page;
    private $timeType;
    private $apiParas = array();

    public function getApiMethodName()
    {
        return "pdd.ddk.order.list.range.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
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

    public function setTimeType($timeType)
    {
        $this->timeType = $timeType;
        $this->apiParas['time_type'] = $timeType;
    }

    public function getTimeType()
    {
        return $this->timeType;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->startTime, 'start_time');
        RequestCheckUtil::checkNotNull($this->endTime, 'end_time');
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

}
