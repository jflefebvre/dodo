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
class App_Route {
    
    public static function buildRoute($action='index', $controller=null, $module=null, $params=null)
	{
        $opts = array();

		$opts['action'] = $action;
		$opts['controller'] = $controller;
		$opts['module'] = $module;

		if ($params){
			foreach ($params as $key => $value){
				$opts[$key] = $value;
			}
		}

        $router = Zend_Controller_Front::getInstance()->getRouter();
        $url = $router->assemble($opts, null, true);

        return $url;
    }


}