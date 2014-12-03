<?php

abstract class Sky_Form extends Zend_Form {

    protected $_prefixesInitialized = false;
    protected $_model = null;

    /**
     * Override the base form constructor.
     *
     * @param null $options
     */
    public function __construct($options = null) {
        $this->_initializePrefixes();

        $this->setDecorators(array(
            'FormElements',
            'Form'
        ));

        parent::__construct($options);
    }

    public function setModelErrorMessages($messages) {
        foreach ($messages as $name => $message) {
            if (key_exists($name, $this->_elements)) {
                $element = $this->_elements[$name];
                $element->addErrors($message);
            }
        }
        return $this;
    }

    protected function _initializePrefixes() {
        if (!$this->_prefixesInitialized) {
            if (null !== $this->getView()) {
                $this->getView()->addHelperPath(
                        'Sky/View/Helper', 'Sky_View_Helper'
                );
            }

            $this->addPrefixPath(
                    'Sky_Form_Element', 'Sky/Form/Element', 'element'
            );

            $this->addElementPrefixPath(
                    'Sky_Form_Decorator', 'Sky/Form/Decorator', 'decorator'
            );

            $this->addDisplayGroupPrefixPath(
                    'Sky_Form_Decorator', 'Sky/Form/Decorator'
            );

            $this->setDefaultDisplayGroupClass('Sky_Form_DisplayGroup');

            $this->_prefixesInitialized = true;
        }
    }

    /**
     * Adds a class name
     *
     * @param string $classNames
     */
    protected function _addClassNames($classNames) {
        $classes = $this->_getClassNames();

        foreach ((array) $classNames as $className) {
            $classes[] = $className;
        }

        $this->setAttrib('class', trim(implode(' ', array_unique($classes))));
    }

    /**
     * Removes a class name
     *
     * @param string $classNames
     */
    protected function _removeClassNames($classNames) {
        $this->setAttrib('class', trim(implode(' ', array_diff($this->_getClassNames(), (array) $classNames))));
    }

    /**
     * Extract the class names from a Zend_Form_Element if given or from the
     * base form
     *
     * @param Zend_Form_Element $element
     * @return array
     */
    protected function _getClassNames(Zend_Form_Element $element = null) {
        if (null !== $element) {
            return explode(' ', $element->getAttrib('class'));
        }

        return explode(' ', $this->getAttrib('class'));
    }

    /**
     * Render form
     *
     * @param  Zend_View_Interface $view
     * @return string
     */
    public function render(Zend_View_Interface $view = null) {

        /**
         * Getting elements.
         */
        $elements = $this->getElements();

        foreach ($elements as $eachElement) {

            /**
             * Add required attribute to required elements
             * https://github.com/manticorp
             */
            if ($eachElement->isRequired()) {
                $eachElement->setAttrib('required', '');
            }

            /**
             * Removing label from buttons before render.
             */
            if ($eachElement instanceof Zend_Form_Element_Submit) {
                $eachElement->removeDecorator('Label');
            }

            /**
             * No decorators for hidden elements
             */
            if ($eachElement instanceof Zend_Form_Element_Hidden) {
                $eachElement->clearDecorators()->addDecorator('ViewHelper');
            }

            /**
             * No decorators for hash elements
             */
            if ($eachElement instanceof Zend_Form_Element_Hash) {
                $eachElement->clearDecorators()->addDecorator('ViewHelper');
            }
        }

        /**
         * Rendering.
         */
        return parent::render($view);
    }

}
