@extends('layouts.main_layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="card p-5">
                    <div class="text-center p-3">
                    <img src="assets/images/logo.png" alt="Notes Logo">
                    </div>
                    <!--form-->
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-12">
                        <form action="{{ route('login.submit') }}" method="POST" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="text_username" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-info">
                                    <i class="fa-solid fa-user"></i>
                                    </span>
                                 <input type="text" class="form-control bg-dark text-info" name="text_username" value="{{ old('text_username') }}">
                                </div>
                                @error('text_username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="text_password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-info">
                                        <i class="fa-solid fa-key"></i>
                                    </span>
                                    <input type="password" class="form-control bg-dark text-info" name="text_password" value="{{ old('text_password') }}">
                                </div>
                                @error('text_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-secondary w-100">
                                    <i class="fa-solid fa-right-to-bracket"></i>&nbsp&nbspLOGIN</button>
                            </div>
                        </form>

                        @if(session('login_error'))
                            <div class="alert alert-danger text-center">
                            {{ session('login_error')}}
                            </div>
                        @endif

                        <!-- @if($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ol class="m-0">
                                    @foreach($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                    @endforeach
                                </ol>
                            </div>  
                        @endif -->

                        </div>
                    </div>
                    <div class="text-center text-secondary mt-3">
                        <small>&copy;Copyright <?= date('Y') ?></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
