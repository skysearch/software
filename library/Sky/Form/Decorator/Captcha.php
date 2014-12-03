<?php
class Sky_Form_Decorator_Captcha extends Zend_Form_Decorator_Captcha
{
    /**
     * Render captcha
     *
     * @param  string $content
     * @return string
     */
    public function render($content)
    {
        $element = $this->getElement();
        if (!method_exists($element, 'getCaptcha')) {
            return $content;
        }

        $view = $element->getView();
        if (null === $view) {
            return $content;
        }

        $placement = $this->getPlacement();
        $separator = $this->getSeparator();

        $captcha = $element->getCaptcha();
        $markup  = '<label>' . $captcha->render($view) . '</label>';
        switch ($placement) {
            case 'PREPEND':
                $content = $markup . $separator .  $content;
                break;
            case 'APPEND':
            default:
                $content = $content . $separator . $markup;
                break;
        }
        return $content;
    }

}
