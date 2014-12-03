<?php
class Sky_Form_Decorator_PopoverElementErrors extends Zend_Form_Decorator_Abstract
{

    /**
     * Decorate content and/or elementRender the element
     * 
     * @param string $content            
     * @return string
     */
    public function render ($content)
    {
        if (! $this->getElement()->hasErrors()) {
            return $content;
        }
        
        $errors = implode('<br/>', $this->getElement()->getMessages());
        
        return '<span class="hasPopover" data-title="Error" data-content="' . $errors . '">' . $content . '</span>';
    }
}