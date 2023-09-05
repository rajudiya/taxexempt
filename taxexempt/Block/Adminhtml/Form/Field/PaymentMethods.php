<?php
declare(strict_types=1);

namespace Igauri\TaxExempt\Block\Adminhtml\Form\Field;

use Magento\Framework\View\Element\Html\Select;
//use Magento\Framework\View\Element\Template;

class PaymentMethods extends Select
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Payment\Model\Config\Source\Allmethods $allPaymentMethod,
        \Magento\Framework\View\Element\Template $template,
        array $data = []
    ) {
        $this->allPaymentMethod = $allPaymentMethod;
        parent::__construct($context, $data);
    }

    /**
     * Set "name" for <select> element
     *
     * @param string $value
     * @return $this
     */
    public function setInputName($value)
    {
        return $this->setName($value);
    }

    /**
     * Set "id" for <select> element
     *
     * @param $value
     * @return $this
     */
    public function setInputId($value)
    {
        return $this->setId($value);
    }

    /**
     * Render block HTML
     *
     * @return string
     */
    public function _toHtml(): string
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->getPaymentMethod());
        }
        return parent::_toHtml();
    }

    private function getPaymentMethod(): array
    {
    
        return $this->allPaymentMethod->toOptionArray();
    }
}
