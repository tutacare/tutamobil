@extends('layouts.iframe-app')
@section('styles')
  <link rel="stylesheet" href="{!! asset('template/plugins/datatables/dataTables.bootstrap.css') !!}">
@endsection

@section('scripts')
<script src="{!! asset('template/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('template/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>


<script type="text/javascript">
$(document).ready(function() {

  $('#example').DataTable();

});
</script>
@endsection



@section('content')

<!-- Gallery -->
<div class="row">
  <div class="col-md-12">
<a href="/dashboard/mobil-baru/gallery/create" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Tambah Gallery</a>
</div>
</div>
<hr />
    <table id="example" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Gallery</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
        @foreach($gallery as $value)
            <tr>
                <td><img src="/img/gallery/{{$value->gallery}}" class="img-responsive" width="100px"></td>
                <td>


                      {!! Form::open(array('url' => 'dashboard/mobil-baru/gallery/delete/' . $value->id)) !!}
													{!! Form::hidden('_method', 'DELETE') !!}
                          <a href="/dashboard/mobil-baru/gallery/{{$value->id}}/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
													<button class="btn btn-xs btn-danger" onClick="return confirm('Benar ingin menghapus?')" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</button>
											{!! Form::close() !!}
                </td>
            </tr>
        @endforeach
			</tbody>
		</table>

<!-- gallery end -->





@endsection
