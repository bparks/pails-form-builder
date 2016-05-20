<div class="row input-row input-row-<?php echo $model['type']; ?>">
	<div class="col-md-4 name name-<?php echo $model['type']; ?>">
		<?php if ($model['type'] != 'hidden' && $model['label'] != ''): ?>
		<label for="<?php echo $model['data_name']; ?>" title="<?php echo $model['tooltip']; ?>"><?php echo $model['label']; ?>:</label>
		<?php endif; ?>
	</div>
	<div class="col-md-8 field field-<?php echo $model['type']; ?>">
		<?php switch ($model['type']):
			case 'list':
		?>
		<select name="<?php echo $model['data_name']; ?>" title="<?php echo $model['tooltip']; ?>">
		<?php foreach ($model['options'] as $value => $option): ?>
			<option value="<?php echo $value; ?>"<?php echo $value == $model['value'] ? ' selected' : ''; ?>><?php echo $option; ?></option>
		<?php endforeach; ?>
		</select>
		<?php
				break;
			case 'textarea':
		?>
		<textarea name="<?php echo $model['data_name']; ?>" title="<?php echo $model['tooltip']; ?>" style="<?php echo $model['style']; ?>" class="<?php echo $model['class']; ?>"><?php echo $model['value']; ?></textarea>
		<?php
				break;
			case 'radio':
		?>
		<?php foreach ($model['options'] as $value => $option): ?>
			<span class="radio"><input type="radio" name="<?php echo $model['data_name']; ?>" value="<?php echo $value; ?>" title="<?php echo $model['tooltip']; ?>"<?php echo $value == $model['value'] ? ' checked' : ''; ?> /><?php echo $option; ?></span>
		<?php endforeach; ?>
		<?php
				break;
			case 'check':
		?>
		<?php foreach ($model['options'] as $value => $option): ?>
			<span class="checkbox"><input type="checkbox" name="<?php echo $model['data_name']; ?>[]" value="<?php echo $value; ?>" title="<?php echo $model['tooltip']; ?>"<?php echo is_array($model['value']) && in_array($value, $model['value']) ? ' checked' : ''; ?> /><?php echo $option; ?></span>
		<?php endforeach; ?>
		<?php
				break;
			case 'number':
		?>
		<?php if (isset($model['options'])) :
				foreach ($model['options'] as $value => $option): ?>
					<div class="number"><input type="number" style="width:3em" name="<?php echo $value; ?>" value="<?php echo $model['value']; ?>" title="<?php echo $model['tooltip']; ?>" /> <?php echo $option; ?></div>
		<?php   endforeach;

			  else: ?>
			  	<div class="number"><input type="number" style="width:3em" name="<?php echo $model['data_name']; ?>" value="<?php echo $model['value']; ?>" title="<?php echo $model['tooltip']; ?>" /></div>
		<?php endif; ?>
		<?php
				break;
			default:
		?>
		<input type="<?php echo $model['type']; ?>" name="<?php echo $model['data_name']; ?>" value="<?php echo $model['value']; ?>" title="<?php echo $model['tooltip']; ?>" />
		<?php
		endswitch;
		?>
		<?php if (isset($model['details'])): ?>
			<span class="details"><?php echo $model['details']; ?></span>
		<?php endif; ?>
	</div>
</div>
