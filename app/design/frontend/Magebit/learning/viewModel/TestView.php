<?php
/**
 * Created by PhpStorm.
 * User: aigarsuplejs
 * Date: 21.29.4
 * Time: 16:14
 */

use Magento\Framework\View\Element\Block\ArgumentInterface;

class TestView implements ArgumentInterface
{
    private $resource;

    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }

}