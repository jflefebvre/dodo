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
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function __construct($application)
    {
        parent::__construct($application);        
    }

    public function run()
    {
        // make the config available to everyone
        Zend_Registry::set('config', new Zend_Config($this->getOptions()));

        parent::run();
    }

    protected function _initAutoload()
    {
        $loader = new Zend_Application_Module_Autoloader(array(
            'namespace' => '',
            'basePath'  => APPLICATION_PATH));
        
        return $loader;
    }

    protected function _initSession()
    {
        // should probably only do this for modules other than API? -- GAW
        $session = new Zend_Session_Namespace('dodo', true);
        
        return $session;        
    }

    public function _initTranslate()
    {
        // this will make App_Translate use the right language
        $translate = new Zend_Translate('array', APPLICATION_PATH . '/languages/en.php', 'en');
        Zend_Registry::set('Zend_Translate', $translate);
        return $translate;
    }

    protected function _initView()
    {
        $view = new Zend_View();
        $view->doctype('XHTML1_STRICT');

        $view->addHelperPath(APPLICATION_PATH . '/views/helpers');

        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setView($view);

        // grab the session and see if we have a logged in user
        // if so let the view know so we can update the customer center (ie. top of page)
        // do it here in bootstrap so it is always available to both back and frontend
        $session = $this->getResource('session');
        $storage = new App_Auth_Storage_Session($session);
        if (!$storage->isEmpty()){
            $view->username = $storage->getUserName();
        }

        return $view;
    }

}

