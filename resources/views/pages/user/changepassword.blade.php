@extends('layout.templateuser')
@section('content')
<div class="user__right">
    <h3 class="text-center">ĐỔI MẬT KHẨU</h3>
    @if(session('thongbao'))
        <div class="alert alert-danger">
            {{session('thongbao')}}
        </div>
    @endif
    <form action="/trangcanhan/changepassword" method="POST">
        @csrf
        <div class="form-group">
            <label for="current_password">Mật khẩu hiện tại</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>
        <div class="form-group">
            <label for="new_password">Mật khẩu mới</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Nhập lại mật khẩu mới</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection 