<div class="alert alert-danger info" style="display:none;">
    <ul></ul>
</div>

<div class="form-group">
    <label>Model</label> <strong class="text-danger"> *</strong>
    {!! Form::text('design', null, ['class' => 'form-control', 'id' => 'design']) !!}
</div>

<div class="form-actions">
  <div class="row">
      <div class="col-md-12">
            {!! Form::button('Save', array('class' => 'btn btn-primary save')) !!}
            {!! Form::hidden('id', null, ['id' => 'id']) !!}
      </div>
    </div>
</div>
