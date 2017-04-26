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
                <h1 class="page-header">Quản lý danh mục</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tất cả danh mục
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center">Tên danh mục</th>
                                    <th class="text-center">Đường dẫn tĩnh</th>
                                    <th class="text-center">Danh mục cha</th>
                                    <th class="text-center">Mô tả</th>
                                    <th class="text-center">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                            @isset ($cates)
                                @foreach ($cates as $cate)
                                    <tr class="odd gradeX">
                                        <td class="center">{{ $cate->cate_name }}</td>
                                        <td class="text-center">{{ $cate->slug }}</td>
                                        <td class="text-center">{{ $cate->parent()->first()['cate_name'] }}</td>
                                        <td class="text-center">{{ $cate->description }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('category.edit', $cate->id) }}">
                                                <button type="button" class="btn btn-outline btn-info">Sửa</button>
                                            </a>                                        
                                            <a href="{{ route('category.destroy', $cate->id) }}">
                                                <button type="button" class="btn btn-outline btn-danger">Xóa</button>
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
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
@endsection