@extends('heder')
@section('admin-all-post')

<br><br><br><br>


<div class="container">

    @if (count($post)==0)
    <div class="container">
        <div class="alert alert-primary text-uppercase text-center" role="alert">
            NOT POST YET
        </div>
    </div>  
    @endif
    @foreach($post as $data)
    <div class="container shadow p-3 mb-5 bg-white">

          <div class="card rounded-0 border-0 shadow p-3 mb-5 bg-white rounded pt-5">
              <div class="card-body">
                  <a href="{{route('admin-update-post',$data->id)}}">
                    <button class="btn btn-info rounded-0">Edit Now</button>
                  </a>

                  @if ($data->status=='modified')
                    <a href="{{route('admin-checked-post',$data->id)}}">
                        <button class="btn btn-success rounded-0">Not checked yet , so make this as a checked</button>
                    </a>
                  @endif
                  

                  <a href="{{route('drop-admin-post',$data->id)}}">
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
</div>


@endsection
