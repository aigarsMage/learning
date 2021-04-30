<?php
/**
 * Created by PhpStorm.
 * User: aigarsuplejs
 * Date: 21.30.4
 * Time: 10:18
 */

namespace Magebit\QuantityViewModel\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\App\ObjectManager;

class QuantityViewModel implements ArgumentInterface
{

    /**
     * @return mixed
     * https://magento.stackexchange.com/questions/302337/magento-2-data-product-getqty-returns-0
     */
    public function getQty($product)
    {
        $objectManager =  ObjectManager::getInstance();
        $stockItemRepository = $objectManager->get('\Magento\CatalogInventory\Model\Stock\StockItemRepository');
        $productStockData = $stockItemRepository->get($product->getId());

        return $productStockData->getQty();
    }

}