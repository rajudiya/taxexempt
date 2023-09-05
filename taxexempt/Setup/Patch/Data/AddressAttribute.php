<?php 
declare(strict_types=1);

/**
 * Patch to create Customer Address Attribute
 *
 * Creates landmark custom address attribute
 *
 * @author Rohan Ajudiya
 * @package Techvoot_Customer
 */

namespace Igauri\TaxExempt\Setup\Patch\Data;

use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class AddressAttribute
 */
class AddressAttribute implements DataPatchInterface
{
    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * AddressAttribute constructor.
     *
     * @param Config              $eavConfig
     * @param EavSetupFactory     $eavSetupFactory
     */
    public function __construct(
        Config $eavConfig,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->eavConfig = $eavConfig;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        
        $eavSetup = $this->eavSetupFactory->create();

        /** Delete customer attribute */
        $eavSetup->removeAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'landmark'
        );
        
        $eavSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY, 'is_tax_exempt',
        [
            'type'             => 'int',
            'input'            => 'select',
            'label'            => 'Is Tax Exempt',
            'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
            'visible'          => true,
            'required'         => false,
            'user_defined'     => true,
            'system'           => false,
            'group'            => 'General',
            'global'           => true,
            'visible_on_front' => true,
            'position' => 1,
            'is_used_in_grid'       => true,
            'is_visible_in_grid'    => true
        ]);

        $customAttribute = $this->eavConfig->getAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'is_tax_exempt');

        $customAttribute->setData(
            'used_in_forms',
            [
                'adminhtml_customer', 
                'customer_account_create', 
                'customer_account_edit'
            ]
        );
        $customAttribute->save();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases(): array
    {
        return [];
    }
}