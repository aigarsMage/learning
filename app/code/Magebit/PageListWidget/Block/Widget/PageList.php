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

class PageList extends Template implements BlockInterface
{
    /**
     * source - https://www.rakeshjesadiya.com/get-cms-page-collection-magento-2/
     * PageList constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Cms\Api\PageRepositoryInterface $pageRepositoryInterface
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Cms\Api\PageRepositoryInterface $pageRepositoryInterface,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = []
    ) {
        $this->pageRepositoryInterface = $pageRepositoryInterface;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }

    /**
     * @return \Magento\Cms\Api\Data\PageInterface[]
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getPages() {

        if($this->getData('display_mode') === 'specific_pages') {
            $selectedPages = $this->getData('selected_pages');
            //https://webkul.com/blog/how-to-use-search-criteria-in-custom-module/
            $searchCriteria = $this->searchCriteriaBuilder->addFilter('identifier', $selectedPages, 'in')->create();

        } else {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        }

        $pages = $this->pageRepositoryInterface->getList($searchCriteria)->getItems();
        return $pages;
    }


    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('page-list.phtml');
    }


}