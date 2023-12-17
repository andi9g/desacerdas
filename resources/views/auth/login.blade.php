@extends('layouts.login')

@section('content')

<div class="login-box">

    <div class="card card-outline card-secondary">
        
        <div class="card-body">
            <center>
                <img src="{{ url('gambar', ['desacerdas.PNG']) }}" class="rounded-circle bg-dark mb-4" width="100px" alt="">
            </center>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="username" value="{{ old('username') }}" name="username" required autocomplete="username" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                          <button type="submit" class="btn btn-primary btn-block">MASUK</button>
                    </div>

                </div>
            </form>
                        

        </div>

        <div class="card-footer">
            <a href="{{ url('/', []) }}" class="btn btn-block btn-outline-secondary">HALAMAN UTAMA</a>
        </div>


    </div>

</div>


@endsection
