@extends('heder')

@section('regster')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
            <div class="card">
                <div class="card-header ">{{ __('Register Now') }}</div>

                <div class="card-body justify-content-center">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group text-center">

                            <label for="name" class="col-md-12 col-form-label ">{{ __('Profile Picture') }}</label>
                            <img src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" class="img-fluid rounded-circle"  id='default_img' data-src='assets/img/profile/gifavtet.gif' alt="" style="height: 106px;object-fit: cover;width: 115px;"><br>
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

                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label ">{{ __('Name') }}</label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="email" class="col-md-12 col-form-label ">{{ __('Mobile Number') }}</label>

                            <div class="col-md-12">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required >

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="password" class="col-md-12 col-form-label ">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="password-confirm" class="col-md-12 col-form-label ">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group  mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary btn-block rounded-0">
                                    {{ __('Register') }}
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
