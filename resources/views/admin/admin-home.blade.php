@extends('heder')
@section('admin-home')
<br><br><br><br>
<div class="container">
    <h4>USERS LIST</h4>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Profile Picture</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->name}}</td>
                <td><img class="rounded-circle" src="{{asset('storage/uploads/'.$data->profile_pic)}}" alt="..."  style="height: 20px;object-fit: cover;width: 20px;"></td>
                <td>
                    <a href="{{route('admin-users_update',$data->id)}}">
                        <button class="btn btn-success">Update</button>
                    </a>
                </td>
                <td>
                    <a href="{{route('admin-user-delete',$data->id)}}">
                     <button class="btn btn-danger">Drop</button>
                    </a> 
                </td>
            </tr>
          @endforeach  
         
        </tbody>
      </table>
    </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
        {!! $users->links() !!}
        </div>
    </div>
@endsection