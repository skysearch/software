<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_View
 * @subpackage Helper
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: FormText.php 23775 2011-03-01 17:25:24Z ralph $
 */


/**
 * Abstract class for extension
 */
require_once 'Zend/View/Helper/FormElement.php';


/**
 * Helper to generate a "text" element
 *
 * @category   Zend
 * @package    Zend_View
 * @subpackage Helper
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Sky_View_Helper_FormMultiText extends Zend_View_Helper_FormElement
{
    /**
     * Input type to use
     * @var string
     */
    protected $_inputType = 'text';
    
    /**
    * Whether or not this element represents an array collection by default
    * @var bool
    */
    protected $_isArray = true;
        
    /**
     * Generates a 'text' element.
     *
     * @access public
     *
     * @param string|array $name If a string, the element name.  If an
     * array, all other parameters are ignored, and the array elements
     * are used in place of added parameters.
     *
     * @param mixed $value The element value.
     *
     * @param array $attribs Attributes for the element tag.
     *
     * @return string The element XHTML.
     */
    public function formMultiText($name, $value = null, $attribs = null)
    {

        $info = $this->_getInfo($name, $value, $attribs);
        extract($info); // name, value, attribs, options, listsep, disable

        // build the element
        $disabled = '';
        if ($disable) {
            // disabled
            $disabled = ' disabled="disabled"';
        }


        // XHTML or HTML end tag?
        $endTag = ' />';
        if (($this->view instanceof Zend_View_Abstract) && !$this->view->doctype()->isXhtml()) {
            $endTag= '>';
        }
        
        // should the name affect an array collection?
        $name = $this->view->escape($name);
        if ($this->_isArray && ('[]' != substr($name, -2))) {
            $name .= '[]';
        }
        
        $value = (array) $value;
        
        $input = array();
        foreach ($value as $v){
            $element = '<input type="text"'
                    . ' name="' . $name . '"'
                    . ' id="' . $this->view->escape($id) . '"'
                    . ' value="' . $this->view->escape($v) . '"'
                    . $disabled
                    . $this->_htmlAttribs($attribs)
                    . $endTag;
            
            if(count($input)>1) {
                $element =  '<div class="wrapper">'
                            . $element
                            . '<a href="javascript:void(0)" class="remove">Remover</a>'
                            . '</div>';
            }
            
            $input[] = $element;
        }
        
        $script = "
            $(function(){
                var slink = $('#add-{$this->view->escape($id)}');
                var smodel = slink.prev('#{$this->view->escape($id)}');
                
                slink.click(function(){
                        var sclone = smodel.clone(false);
                        $(this).before(sclone);
                        sclone.val('');
                        sclone.wrap('<div class=\"wrapper\"></div>')
                                        .after('<a href=\"javascript:void(0)\" class=\"remove\">Remover</a>')
                                        .addClass('added')
                                        .parent()
                                        .hide()
                                        .fadeIn();
                
                    $('input:text').setMask();

                });

                $('a.remove').live('click', function(){
                        $(this).parent().fadeOut('normal', function(){
                                $(this).remove();
                        });
                });    
            });
        "; 
                
        $this->view->inlineScript()->appendScript($script);
        
        
        $xhtml = '<a href="javascript:void(0)" class="add-mult-text '.$this->view->escape($id).'" id="add-'.$this->view->escape($id).'"><span>+ Adicionar</span></a>';
        
        
        return implode($input) . $xhtml;
    }
    
    
    
    
    
    
    
    
    
    
    
    /**
     * Generates a set of radio button elements.
     *
     * @access public
     *
     * @param string|array $name If a string, the element name.  If an
     * array, all other parameters are ignored, and the array elements
     * are extracted in place of added parameters.
     *
     * @param mixed $value The radio value to mark as 'checked'.
     *
     * @param array $options An array of key-value pairs where the array
     * key is the radio value, and the array value is the radio text.
     *
     * @param array|string $attribs Attributes added to each radio.
     *
     * @return string The radio buttons XHTML.
     */
    /*public function formMultiText($name, $value = null, $attribs = null,
        $options = null, $listsep = "\n")
    {
        
        $info = $this->_getInfo($name, $value, $attribs, $options, $listsep);
        extract($info); // name, value, attribs, options, listsep, disable

        // retrieve attributes for labels (prefixed with 'label_' or 'label')
        $label_attribs = array();
        foreach ($attribs as $key => $val) {
            $tmp    = false;
            $keyLen = strlen($key);
            if ((6 < $keyLen) && (substr($key, 0, 6) == 'label_')) {
                $tmp = substr($key, 6);
            } elseif ((5 < $keyLen) && (substr($key, 0, 5) == 'label')) {
                $tmp = substr($key, 5);
            }

            if ($tmp) {
                // make sure first char is lowercase
                $tmp[0] = strtolower($tmp[0]);
                $label_attribs[$tmp] = $val;
                unset($attribs[$key]);
            }
        }

        $labelPlacement = 'append';
        foreach ($label_attribs as $key => $val) {
            switch (strtolower($key)) {
                case 'placement':
                    unset($label_attribs[$key]);
                    $val = strtolower($val);
                    if (in_array($val, array('prepend', 'append'))) {
                        $labelPlacement = $val;
                    }
                    break;
            }
        }

 
        // the radio button values and labels
        $options = (array) $options;
        

        // build the element
        $xhtml = '';
        $list  = array();

        // should the name affect an array collection?
        $name = $this->view->escape($name);
        if ($this->_isArray && ('[]' != substr($name, -2))) {
            $name .= '[]';
        }

        
        // ensure value is an array to allow matching multiple times
        $value = (array) $value;

        
        // XHTML or HTML end tag?
        $endTag = ' />';
        if (($this->view instanceof Zend_View_Abstract) && !$this->view->doctype()->isXhtml()) {
            $endTag= '>';
        }

        // Set up the filter - Alnum + hyphen + underscore
        require_once 'Zend/Filter/PregReplace.php';
        $pattern = @preg_match('/\pL/u', 'a') 
            ? '/[^\p{L}\p{N}\-\_]/u'    // Unicode
            : '/[^a-zA-Z0-9\-\_]/';     // No Unicode
        $filter = new Zend_Filter_PregReplace($pattern, "");
        
        // add radio buttons to the list.
        foreach ($options as $opt_value => $opt_label) {
            
            // Should the label be escaped?
            if ($escape) {
                $opt_label = $this->view->escape($opt_label);
            }

            // is it disabled?
            $disabled = '';
            if (true === $disable) {
                $disabled = ' disabled="disabled"';
            } elseif (is_array($disable) && in_array($opt_value, $disable)) {
                $disabled = ' disabled="disabled"';
            }


            // generate ID
            $optId = $id . '-' . $filter->filter($opt_value);

            // Wrap the radios in labels
            $radio = '<input type="' . $this->_inputType . '"'
                    . ' name="' . $name . '"'
                    . ' id="' . $optId . '"'
                    . ' value="' . $this->view->escape($opt_value) . '"'
                    . $disabled
                    . $this->_htmlAttribs($attribs)
                    . $endTag
                    ;

            // add to the array of radio buttons
            $list[] = $radio;
        }

        // done!
        $xhtml .= implode($listsep, $list);

        $script = "
            $(function(){
                var slink = $('#add-{$this->view->escape($id)}');
                var smodel = slink.prev('#{$this->view->escape($id)}');
                
                slink.click(function(){
                        var sclone = smodel.clone(false);
                        $(this).before(sclone);
                        sclone.val('');
                        sclone.wrap('<div class=\"wrapper\"></div>')
                                        .after('<a href=\"javascript:void(0)\" class=\"remove\">Remover</a>')
                                        .addClass('added')
                                        .parent()
                                        .hide()
                                        .fadeIn();
                
                    $('input:text').setMask();

                });

                $('a.remove').live('click', function(){
                        $(this).parent().fadeOut('normal', function(){
                                $(this).remove();
                        });
                });    
            });
        "; 
                
                
        $this->view->inlineScript()->appendScript($script);
        
        
        $xhtml .= '<a href="javascript:void(0)" class="add-mult-text '.$this->view->escape($id).'" id="add-'.$this->view->escape($id).'"><span>+ Adicionar</span></a>';
        
        
        return $xhtml;
    }*/
}
