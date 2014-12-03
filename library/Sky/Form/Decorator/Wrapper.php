<?php

class Sky_Form_Decorator_Wrapper extends Zend_Form_Decorator_Abstract
{
    /**
     * Renders a form element decorating it with the Twitter's Bootstrap markup
     *
     * @param $content
     *
     * @return string
     */
    public function render($content)
    {
        $hasErrors = $this->getElement()->hasErrors();
        return '<div class="form-group' . (($hasErrors) ? ' error' : '') . '">' . $content . '</div>';
    }
}
