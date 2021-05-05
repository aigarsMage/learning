<?php
/**
 * Created by PhpStorm.
 * User: aigarsuplejs
 * Date: 21.30.4
 * Time: 10:18
 */

namespace Magebit\QuantityViewModel\ViewModel;

use Magento\CatalogInventory\Model\Stock\StockItemRepository;
use Magento\Framework\View\Element\Block\ArgumentInterface;
//use Magento\Framework\App\ObjectManager;
//use \Magento\InventoryApi\Api\GetSourceItemsBySkuInterface;

class QuantityViewModel implements ArgumentInterface
{
    /**
     * @var StockItemRepository
     */
    private $StockItemRepo;

    /**
     * @return mixed
     * https://magento.stackexchange.com/questions/302337/magento-2-data-product-getqty-returns-0
     * https://community.magento.com/t5/Magento-2-x-PWA-Theming-Layout/Display-Maximum-Qty-Allowed-in-Shopping-Cart/td-p/73027
     * \Magento\InventoryApi\Api\GetSourceItemsBySkuInterface, neizmantot object manager, izmantot caur constructor
     */

    public function __construct(StockItemRepository $StockItemRepo) {
        $this->StockItemRepo = $StockItemRepo;
    }

    public function getQty($product)
    {
        $productStockData = $this->StockItemRepo->get($product->getId());
        return $productStockData->getQty();
    }

}