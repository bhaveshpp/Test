<?php
namespace Bhaveshpp\Test\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\CustomOptions;
use Magento\Ui\Component\Form\Element\Input;
use Magento\Ui\Component\Form\Element\Checkbox;
use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Field;

class Base extends AbstractModifier
{
   /**
    * @var array
    */
   protected $meta = [];

   /**
    * {@inheritdoc}
    */
   public function modifyData(array $data)
   {
       return $data;
   }

   /**
    * {@inheritdoc}
    */
   public function modifyMeta(array $meta)
   {
       $this->meta = $meta;

       $this->addFields();

       return $this->meta;
   }

   /**
    * Adds fields to the meta-data
    */
   protected function addFields()
   {
       $groupCustomOptionsName    = CustomOptions::GROUP_CUSTOM_OPTIONS_NAME;
       $optionContainerName       = CustomOptions::CONTAINER_OPTION;
       $commonOptionContainerName = CustomOptions::CONTAINER_COMMON_NAME;

     

       // Add fields to the values
       
       $this->meta[$groupCustomOptionsName]['children']['options']['children']['record']['children']
       [$optionContainerName]['children']['values']['children']['record']['children']['option_qty'] = $this->getQtyFieldConfig();

       $this->meta[$groupCustomOptionsName]['children']['options']['children']['record']['children']
       [$optionContainerName]['children']['values']['children']['record']['children']['option_price'] = $this->getPriceFieldConfig();
   }



   /**
    * Get description field config
    *
    * @return array
    */
   protected function getQtyFieldConfig()
   {
       return [
           'arguments' => [
               'data' => [
                   'config' => [
                       'label' => __('Qty'),
                       'componentType' => Field::NAME,
                       'formElement'   => Input::NAME,
                       'dataType'      => Text::NAME,
                       'dataScope'     => 'option_qty',
                       'sortOrder'     => 22
                   ],
               ],
           ],
       ];
   }

   /**
    * Get description field config
    *
    * @return array
    */
    protected function getPriceFieldConfig()
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Price'),
                        'componentType' => Field::NAME,
                        'formElement'   => Input::NAME,
                        'dataType'      => Text::NAME,
                        'dataScope'     => 'option_price',
                        'sortOrder'     => 23
                    ],
                ],
            ],
        ];
    }
}
