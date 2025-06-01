@extends('admin.layout.index')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-aperture bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Banner</h4><span>Create</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Banner</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><h5>Create banner</h5></div>
                        <div class="card-block">

                            {{-- validation errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err) {{ $err }}<br> @endforeach
                                </div>
                            @endif

                            {{-- success message --}}
                            @if (session('thongbao'))
                                <div class="alert alert-success">{{ session('thongbao') }}</div>
                            @endif

                            <form action="{{ route('admin.banner.create.post') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Image</label>
                                    <div class="col-sm-11">
                                        <input type="file" name="image"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Active</label>
                                    <div class="col-sm-11 d-flex align-items-center">
                                        <label class="radio-inline mr-3">
                                            <input type="radio" name="active" value="1"> YES
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="active" value="0" checked> NO
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-11 offset-sm-1">
                                        <button type="submit" class="btn btn-primary m-b-0">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
