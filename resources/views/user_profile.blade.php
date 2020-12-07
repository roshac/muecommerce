@extends('layouts.app')
@section('content')
<div class="content" style="background: rgb(255, 255, 255)">
  @include('adminlte-templates::common.errors')
  <h1><b>USER ACCOUNT</b></h1>
  <strong><hr></strong> 
  <br>
  <div class="row">
    <div class="col-md-4">
      <h4 style="text-align: center"><b>User Profile</b></h4>
      <table>
        <tr>
          <td>
            <img src="{{ URL::asset('storage/' . Auth::User()->photo) }}" width="267px" height="242x" class="rounded-circle" style="margin-left: 10%"/>
          </td>
        </tr>
        <tr style="text-align: center">
          <td>
            <h5><b>{{Auth::User()->name}}</b></h5>
          </td>
        </tr>
        <tr>
          <td style="text-align: center">
            <strong>{{Auth::User()->email}}</strong>
          </td>
        </tr>
        <tr>
          <td >
             <button type="button" class="btn btn-primary" style="margin-left: 30%"  data-toggle="modal" data-target="#exampleModal">
              Update Profile
          </button>
          </td>
        </tr>
      </table><br><br>
      
    </div>
    <div class="col-md-8">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">My Shipping Address</a>
        </li>
        
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">Recent Activity Logs</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"></a>
        </li>
      </ul>
      
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <table class="table table-bordered display compact" style="width: 100%" id="example" >
            <tr>
              <th>No</th>
              <th>Location</th>
              <th>Phone No</th>
              <th>Region</th>
            </tr>
            
            @foreach ($address as $keys => $add)
              <tr>
                <td>{{ ++$keys }}</td>
                <td>{{ $add->location}}</td>
                
               
                <td > {{$add->phone_no }}</td>
                
               <td>Morogoro</td>
              </tr>
              @endforeach
        
          </table>
        </div>
        
        <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">
          <table class="table table-bordered display compact" id="example" >
            <tr>
              <th>No</th>
              <th>Subject</th>
              <th>URL</th>
              <th>Method</th>
              <th>Ip</th>
              
              <th>User Name</th>
              
            </tr>
            @if($logs->count())
              @foreach($logs as $key => $log)
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $log->subject }}</td>
                <td class="text-success">{{ $log->url }}</td>
                <td><label class="label label-info">{{ $log->method }}</label></td>
                <td class="text-warning">{{ $log->ip }}</td>
                
                <td>{{ Auth::User()->name }}</td>
              </tr>
              @endforeach
            @endif
          </table>
          
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          NO RETURN
        </div>
      </div>
      
    </div>
    
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Profile Picture</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form action="{{URL::asset('profile/'.Auth::User()->id.'?_method=PUT')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <label for="inputEmail4">Full Name</label>
            <input type="text" class="form-control" placeholder="Your Name" value="{{Auth::User()->name}}" id="inputEmail4" name="name">
              <input type="file" name="photo" class="custom-file-input" id="customFile" required>
                <label for="inputEmail4">Profile picture</label>
              <div class="custom-file">
                
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
           
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        
      </div>
  </div>
</div>
@endsection

