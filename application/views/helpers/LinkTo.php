<?php
/**
 * Dodo - To-do list application
 *
 * License
 *
 * Simply put:
 * You can use or modify this software for any personal or commercial
 * applications with the following exception:
 *   - You cannot host this software using the Dodo name or any
 *      images from the Dodo website including any logos.
 *
 * @author    Greg Wessels (greg@threadaffinity.com)
 *
 * www.threadaffinity.com
 */
class Zend_View_Helper_LinkTo
{
	public function linkTo($action='index', $controller=null, $module=null, $params=null)
    {
        return App_Route::buildRoute($action, $controller, $module, $params);
	}

    
    
}
