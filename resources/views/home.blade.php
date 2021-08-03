@extends('heder')

@section('home')

<section>
    <!-- Because need to marging from top of page navbar positioned with fixed ):)  -->
    <br>
    <br>
    <br>
    <br>
    <!-- Post list -->

    @if (count($post)==0)
        <div class="container">
            <div class="alert alert-primary text-uppercase text-center" role="alert">
                There is no post yet
            </div>
        </div>  
    @endif

    {{-- {{dd($comment)}} --}}

    @foreach($post as $data)
        <div class="container shadow p-3 mb-5 bg-white">
              <div class="card rounded-0 border-0 shadow p-3 mb-5 bg-white rounded pt-5">
                  <div class="card-body">
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

                                    @if (Auth::user())

                                        @if (Auth::user()->id!==$data->user_id)
                                            <!-- Comment form-->
                                            <form method="POST" action="{{ route('add-comments') }}">
                                                @csrf
                                                <textarea class="form-control @error('comment') is-invalid @enderror" name='comment' rows="3" placeholder="leave a comment!"></textarea>
                                                <input type="hidden" value="{{$data->id}}" name='id'>
                                                <button class="btn btn-success rounded-0 mt-3 btn-block text-uppercase">save my comment</button>
                                            </form>
                                            <!-- Comment with nested comments-->
                                        @endif
                                      

                                    @endif
                                    

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

        <div class="d-flex justify-content-center">
            {!! $post->links() !!}
        </div>
    
</section>

@endsection
