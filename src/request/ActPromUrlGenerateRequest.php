<?php

namespace jayfir\pdd\request;

use jayfir\pdd\RequestCheckUtil;

/**
 * @filename ActPromUrlGenerateRequest.php
 *  生成活动推广链接（分享红包赚佣金）
 * @encoding UTF-8
 * @author jinhuiZhang <chinhui@coderfarmer.com>
 * @datetime 2018-5-7 11:35:15
 */
class ActPromUrlGenerateRequest
{

    /**
     * 链接类型（传1）
     * @var type 
     */
    private $urlType;

    /**
     * 是否生成短链接，true--生成
     * @var type 
     */
    private $generateShortUrl;

    /**
     * 是否生成手机短链接，true--生成
     * @var type 
     */
    private $generateMobileShortUrl;

    /**
     * p_id列表，如：["60005_612"]
     * @var type 
     */
    private $pidList;
    private $apiParas = array();

    public function getApiMethodName()
    {
        return "pdd.ddk.act.prom.url.generate";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function setUrlType($urlType)
    {
        $this->urlType = $urlType;
        $this->apiParas['url_type'] = $urlType;
    }

    public function getUrlType()
    {
        return $this->urlType;
    }

    public function setGenerateShortUrl($generateShortUrl)
    {
        $this->generateShortUrl = $generateShortUrl;
        $this->apiParas['generate_short_url'] = $generateShortUrl;
    }

    public function getGenerateShortUrl()
    {
        return $this->generateShortUrl;
    }

    public function setGenerateMobileShortUrl($generateMobileShortUrl)
    {
        $this->generateMobileShortUrl = $generateMobileShortUrl;
        $this->apiParas['generate_mobile_short_url'] = $generateMobileShortUrl;
    }

    public function getGenerateMobileShortUrl()
    {
        return $this->generateMobileShortUrl;
    }

    public function setPidList($pidList)
    {
        $this->pidList = $pidList;
        $this->apiParas['p_id_list'] = $pidList;
    }

    public function getPidList()
    {
        return $this->pidList;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->urlType, 'url_type');
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

}
