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
class Backend_IndexController extends App_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $model = new Model_DbTable_User();
        $this->view->userCount = $model->getUserCount();

        $model = new Model_DbTable_TaskList();
        $this->view->listCount = $model->getTotalListCount();

        $model = new Model_DbTable_Task();
        $this->view->completeTaskCount = $model->getTotalTaskCount(1);
        $this->view->incompleteTaskCount = $model->getTotalTaskCount(0);




    }

}

