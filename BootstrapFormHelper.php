<?php

App::uses('FormHelper', 'View/Helper');

Class BootstrapFormHelper extends FormHelper {
    
    public function create($model = null, $options = array()) {
		$defaultOptions = array(
			'inputDefaults' => array(
				'error' => array(
					'attributes' => array('class' => 'well-sm alert-warning')
				)
			),
			'role' => 'form'
		);

		if (!empty($options['inputDefaults'])) {
			$options['inputDefaults'] = array_merge($defaultOptions['inputDefaults'], $options['inputDefaults']);
		} else {
			$options = array_merge($defaultOptions, $options);
		}
		return parent::create($model, $options);
	}

    /**
     * @todo Implement classes for radio, select and other input types
     * 
     * 
     * @param type $fieldName
     * @param type $options
     * @return type
     */
	public function input($fieldName, $options = array()) {
        $this->setEntity($fieldName);
        $tmpOptions = $this->_parseOptions($options);
		if ($tmpOptions['type'] == 'checkbox' || 
                (!empty($tmpOptions['multiple']) && $tmpOptions['multiple'] == 'checkbox')) {
			$options['class'] = 'checkbox clearfix';
            $options['div'] = array('class' => 'checkbox');
		} else {
            $options['class'] = 'form-control';
            $options['div'] = array('class' => 'form-group clearfix');
            $options['label'] = array('class' => 'control-label');
        }
        
		return parent::input($fieldName, $options);
	}
	
	public function submit($caption = null, $options = array()) {
		$defaultOptions = array(
			'class' => 'btn btn-primary',
	    	'div' =>  'form-group',
	    	'before' => '<div class="well-sm">',
	    	'after' => '</div>',
		);
		$options = array_merge($defaultOptions, $options);
		return parent::submit($caption, $options);
	}

}