<div class="form-group required {{ $errors->has($name) ? ' has-error' : '' }}">
  <?php $render_label_name = $name ?>
  @if($label_name <> null)
  <?php $render_label_name = $label_name ?>
  @endif
  {{ Form::label($render_label_name, null, ['class' => 'control-label']) }} @if($required == '*')<strong class="text-danger"> *</strong> @endif
  {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
  @if ($errors->has($name))
      <span class="help-block">
          <strong>{{ $errors->first($name) }}</strong>
      </span>
  @endif
</div>
