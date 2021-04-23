<?php
/**
 * Created by PhpStorm.
 * User: aigarsuplejs
 * Date: 21.22.4
 * Time: 09:16
 */
//testing ssh

namespace Magebit\PageListWidget\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Magento\Store\Model\StoreManagerInterface;

class PageList extends Template implements BlockInterface
{
    protected $_template = 'Magebit_PageListWidget::page-list.phtml';
    public const TITLE = 'title';
    public const DISPLAY_MODE = 'display_mode';
    public const SELECTED_PAGES = 'selected_pages';
    public const SPECIFIC_PAGES = 'specific_pages';
    public const FILTER_ON = 'identifier';

    private $pageRepositoryInterface;
    private $searchCriteriaBuilder;
    protected $storeManager;


    /**
     * PageList constructor.
     * source - https://www.rakeshjesadiya.com/get-cms-page-collection-magento-2/
     * @param Template\Context $context
     * @param \Magento\Cms\Api\PageRepositoryInterface $pageRepositoryInterface
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param StoreManagerInterface $storeManager
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Cms\Api\PageRepositoryInterface $pageRepositoryInterface,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->pageRepositoryInterface = $pageRepositoryInterface;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->storeManager = $storeManager;
    }


    /**
     * @return \Magento\Cms\Api\Data\PageInterface[]
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getPages() {

        $searchCriteria = $this->searchCriteriaBuilder;

        if ($this->getData(self::DISPLAY_MODE) === self::SPECIFIC_PAGES && strlen($this->getData(self::SELECTED_PAGES))) {
            $searchCriteria->addFilter(self::FILTER_ON, $this->getData(self::SELECTED_PAGES), 'in');
        }

        $searchCriteria->addFilter('store_id', [0, $this->_storeManager->getStore()->getId()] , 'in');

        try {
            $pages = $this->pageRepositoryInterface->getList($searchCriteria->create())->getItems();
            return $pages;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }


    }

}