@extends('heder')

@section('new-post')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
            <div class="card">
                <div class="card-header ">{{ __('ADD A NEW POST') }}</div>

                <div class="card-body justify-content-center">

                    @if (Session::has('msg'))
                      <div class="alert alert-primary" role="alert">
                        {{Session::get('msg')}}
                      </div>
                    @endif

                    <form method="POST" action="{{ route('new-post') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group text-center">

                            <label for="name" class="col-md-12 col-form-label ">{{ __('Image') }}</label>
                            <img src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" class="img-fluid"  id='default_img' style="height: 200px;object-fit: cover;width: auto;"><br>
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

                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('Tittle') }}</label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

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
                                <textarea class="form-control" class="form-control  @error('Description') is-invalid @enderror" name="Description" rows="3"></textarea>
                                @error('Description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group  mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary btn-block rounded-0">
                                    {{ __('ADD NOW') }}
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
