<?php
/**
 * From Rob Allen's Zend tutorial http://akrabat.com/zend-framework-tutorial/
 */
class Zend_View_Helper_BaseUrl
{
    public function baseUrl()
    {
        $fc = Zend_Controller_Front::getInstance();
        return $fc->getBaseUrl();
   	}
}
