
@extends('layouts.app-dash-lte')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('styles')
  <link rel="stylesheet" href="{!! asset('template/plugins/datatables/dataTables.bootstrap.css') !!}">
@endsection

@section('scripts')
<script src="{!! asset('template/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('template/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
{!! Html::script("/mytuta/js/bank.js") !!}


<script type="text/javascript">
$(document).ready(function() {

  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
  });

$('#btn-refresh').click(function(){
  location.reload();
});

  $('#example').DataTable();

//menu active
$('#menu-pengaturan').addClass("active");
$('#menu-bank').addClass("active");

});
</script>
@endsection

@section('content-header', 'Daftar Bank')

@section('breadcump')
<li>Dashboard</li>
<li>Pengaturan</li>
<li class="active">Bank</li>
@endsection

@section('content')

<div class="box">
	<div class="box-header">
		<h3 class="box-title">
<button class="btn btn-success" id="btn-add"><i class="fa fa-plus-circle"></i> Tambah Bank</button> <button class="btn btn-info" id="btn-refresh"><i class="fa fa-refresh"></i></button>
    </h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Bank</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody id="bank-list" name="bank-list">
        @foreach($bank as $value)
            <tr id="bank{{ $value->id }}">
                <td>{{ $value->name }}</td>
                <td>
                    <button class="btn btn-xs btn-primary open-modal" value="{{$value->id}}"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                    <button class="btn btn-xs btn-danger delete" value="{{$value->id}}"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                </td>
            </tr>
        @endforeach
			</tbody>
		</table>
</div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Bank Form</h4>
          </div>
          <div class="modal-body">
          {!! Form::open(array('id' => 'frm', 'name' => 'frm',  'onsubmit' => "return false;")) !!}
          <input id="token" type="hidden" value="{{ csrf_token() }}">
          @include('dashboard.pengaturan.bank._form')
          {!! Form::close() !!}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <!-- Modal -->



</div>
@endsection
