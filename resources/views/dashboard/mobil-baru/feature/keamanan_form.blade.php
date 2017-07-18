<div class="alert alert-danger info-keamanan" style="display:none;">
    <ul></ul>
</div>

<div class="form-group">
    <label>Keamanan Kelengkapan</label> <strong class="text-danger"> *</strong>
    {!! Form::text('keamanan_kelengkapan', null, ['class' => 'form-control', 'id' => 'keamanan_kelengkapan']) !!}
    {!! Form::hidden('spesifikasi_mobil_baru_id', $mobil_baru->id, ['id' => 'spesifikasi_mobil_baru_id']) !!}
</div>

<div class="form-actions">
  <div class="row">
      <div class="col-md-12">
            {!! Form::button('Save', array('class' => 'btn btn-primary save-keamanan')) !!}
            {!! Form::hidden('id', null, ['id' => 'id']) !!}
      </div>
    </div>
</div>
