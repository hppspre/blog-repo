@extends('heder')
@section('update-admin-user')

<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
            <div class="card">
                <div class="container">
                 <div class="card-header ">{{ __('UPDATE THIS USER') }}</div>
                </div>

                <div class="card-body justify-content-center">

               
                    <form method="POST" action="{{ route('update-user-details-admin') }}" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="id" value="{{$userData[0]->id}}">

                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('Name') }}</label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{$userData[0]->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('Email') }}</label>
                            <div class="col-md-12">
                                <input id="name" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{$userData[0]->email}}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('Phone') }}</label>
                            <div class="col-md-12">
                                <input id="phone" type="number" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{$userData[0]->phone}}" required autocomplete="Phone" autofocus>

                                @error('phone')
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


@endsection
