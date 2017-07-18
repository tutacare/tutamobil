<div class="alert alert-danger info-interior" style="display:none;">
    <ul></ul>
</div>

<div class="form-group">
    <label>Interior Exterior</label> <strong class="text-danger"> *</strong>
    {!! Form::text('interior_exterior', null, ['class' => 'form-control', 'id' => 'interior_exterior']) !!}
    {!! Form::hidden('spesifikasi_mobil_baru_id', $mobil_baru->id, ['id' => 'spesifikasi_mobil_baru_id']) !!}
</div>

<div class="form-actions">
  <div class="row">
      <div class="col-md-12">
            {!! Form::button('Save', array('class' => 'btn btn-primary save-interior')) !!}
            {!! Form::hidden('id', null, ['id' => 'id']) !!}
      </div>
    </div>
</div>
