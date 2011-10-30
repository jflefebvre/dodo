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
class Form_AddTask extends App_Form
{
    public function __construct($options = null)
    {
        parent::__construct($options);

        // change the class on the outer <dl> tag
        $this->getDecorator('HtmlTag')->setOption('class', 'form medium');

        $this->setName('add_task');

        $description = new App_Form_Element_Text('description');

        $description->setRequired(true)
            ->setAttrib('size', '60')
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
            ->removeDecorator('Label');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton')
            ->setLabel('addtask_label_submit')
            ->removeDecorator('Label')
            ->removeDecorator('DtDdWrapper') // I don't like this decorator (don't want a blank <dt>)
            ->addDecorator('HtmlTag', array('tag' => 'dd', 'id'=>$submit->getName() . '-element'));

        // create array of elements to add to the form
        $elements = array($description, $submit);

        $this->addElements($elements);
    }

}
