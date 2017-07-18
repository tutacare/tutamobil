<div class="alert alert-danger info" style="display:none;">
    <ul></ul>
</div>

<div class="form-group">
    <label>Tipe</label> <strong class="text-danger"> *</strong>
    {!! Form::text('tipe', null, ['class' => 'form-control', 'id' => 'tipe']) !!}
</div>

<div class="form-actions">
  <div class="row">
      <div class="col-md-12">
            {!! Form::button('Save', array('class' => 'btn btn-primary save')) !!}
            {!! Form::hidden('id', null, ['id' => 'id']) !!}
      </div>
    </div>
</div>
