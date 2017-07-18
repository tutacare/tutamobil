
<div class="panel panel-info">
           <div class="panel-heading">
             <h3 class="panel-title">{{$user->name}}</h3>
           </div>
           <div class="panel-body">
             <div class="row">
               <div class="col-md-3 col-lg-3 " align="center"> <img alt="{{$user->name}}" src="{{TutaComp::getImage($user->foto)}}" class="img-circle img-responsive"> </div>

               <div class=" col-md-9 col-lg-9 ">
                 <table class="table table-user-information">
                   <tbody>
                     <tr>
                       <td>Email:</td>
                       <td>{{$user->email}}</td>
                     </tr>
                     <tr>
                       <td>Username:</td>
                       <td>{{$user->username}}</td>
                     </tr>
                     <tr>
                       <td>Phone:</td>
                       <td>{{$user->phone}}</td>
                     </tr>
                     @if($user->website)
                     <tr>
                       <td>Website:</td>
                       <td>{{$user->website}}</td>
                     </tr>
                     @endif
                     @if($user->address)
                     <tr>
                       <td>Alamat:</td>
                       <td>{{$user->address}}</td>
                     </tr>
                     @endif
                     <tr>
                       <td>Peranan:</td>
                       <td>{{ $user->role == 'admin' ? 'Administrator' : 'Operator' }}</td>
                     </tr>
                   </tbody>
                 </table>


               </div>
             </div>
           </div>
                <div class="panel-footer">
                       <a data-toggle="tooltip" data-placement="right" title="Kirim Pesan" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                       <span class="pull-right">

                           {!! Form::open(array('url' => 'dashboard/users/' . $user->id)) !!}
                               {!! Form::hidden('_method', 'DELETE') !!}
                               <a href="{{ URL::to('dashboard/users/' . $user->id . '/edit') }}" data-toggle="tooltip" data-placement="left" title="Ganti Data Pengguna" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                               <button data-toggle="modal" title="Hapus Pengguna" data-target="#confirmDelete" data-placement="right" title="Hapus" class="btn btn-sm btn-danger" type="button"><i class="glyphicon glyphicon-trash"></i></button>
                           {!! Form::close() !!}

                       </span>
                   </div>
</div>
