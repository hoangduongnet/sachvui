@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="page-header">
            <h1>Đăng Nhập</h1>
        </div>

        <div class="row">
            <div class="col-lg-5">
                @if(session()->has('login_failed'))
                    <div class="alert alert-danger">
                        {{ session('login_failed') }}
                    </div>
                @endif

                <form method="post" action="{{ route('user.authenticate') }}">
                    <div class="form-group @if($errors->has('username')) has-error @endif">
                        <label for="username">Tên Đăng Nhập</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Tên Đăng Nhập">
                        @if($errors->has('username'))
                            <div class="help-block">{{ $errors->first('username') }}</div>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('password')) has-error @endif">
                        <label for="password">Mật Khẩu</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mật Khẩu">
                        @if($errors->has('password'))
                            <div class="help-block">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                </form>
            </div>
        </div>



    </div>
</div>
@endsection
