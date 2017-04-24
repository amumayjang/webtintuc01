@extends('admin.layouts.master')
@section('head')
    <!-- DataTables CSS -->
    <link href="{{ url("public/admin/vendor/datatables-plugins/dataTables.bootstrap.css") }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ url("public/admin/vendor/datatables-responsive/dataTables.responsive.css") }}" rel="stylesheet">    
@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lý thành viên</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Danh sách thành viên
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center">Họ và tên</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Vai trò</th>
                                    <th class="text-center">Ngày tham gia</th>
                                    <th class="text-center">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                            @isset ($users)
                                @foreach ($users as $user)
                                    <tr class="odd gradeX">
                                        <td class="center">{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">{{ $user->role()->get()->first()->role_name }}</td>
                                        <td class="text-center">{{ $user->created_at }}</td>
                                        <td class="text-center">
                                            <a href="">
                                                <button type="button" class="btn btn-outline btn-info">Sửa</button>
                                            </a>                                        
                                            <a href="">
                                                <button type="button" class="btn btn-outline btn-danger">Sửa</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
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
@endsection
@section('script')
    <!-- DataTables JavaScript -->
    <script src="{{ url("public/admin/vendor/datatables/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ url("public/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js") }}"></script>
    <script src="{{ url("public/admin/vendor/datatables-responsive/dataTables.responsive.js") }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ url("public/admin/dist/js/sb-admin-2.js") }}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
@endsection