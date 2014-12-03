<?php
class Sky_Form_Decorator_FieldSize extends Zend_Form_Decorator_Abstract
{
    /**
     * @param string $content
     * @return mixed
     */
    public function render($content)
    {
        $element = $this->getElement();

        // Only apply this decorator to the Inputs, Selects or Textareas
        if (false !== ($size = $element->getAttrib('dimension'))) {
            $classes = explode(' ', $element->getAttrib('class'));
            if ((int) $size > 0) {
                $classes[] = 'span' . $size;
            }

            $element->setAttrib('class', trim(implode(' ', $classes)));
            $element->setAttrib('dimension', null);
        }

        return $content;
    }
}
