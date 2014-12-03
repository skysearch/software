<?php

class Sky_Form_DisplayGroup extends Zend_Form_DisplayGroup
{
    /**
     * Override the default decorators
     *
     * @return Twitter_Bootstrap_Form_DisplayGroup
     */
    public function loadDefaultDecorators()
    {
        if ($this->loadDefaultDecoratorsIsDisabled()) {
            return $this;
        }

        $decorators = $this->getDecorators();
        if (empty($decorators)) {
            $this->addDecorator('FormElements')
                 ->addDecorator('Fieldset');
        }
        return $this;
    }

}
