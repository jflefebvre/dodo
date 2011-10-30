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
class App_Controller_Action extends Zend_Controller_Action {
    
    protected function getUserId()
    {
        // get the user-id from the session
        $bootstrap = $this->getInvokeArg('bootstrap');
        $session = $bootstrap->getResource('session');
        $storage = new App_Auth_Storage_Session($session);
        return $storage->getUserId();
    }

    protected function sendJsonResponse($results)
    {
        $response = $this->getResponse();

        // send back a JSON response
        $response->clearAllHeaders();
        $response->clearBody();
        $response->setHeader('Content-Type', 'application/json');
        $response->setBody(Zend_Json::encode($results));
    }

    protected function getSession()
    {
        $bootstrap = $this->getInvokeArg('bootstrap');
        return $bootstrap->getResource('session');
    }

}
