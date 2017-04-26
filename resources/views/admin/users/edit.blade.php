@extends('admin.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa thành viên</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Cập nhật thông tin thành viên
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4 col-lg-offset-4">
                                    <form role="form" action="{{ route("users.update", $user->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="form-group">
                                            <label>Họ và tên</label>
                                            <input class="form-control" value="{{ $user->name }}" name="name" type="text">
                                            @if ($errors->has('name'))
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                            <p class="help-block">Ví dụ: Lê Hữu Trường</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" value="{{ $user->email }}" type="email" placeholder="Enter Email">
                                            @if ($errors->has('email'))
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            @endif
                                            <p class="help-block">Ví dụ: example@gmail.com</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Ảnh đại diện</label>
                                            @if ($user->avatar != '')
                                            <div>
                                                <img src="{{ url("public/admin/uploads/images/avatars/".$user->avatar) }}">
                                            </div>
                                            @endif
                                            <input name="avatar-img" type="file">
                                            @if ($errors->has('password'))
                                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Vai trò</label>
                                            <select name="role"  class="form-control">
                                                @php
                                                    show_roles ($roles, $user->role_id)
                                                @endphp
                                            </select>
                                            @if ($errors->has('role'))
                                                <p class="text-danger">{{ $errors->first('role') }}</p>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-success">Cập nhật</button>
                                        <a href="{{ route('users.manager') }}">
                                            <button type="button" class="btn btn-danger">Hủy</button>
                                        </a>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                    <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@stop