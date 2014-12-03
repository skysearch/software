<?php

class Sky_Form_Element_Submit extends Zend_Form_Element_Submit
{
    const BUTTON_SECUNDARY = 'secondary';
    const BUTTON_INFO = 'info';
    const BUTTON_SUCCESS = 'success';
    const BUTTON_WARNING = 'warning';
    const BUTTON_ALERT = 'alert';

    protected $buttons = array(
        self::BUTTON_SECUNDARY,
        self::BUTTON_INFO,
        self::BUTTON_SUCCESS,
        self::BUTTON_WARNING,
        self::BUTTON_ALERT
    );

    /**
     * Class constructor
     *
     * @param $spec
     * @param array $options
     */
    public function __construct($spec, $options = null)
    {

        if (!isset($options['class'])) {
            $options['class'] = '';
        }

        $classes = explode(' ', $options['class']);

        if (isset($options['buttonType']) && in_array( $options['buttonType'], $this->buttons )) {
            $classes[] = $options['buttonType'];
            unset($options['buttonType']);
        }

        if (isset($options['disabled'])) {
            $classes[] = 'disabled';
        }

        $classes = array_unique($classes);

        $options['class'] = trim( implode(' ', $classes) );

        parent::__construct($spec, $options);
    }
}
