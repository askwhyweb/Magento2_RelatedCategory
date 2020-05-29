<?php
/**
 * Copyright © 2020 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace OrviSoft\RelatedCategory\Block;

class Customers extends \Magento\Framework\View\Element\Template
{
    protected $_coreRegistry;
    protected $_imageBuilder;
    protected $_reviewSummaryFactory;
    protected $_categoryFactory;
    protected $productCollectionFactory;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Block\Product\Context $productContext,
        \Magento\Review\Model\Review\SummaryFactory $reviewSummaryFactory,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Framework\View\Element\Template\Context $context, array $data = []
    ) {
        $this->_coreRegistry = $productContext->getRegistry();
        $this->_reviewSummaryFactory = $reviewSummaryFactory;
        $this->_imageBuilder = $productContext->getImageBuilder();
        $this->_categoryFactory = $categoryFactory;
        $this->productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getProduct()
    {
        return $this->_coreRegistry->registry('product');
    }

    public function getImage($product, $imageId, $attributes = [])
    {
        return $this->_imageBuilder->setProduct($product)
            ->setImageId($imageId)
            ->setAttributes($attributes)
            ->create();
    }

    public function getReviewSummary()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        $reviewSummary = $this->_reviewSummaryFactory->create();
        $reviewSummary->setData('store_id', $storeId);
        $summaryModel = $reviewSummary->load($this->getProduct()->getId());

        return $summaryModel;
    }

    public function getCurrencyCode() {
        return $this->_storeManager->getStore()->getCurrentCurrencyCode();
    }

    public function getCategory($categoryId){
        return $category = $this->_categoryFactory->create()->load($categoryId);
    }


    public function getAlsoViewed($catalog_ids, $price)
    {
        if($price > 40 && $price < 250){
            $greaterThan=40;
            $lessThan=250;
        }elseif($price > 250 && $price < 400){
            $greaterThan=250;
            $lessThan=400;
        }elseif($price > 400 && $price < 600){
            $greaterThan=400;
            $lessThan=600;
        }elseif($price > 600 && $price < 800){
            $greaterThan=600;
            $lessThan=800;
        }elseif($price > 800 && $price < 1000){
            $greaterThan=801;
            $lessThan=1000;
        }elseif($price > 1000 && $price < 1400){
            $greaterThan=1001;
            $lessThan=1400;
        }elseif($price > 1400 && $price < 1800){
            $greaterThan=1401;
            $lessThan=1800;
        }elseif($price > 1800 && $price < 2100){
            $greaterThan=1801;
            $lessThan=2100;
        }elseif($price > 2100){
            $greaterThan=2100;
            $lessThan=3500;
        }
        $sortedCategoryProducts = array();
        $productCollection = $this->productCollectionFactory->create()->addAttributeToSelect('*');
        $productCollection->addAttributeToFilter('special_price', ['from' => $greaterThan, 'to' => $lessThan]);
        foreach($catalog_ids as $catalog_id){
            $productCollection->addCategoriesFilter(['eq' => $catalog_id]);
        }
        $productCollection->joinField('stock_item', 'cataloginventory_stock_item', 'qty', 'product_id=entity_id', 'qty>0');
        $productCollection->setPageSize(10)->load();
        return $productCollection;
    }
}

