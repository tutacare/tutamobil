@extends('layouts.app-dash-lte')

@section('meta')
<meta name="_token" content="{{{ csrf_token() }}}"/>
@endsection

@section('styles')
<link rel="stylesheet" href="{!! asset('template/plugins/datatables/dataTables.bootstrap.css') !!}">
@endsection

@section('scripts')
<script src="{!! asset('template/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('template/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
<script type="text/javascript">
$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });
});
//table
$(document).ready(function() {
    $('#cdata').DataTable();
});
</script>

<script type="text/javascript">
//modal info
$(document).on("click", ".open-InfoProfile", function () {
  var user_id = $(this).data('id');
  $.ajax({
    type: 'POST',
    url: '/api/user',
    data: { id: user_id },
    success: function (data) {
                $('#respon').html(data);
              }
  });
  });
// confirm delete
$('#confirmDelete').on('show.bs.modal', function (e) {
  $('#myModal').modal('hide');
    $message = $(e.relatedTarget).attr('data-message');
    $(this).find('.modal-body p').text($message);
    $title = $(e.relatedTarget).attr('data-title');
    $(this).find('.modal-title').text($title);

    // Pass form reference to modal for submission on yes/ok
    var form = $(e.relatedTarget).closest('form');
    $(this).find('.modal-footer #confirm').data('form', form);
});

$('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
    $(this).data('form').submit();
});
</script>
@endsection

@section('content-header', 'Pengguna')

@section('breadcump')
<li>Dashboard</li>
<li class="active">Pengguna</li>
@endsection

@section('content')
@include('widgets.message')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">
		<a href="/dashboard/users/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Buat Pengguna</a>
		</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="cdata" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>NO#</th>
					<th>Nama</th>
          <th>Email</th>
          <th>username</th>
          <th>Phone</th>
          <th>Peranan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $value->name }}</td>
          <td>{{ $value->email }}</td>
          <td>{{ $value->username }}</td>
          <td>{{ $value->phone }}</td>
          <td>{{ $value->role == 'admin' ? 'Administrator' : 'Pengguna' }}</td>
          <td>
			            {!! Form::open(['route' => ['dashboard.users.destroy', $value->id], 'method' => 'delete']) !!}
                  <a type="button" data-placement="left" title="Lihat" class="open-InfoProfile btn btn-xs btn-warning" data-toggle="modal" data-id="{{$value->id}}" href="#myModal"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span></a>
			            <a href="{!! route('dashboard.users.edit', $value->id) !!}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
			            <button data-toggle="modal" data-target="#confirmDelete" data-placement="left" title="Hapus" class="btn btn-xs btn-danger" type="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
			            {!! Form::close() !!}
					</td>
				</tr>

        <!-- Modal delete -->
        <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus Permanen</h4>
              </div>
              <div class="modal-body">
                <p>Anda serius ingin menghapus?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirm">Hapus</button>
              </div>
            </div>
          </div>
        </div>
        <!-- end modal delete -->

				@endforeach
			</tbody>
		</table>
	</div>
</div>

<!-- Modal add-->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tampilan Pengguna</h4>
        </div>
        <div class="modal-body">
          <div id="respon"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </div>
    </div>
  </div>
<!-- end modal -->
@endsection
