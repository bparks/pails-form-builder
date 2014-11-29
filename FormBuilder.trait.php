<?php
trait FormBuilder
{
	protected function input_for($data_name, $label, $options = array())
	{
		if (!isset($options['type'])) $options['type'] = 'text';
		if (!isset($options['value'])) $options['value'] = $options['type'] == 'number' ? 0 : '';
		if (!isset($options['options']) && in_array($options['type'], array('list', 'radio', 'check')))
			$options['options'] = array();
		if (!isset($options['tooltip'])) $options['tooltip'] = $label;
		if (!isset($options['style'])) $options['style'] = '';

		$options['data_name'] = $data_name;
		$options['label'] = $label;

		$this->render_partial("_input_for", $options);
	}
}