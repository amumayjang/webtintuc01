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
                                        <p class="help-block">Ví dụ: Lê Hữu Trường</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email" type="email" placeholder="Enter Email">
                                        <p class="help-block">Ví dụ: example@gmail.com</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Nhập lại Password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <input name="avatar-img" type="file">
                                    </div>
                                    <div class="form-group">
                                        <label>Vai trò</label>
                                        <select name="role"  class="form-control">
                                            @php
                                                show_roles ($roles)
                                            @endphp
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default">Thêm</button>
                                    <button type="reset" class="btn btn-default">Xóa</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@stop