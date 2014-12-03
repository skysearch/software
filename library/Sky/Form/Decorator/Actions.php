<?php

class Sky_Form_Decorator_Actions extends Zend_Form_Decorator_Abstract
{
    /**
     * Render all the buttons
     *
     * @return string
     */
    public function buildButtons()
    {
        $output = '';
        foreach ($this->getElement() as $element) {
            if($element !== null && $element instanceof Zend_Form_Element) {
                $element->setDecorators(array(array('ViewHelper')));
                $output .= $element->render();
            }
        }

        return $output;
    }

    /**
     * Renders the content
     *
     * @param string $content
     * @return string
     */
    public function render($content)
    {
        return '<div class="form-actions">' . $this->buildButtons() . '</div>';
    }
}