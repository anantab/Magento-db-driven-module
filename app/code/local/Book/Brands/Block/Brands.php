<?php

class Book_Brands_Block_Brands extends Mage_Core_Block_Template
 {
    public function _prepareLayout() {
        parent::_prepareLayout();
    }
    
     public function getBrands()
      {
        // echo 'Brands will go here';
          $brands_id = (int)$this->getRequest()->getParam('id');
            if($brands_id != null && $brands_id != '') {
            $brands[] = Mage::getModel('brands/brands')->load($brands_id)->getData();
           } 
           else {
                 $brands = null;
            }
      
if($brands == null) {
        $resource = Mage::getSingleton('core/resource');
        $read= $resource->getConnection('core_read');
        $brandsTable = $resource->getTableName('brands');
        $select = $read->select()->
                from($brandsTable,array('*'))
        ->where('status', 1)
        ->order('created_time DESC') ;
        $brands = $read->fetchAll($select);
}
    //Mage::register('brands', $brands);
    return $brands;
      
      }
      public function getsecondBrand()
       {
          echo "second brand";
          //  echo $this->model->getbrands();
          
          
       }
      
    
 }