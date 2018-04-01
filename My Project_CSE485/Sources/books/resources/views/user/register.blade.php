@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="page-header">
            <h1>Đăng Ký Thành Viên</h1>
        </div>

        <div class="row">
            <div class="col-lg-5">
                <form action="{{ route('user.doRegister') }}" method="post">
                    <div class="form-group @if($errors->has('username')) has-error @endif">
                        <label for="username">Tên Đăng Nhập</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Tên Đăng Nhập" value="{{ old('username') }}">
                        @if($errors->has('username'))
                            <p class="help-block">{{ $errors->first('username') }}</p>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('password')) has-error @endif">
                        <label for="password">Mật Khẩu</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mật Khẩu">
                        @if($errors->has('password'))
                            <p class="help-block">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                        <label for="password_confirmation">Nhập Lại Mật Khẩu</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Nhập Lại Mật Khẩu">
                        @if($errors->has('password_confirmation'))
                            <p class="help-block">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                        <label for="email">Địa Chỉ Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Địa Chỉ Email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <p class="help-block">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">Đăng Ký</button>
                </form>
            </div>
        </div>


    </div>
</div>
@endsection
