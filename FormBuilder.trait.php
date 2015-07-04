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

	protected function model_options($models, $key_name, $value_name)
	{
		$ret = array('' => 'Choose an option');
		foreach ($models as $item) {
			$key = $value = '';

			if (strstr($key_name, '{') === false)
				$key = $item->$key_name;
			else
				$key = preg_replace_callback('/{(.*?)}/', function ($matches) use ($item) {
					return $item->{$matches[1]};
				}, $key_name);

			if (strstr($value_name, '{') === false)
				$value = $item->$value_name;
			else
				$value = preg_replace_callback('/{(.*?)}/', function ($matches) use ($item) {
					return $item->{$matches[1]};
				}, $value_name);

			$ret[$key] = $value;
		}
		return $ret;
	}
}