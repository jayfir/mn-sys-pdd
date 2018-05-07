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

    /**
     * 商品关键词，与opt_id字段选填一个或全部填写
     * @var type 
     */
    private $keyword;

    /**
     * 商品标签类目ID，一级类目ID，使用pdd.goods.opt.get获取
     * @var type 
     */
    private $optId;

    /**
     * 默认值1，商品分页数
     * @var type 
     */
    private $page;

    /**
     * 默认100，每页商品数量
     * @var type 
     */
    private $pageSize;

    /**
     * 排序方式：0-综合排序；1-按佣金比率升序；2-按佣金比例降序；3-按价格升序；4-按价格降序；5-按销量升序；6-按销量降序；7-优惠券金额排序升序；8-优惠券金额排序降序；9-券后价升序排序；10-券后价降序排序；11-按照加入多多进宝时间升序；12-按照加入多多进宝时间降序
     * @var type 
     */
    private $sortType;

    /**
     * 是否只返回优惠券的商品，false返回所有商品，true只返回有优惠券的商品
     * @var type 
     */
    private $withCoupon;

    /**
     * 范围列表，可选值：[{"range_id":0,"range_from":1,"range_to":1500},{"range_id":1,"range_from":1,"range_to":1500}]
     * range_to,range_from,range_id 必填
     * range_id->查询维度ID，枚举值如下：0-商品拼团价格区间，1-商品券后价价格区间，2-佣金比例区间，3-优惠券金额区间，4-加入多多进宝时间区间，5-销量区间，6-佣金金额区间
     * @var type 
     */
    private $rangeList;

    /**
     * 商品类目ID，使用pdd.goods.cats.get接口获取
     * @var type 
     */
    private $catId;

    /**
     * 商品ID列表。例如：[123456,123]，当入参带有goods_id_list字段，将不会以opt_id、 cat_id、keyword维度筛选商品
     * @var type 
     */
    private $goodsIdList;
    private $apiParas = array();

    public function getApiMethodName()
    {
        return "pdd.ddk.goods.search";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
        $this->apiParas['keyword'] = $keyword;
    }

    public function getKeyword()
    {
        return $this->keyword;
    }

    public function setOptId($optId)
    {
        $this->optId = $optId;
        $this->apiParas['opt_id'] = $optId;
    }

    public function getOptId()
    {
        return $this->optId;
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

    public function setSortType($sortType)
    {
        $this->sortType = $sortType;
        $this->apiParas['sort_type'] = $sortType;
    }

    public function getSortType()
    {
        return $this->sortType;
    }

    public function setWithCoupon($withCoupon)
    {
        $this->withCoupon = $withCoupon;
        $this->apiParas['with_coupon'] = $withCoupon;
    }

    public function getWithCoupon()
    {
        return $this->withCoupon;
    }

    public function setRangeList($rangeList)
    {
        $this->rangeList = $rangeList;
        $this->apiParas['range_list'] = $rangeList;
    }

    public function getRangeList()
    {
        return $this->rangeList;
    }

    public function setCatId($catId)
    {
        $this->catId = $catId;
        $this->apiParas['cat_id'] = $catId;
    }

    public function getCatId()
    {
        return $this->catId;
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
        RequestCheckUtil::checkNotNull($this->sortType, 'sort_type');
        RequestCheckUtil::checkNotNull($this->withCoupon, 'with_coupon');
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

}
