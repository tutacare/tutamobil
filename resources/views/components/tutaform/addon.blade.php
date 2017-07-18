<div class="form-group required {{ $errors->has($name) ? ' has-error' : '' }}">
  <?php $render_label_name = $name ?>
  @if($label_name <> null)
    <?php $render_label_name = $label_name ?>
  @endif
  {{ Form::label($render_label_name, null, ['class' => 'control-label']) }} @if($required == '*')<strong class="text-danger"> *</strong> @endif
  <div class="input-group">
    <div class="input-group-addon">{!! $addon !!}</div>
    {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
      @if($last)
        <div class="input-group-addon">{{$last}}</div>
      @endif
  </div>
</div>
