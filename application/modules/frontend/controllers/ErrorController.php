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
class ErrorController extends App_Controller_Action
{

    public function errorAction()
    {
        $errors = $this->_getParam('error_handler');

switch ($errors->type) { 
    case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
    case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:

        // 404 error -- controller or action not found
        $this->getResponse()->setHttpResponseCode(404);
        $this->view->message = 'Page not found';
        break;
    default:
        // application error 
        $this->getResponse()->setHttpResponseCode(500);
        $this->view->message = 'Application error';
        break;
}

$this->view->exception = $errors->exception;
$this->view->request   = $errors->request;
    }


}

