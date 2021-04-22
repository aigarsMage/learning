<?php
/**
 * Created by PhpStorm.
 * User: aigarsuplejs
 * Date: 21.22.4
 * Time: 09:16
 */

namespace Magebit\PageListWidget\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class PageList extends Template implements BlockInterface
{
    protected $_template = "page-list.phtml";
}