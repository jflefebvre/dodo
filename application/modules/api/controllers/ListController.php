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
class Api_ListController extends Zend_Controller_Action
{
    public function init()
    {
    }

    public function indexAction()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();

        // user param comes in on request (put there by Access Plugin)
        $user_id = $request->getParam('user_id', null);

        // get the tasklists for the user
        $model_list = new Model_DbTable_TaskList();

        $this->view->tasklists = $model_list->getLists($user_id);

        $response->setHeader('Content-Type', 'text/xml', true);
    }
}
