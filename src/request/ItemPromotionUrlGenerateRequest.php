<?php

namespace jayfir\pdd\request;

use jayfir\pdd\RequestCheckUtil;

/**
 * @filename ItemPromotionUrlGenerateRequest.php
 * 
 * @encoding UTF-8
 * @author jinhuiZhang <chinhui@coderfarmer.com>
 * @datetime 2018-5-7 10:28:58
 */
class ItemPromotionUrlGenerateRequest
{

    /**
     * 推广位ID
     * @var type 
     */
    private $pid;

    /**
     * 商品ID，仅支持单个查询
     * @var type 
     */
    private $goodsIdList;

    /**
     * 是否生成短链接，true-是，false-否
     * @var type 
     */
    private $generateShortUrl;

    /**
     * true--生成多人团推广链接 false--生成单人团推广链接（默认false）
     * 1、单人团推广链接：用户访问单人团推广链接H5页面，可直接购买商品无需拼团。
     * （若用户访问APP，则按照多人团推广链接处理）
     * 2、多人团推广链接：用户访问双人团推广链接开团，若用户分享给他人参团，则开团者和参团者的佣金均结算给推手。
     * @var type 
     */
    private $multiGroup;

    /**
     * 自定义参数，为链接打上自定义标签
     * @var type 
     */
    private $customParameters;

    /**
     * 是否生成小程序推广链接
     * @var type 
     */
    private $generateWeApp;
    private $generateWeappWebview;
    private $apiParas = array();

    public function getApiMethodName()
    {
        return "pdd.ddk.goods.promotion.url.generate";
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

    public function setGoodsIdList($goodsIdList)
    {
        $this->goodsIdList = $goodsIdList;
        $this->apiParas['goods_id_list'] = $goodsIdList;
    }

    public function getGoodsIdList()
    {
        return $this->goodsIdList;
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

    public function setGenerateWeApp($generateWeApp)
    {
        $this->generateWeApp = $generateWeApp;
        $this->apiParas['generate_we_app'] = $generateWeApp;
    }

    public function getGenerateWeApp()
    {
        return $this->generateWeApp;
    }

    public function setGenerateWeAppWebview($generateWeappWebview)
    {
        $this->generateWeappWebview = $generateWeappWebview;
        $this->apiParas['generate_weapp_webview'] = $generateWeappWebview;
    }

    public function getGenerateWeAppWebview()
    {
        return $this->generateWeappWebview;
    }

    public function setMultiGroup($multiGroup)
    {
        $this->multiGroup = $multiGroup;
        $this->apiParas['multi_group'] = $multiGroup;
    }

    public function getMultiGroup()
    {
        return $this->multiGroup;
    }

    public function setCustomParameters($customParameters)
    {
        $this->customParameters = $customParameters;
        $this->apiParas['custom_parameters'] = $customParameters;
    }

    public function getCustomParameters()
    {
        return $this->customParameters;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->pid, 'p_id');
        RequestCheckUtil::checkNotNull($this->goodsIdList, 'goods_id_list');
        RequestCheckUtil::checkNotNull($this->generateShortUrl, 'generate_short_url');
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

}
