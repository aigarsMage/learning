<?php
/**
 * Created by PhpStorm.
 * User: aigarsuplejs
 * Date: 21.29.4
 * Time: 16:14
 */

namespace Magebit\AttributesViewModel\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class AttributesViewModel implements ArgumentInterface
{
    public $finalAttributes = [];
    public $attributes = ['dimensions', 'material', 'color'];
    public $allAttributes;

    /**
     * @param $allAttributes
     * @return array|void
     */
    public function getAttributes($allAttributes)
    {
        $this->allAttributes = $allAttributes;

        if(!empty($allAttributes)) {
            foreach($this->attributes as $attribute)  {
                if (array_key_exists($attribute,$this->allAttributes))
                {
                    $this->finalAttributes[$attribute] = $this->allAttributes[$attribute];
                    unset($this->allAttributes[$attribute]);
                    $this->attributes = array_diff($this->attributes, array($attribute));
                }
            };

            if (count($this->allAttributes) >= count($this->attributes) && count($this->allAttributes) > 0) {

                for ($i = 0; $i < count($this->attributes); $i++) {

                    $tempAttribute = current($this->allAttributes);
                    $this->finalAttributes[$tempAttribute['label']] = $tempAttribute;
                    unset($this->allAttributes[$tempAttribute['label']]);
                }
            }
            return $this->finalAttributes;
        }
        return;
    }
}