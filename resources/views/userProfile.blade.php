@extends('heder')

@section('user-profile')

    <!-- Because need to marging from top of page navbar positioned with fixed ):)  -->
    <br>
    <br>
    <br>
    <br>

    <div class="container">
        <div class="main-body">
    
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{asset('storage/uploads/'.Auth::user()->profile_pic)}}" alt="Admin" class="img-fluid rounded-circle" style="height: 106px;object-fit: cover;width: 115px;">
                        
                        <div class="mt-3">
                          <h4>{{Auth::user()->name}}</h4>
                          <button class="btn btn-info" data-toggle="modal" data-target="#imageModel">Update profile image</button>
                        </div>

                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      @if (Session::has('msg'))
                        <div class="alert alert-primary" role="alert">
                          {{Session::get('msg')}}
                        </div>
                      @endif

                      @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                          {{Session::get('error')}}
                        </div>
                      @endif

                      
                      <form action="{{route('upadate-user-details')}}" method="POST">
                        @csrf
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <div class="form-group">
                              <div class="col-md-12">
                                  <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required>
  
                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <div class="form-group">
                              <div class="col-md-12">
                                  <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required>
  
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <div class="form-group">
                              <div class="col-md-12">
                                  <input id="phone" type="number" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{Auth::user()->phone}}" required>
  
                                  @error('phone')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">

                          <div class="col-md-12">
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editpassword">Edit password</button>
                          </div>
                          
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-12">
                            <button class="btn btn-success btn-block">Edit</button>
                          </div>
                        </div>
                      </div>
                    </form>

                  </div>
    
                </div>
              </div>
    
            </div>
        </div>

        @if (count($post)==0)
        <div class="container">
            <div class="alert alert-primary text-uppercase text-center" role="alert">
                YOU HAVE NOT POST YET
            </div>
        </div>  
       @endif

        @foreach($post as $data)
        <div class="container shadow p-3 mb-5 bg-white">

          
          
              <div class="card rounded-0 border-0 shadow p-3 mb-5 bg-white rounded pt-5">
                  <div class="card-body">
                      <a href="{{route('update-post',$data->id)}}">
                        <button class="btn btn-info rounded-0">Edit Now</button>
                      </a>

                      <a href="{{route('drop-post',$data->id)}}">
                        <button class="btn btn-danger rounded-0">Delete Now</button>
                      </a>


                      <hr>
                      <div class="row">
                          <div class="col-md-5">
                              <div class="card-title h5 text-uppercase">
                                {{$data->title}}
                              </div>
                              <div class='card-img'>
                                  <img src="{{asset('storage/postImages/'.$data->image)}}" class="img-fluid" alt="">
                              </div>
                          </div>
                          <div class="col-md-7 text-justify">


                             {{$data->description}}
                              <!-- Afeter discription -->
                              <div class="card bg-light ">
                                  <div class="card-body">

                                      <div class="pre-scrollable">

                                        @foreach($comment as $com)
                                          @if ($com->postid==$data->id)
                                              <div class="d-flex mb-4">
                                                  <!-- Parent comment-->
                                                  <div class="flex-shrink-0"><img class="rounded-circle" src="{{asset('storage/uploads/'.$com->profile_pic)}}" alt="..."  style="height: 20px;object-fit: cover;width: 20px;"></div>
                                                  <div class="ms-3 ml-2">
                                                      <div class="fw-bold">{{$com->name}}</div>
                                                      {{$com->comment}}
                                                  </div>
                                              </div>
                                          @endif
                                        @endforeach

                                      </div>


                                  </div>
                              </div>
                              <!-- Afeter discription -->

                          </div>
                      </div>
                  </div>
              </div>
          </div>
        @endforeach

        <div class="container mt-5">
          <div class="d-flex justify-content-center">
            {!! $post->links() !!}
          </div>
        </div>
      

         <!-- Modal -->
         <div id="editpassword" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <div class="modal-body">
                <form method="POST" action="{{ route('update-user-password') }}" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                    <div class="col-md-12">
                        <label for="email">{{ __('Current Password') }}</label>
                        <input type="password" class="form-control  @error('current_password') is-invalid @enderror" name="current_password"  required>

                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">

                        <label for="email">{{ __('New Password') }}</label>
                        <input type="password" class="form-control  @error('new_password') is-invalid @enderror" name="new_password"  required>

                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  
                  <div class="form-group">
                    <div class="col-md-12">

                        <label for="email">{{ __('Confirm Password') }}</label>
                        <input type="password" class="form-control  @error('confirm_password') is-invalid @enderror" name="confirm_password"  required>

                        @error('confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                 

                  <button class="btn btn-success btn-block">EDIT PASSWORD</button>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

        <!-- Modal -->
        <div id="imageModel" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <div class="modal-body">
                <form method="POST" action="{{ route('update-profile-pic') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group text-center">

                    <label for="name" class="col-md-12 col-form-label text-uppercase">{{ __('Update your Profile Picture') }}</label><hr>
                    <img src="{{asset('storage/uploads/'.Auth::user()->profile_pic)}}" data-src="{{asset('storage/uploads/'.Auth::user()->profile_pic)}}"  class="img-fluid rounded-circle"  id='default_img' data-src='assets/img/profile/gifavtet.gif' alt="" style="height: 106px;object-fit: cover;width: 115px;"><br>
                    <label class="btn @error('profile_pic') is-invalid @enderror btn-info text-center rounded-circle" id='input_img' style="width: 41px;margin-top: -61px;margin-left: 68px;">
                        <i data-feather="edit" width='15px'></i>
                        <input type="file" id='profile' name="profile_pic" value="https://dummyimage.com/50x50/ced4da/6c757d.jpg" hidden accept="image/png,image/jpeg">
                    </label>

                    @error('profile_pic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                  </div>

                  <button class="btn btn-success btn-block">UPDATE PROFILE PICTURE</button>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>





@endsection
