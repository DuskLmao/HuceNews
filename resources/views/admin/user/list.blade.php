@extends('admin.layout.index')
@section('content')
<style>
    .pagination { font-size: .75rem; }
    .pagination .page-link { padding: .25rem .5rem; }
</style>
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-home bg-c-blue"></i>
                <div class="d-inline">
                    <h4>User</h4>
                    <span>List</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">User</a> </li>
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
                    <div class="card" style="width:100%">
                        <div class="card-block">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <a href="{{ url('admin/user/create') }}" class="text-light">
                                        <button class="btn btn-primary">Add</button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ url('admin/user/list') }}" method="GET" class="float-right">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="dt-responsive table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    @if(count($errors)>0)
                                    <div class="alert alert-danger">
                                    @foreach($errors->all() as $arr)
                                        {{$arr}}<br>
                                    @endforeach
                                    </div>
                                    @endif
                                    @if (session('thongbao'))
                                    <div class="alert alert-success">
                                        {{ session('thongbao') }}
                                    </div>
                                    @endif
                                    <thead>
                                        <tr align="center">
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Active</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $value)
                                        <tr class="odd gradeX" align="center">
                                            <td>{!! $value['id'] !!}</td>
                                            <td>{!! $value['name'] !!}</td>
                                            <td>{!! $value['email'] !!}</td>
                                            <td>
                                                @if($value['role'] == 1)
                                                    {!! 'Admin' !!}
                                                @elseif($value['role'] == 2)
                                                    {!! 'Staff' !!}
                                                @else  
                                                    {!! 'User' !!}
                                                @endif
                                            </td>
                                            <td>
                                                @if ( $value['active'] == 1)
                                                <a href="admin/user/block/{!! $value['id'] !!}">
                                                <img style="width: 40px" src="upload/icon/accept.png">
                                                </a>
                                                @else
                                                <a href="admin/user/active/{!! $value['id'] !!}">
                                                    <img style="width: 40px" src="upload/icon/noaccept.png">
                                                </a>
                                                @endif
                                            </td>
                                            <td class="center"><a class="btn btn-danger" href="admin/user/delete/{!! $value['id'] !!}"> Delete</a></td>
                                            <td class="center"><a class="btn btn-warning" href="admin/user/edit/{!! $value['id'] !!}">Edit</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $users->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection