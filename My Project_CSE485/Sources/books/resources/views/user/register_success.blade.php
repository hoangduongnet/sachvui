@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-ld-12">
            <div class="alert alert-success">
                <h3>Chúc mừng bạn đã đăng ký thành công.</h3>
                <a href="{{ route('home.index') }}" class="btn btn-primary">Quay Lại Trang Chủ</a>
            </div>
        </div>
    </div>
@endsection
