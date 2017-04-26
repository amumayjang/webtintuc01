@extends('admin.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm thành viên</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Thông tin thành viên
                        </div>
                        <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-4">
                                <form role="form" action="{{ route("users.add") }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Họ và tên</label>
                                        <input class="form-control" name="name" type="text">
                                        @if ($errors->has('name'))
                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                        <p class="help-block">Ví dụ: Lê Hữu Trường</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email" type="email" placeholder="Enter Email">
                                        @if ($errors->has('email'))
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                        <p class="help-block">Ví dụ: example@gmail.com</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                        @if ($errors->has('password'))
                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Nhập lại Password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <input name="avatar-img" type="file">
                                        @if ($errors->has('avatar-img'))
                                            <p class="text-danger">{{ $errors->first('avatar-img') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Vai trò</label>
                                        <select name="role"  class="form-control">
                                            @php
                                                show_roles ($roles)
                                            @endphp
                                        </select>
                                        @if ($errors->has('role'))
                                            <p class="text-danger">{{ $errors->first('role') }}</p>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                    <button type="reset" class="btn btn-danger">Xóa</button>
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