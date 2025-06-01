@extends('layout.templateuser')
@section('content')
<div class="user__right">
    <h3 class="text-center">CHỈNH SỬA THÔNG TIN</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    @if (session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
    @endif

    <form action="{{ url('/trangcanhan/edit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Họ và tên</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" />
        </div>
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        <a href="{{ url('/trangcanhan') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection 