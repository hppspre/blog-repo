@extends('heder')
@section('adminLogin')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="container">
                    <div class="card-header ">{{ __('Login') }}</div>
                </div>

           
           
                <div class="card-body">
                    @if (Session::has('msg'))
                        <div class="container">
                            <div class="alert alert-danger" role="alert">
                                {{Session::get('msg')}}
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin-login') }}">
                        @csrf

                        <div class="form-group ">

                            <div class="col-md-12">
                            <label for="email" class="col-form-label text-md-right">{{ __('User Name') }}</label>

                                <input id="email" type="text" class="form-control @error('u_name') is-invalid @enderror" name="u_name" value="{{ old('u_name') }}" required autocomplete="user name" autofocus>

                                @error('u_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">

                            <div class="col-md-12">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

             

                        <div class="form-group ">
                            <div class="col-md-12">
                                <button type="submit" class="btn rounded-0 btn-primary btn-block">
                                    {{ __('Login') }}
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