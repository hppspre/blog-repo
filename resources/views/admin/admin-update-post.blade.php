@extends('heder')
@section('admin-update-post')

<br><br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
            <div class="card">
                <div class="container">
                 <div class="card-header ">{{ __('UPDATE THIS POST') }}</div>
                </div>

                <div class="card-body justify-content-center">

                    @if (Session::has('msg'))
                      <div class="alert alert-primary" role="alert">
                        {{Session::get('msg')}}
                      </div>
                    @endif


                    <div class="container">
                        <button class="btn btn-info btn-block" data-toggle="modal" data-target="#imageModel">Update profile image</button>
                    </div>



                    <form method="POST" action="{{ route('admin-update-post-details') }}" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="postid" value="{{$data[0]->id}}">

                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('Tittle') }}</label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{$data[0]->title}}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="email" class="col-md-12 col-form-label ">{{ __('Description') }}</label>
                            <div class="col-md-12">
                                <textarea class="form-control" class="form-control  @error('description') is-invalid @enderror" value="{{$data[0]->description}}" name="description" rows="3">{{$data[0]->description}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group  mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary btn-block rounded-0">
                                    {{ __('UPDATE NOW') }}
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
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
          <form method="POST" action="{{ route('admin-update-post-image') }}" enctype="multipart/form-data">
            @csrf

                <input type="hidden" name="postid" value="{{$data[0]->id}}">

                <div class="form-group text-center">

                    <label for="name" class="col-md-12 col-form-label ">{{ __('Image') }}</label>
                    <img src="{{asset('storage/postImages/'.$data[0]->image)}}" class="img-fluid"  id='default_img' style="height: 200px;object-fit: cover;width: auto;"><br>
                    <label class="btn @error('image') is-invalid @enderror btn-info text-center mt-3" id='input_img'>
                        Upload Image
                        <input type="file" id='profile' name="image" value="https://dummyimage.com/50x50/ced4da/6c757d.jpg" hidden accept="image/png,image/jpeg">
                    </label>

                    @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

            <button class="btn btn-success btn-block">UPDATE POST PICTURE</button>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
@endsection
