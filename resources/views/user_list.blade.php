
@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Users Roles And Permission
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
            <table class="table" id="example">
                <thead>
                <tr>
                    <th>S/no</th><th>Username</th><th>Admin & Seller Role</th><th>Admin Permission</th><th>Seller Permission</th>
                </tr>
            </thead><tbody>
                @foreach ($users as $key => $user)
                <tr>
                    <td>{{++$key}}</td>
                    
                    
                    <td>  {{$user->name}}</td>
                    @foreach ($user->roles as $role)
                    <div class="row">
                        
                        <td>
                            <div class="col md-col-4">
                                <small class="text-muted">{{$role->name}}</small>
                            </div>
                        </div>
                    </td>
                    @endforeach
                    
                    @if($user->id != Auth::user()->id)
                    @if($user->hasRole('Admin'))
                    <td><a class="btn btn-danger" href="/removeadmin/{{$user->id}}">
                        Remove Admin
                    </a><br><br></td>
                    @else
                    <td> <a class="btn btn-primary" href="/giveadmin/{{$user->id}}">
                        Give Admin
                    </a><br><br></td>
                    @endif
                    @endif
                    
                    
                    
                    @if($user->hasRole('Seller'))
                    <td>  <a class="btn btn-danger" href="remove/{{$user->id}}">
                        Remove Seller
                    </a>
                </td>
                @else
                
                <td> <a class="btn btn-primary" href="give/{{$user->id}}">
                    Give Seller
                </a>
            </td>
            @endif
            
        </tr>
    </tbody>
        @endforeach  
    </table>
</div>
<script type="application/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script src="{{asset('js\app.js')}}" defer></script>
<script type="application/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="application/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
