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
class Plugin_Module extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $module = $request->getModuleName();
		$controller = $request->getControllerName();

        //$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
		//$viewRenderer->initView();
		//$view = $viewRenderer->view;

        $front_controller = Zend_Controller_Front::getInstance();
        $error_handler = $front_controller->getPlugin('Zend_Controller_Plugin_ErrorHandler');
		$error_handler->setErrorHandlerModule($module);

		// check the module and automatically set the layout
		$layout = Zend_Layout::getMvcInstance();

		switch ($module) {
			case 'api':
                $layout->setLayout('api');
                break;

            case 'backend':
                $layout->setLayout('backend');
			    break;

            default:
                $layout->setLayout('frontend');
				break;
		}
    }
		
}