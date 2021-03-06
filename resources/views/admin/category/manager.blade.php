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
        @if (Session::has('flash_message'))
            <div class="alert alert-{{ Session::get('flash_level') }}">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Tất cả danh mục
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll"></th>
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
                                    <tr class="odd gradeX" id="{{ $cate->id }}">
                                        <td class="text-center">
                                            <input type="checkbox" class="checkOne" value="{{ $cate->id }}">
                                        </td>
                                        <td class="center">{{ $cate->cate_name }}</td>
                                        <td class="text-center">{{ $cate->slug_cate }}</td>
                                        <td class="text-center">{{ $cate->parent()->first()['cate_name'] }}</td>
                                        <td class="text-center">{{ $cate->description_cate }}</td>
                                        <td class="text-center">
                                            <a href="{{ asset('/'.$cate->slug_cate) }}"></a>
                                            <a href="{{ route('category.edit', $cate->id) }}">
                                                <button type="button" class="btn btn-info">Sửa</button>
                                            </a>                                        
                                            <button type="button" data-toggle="modal" data-target="#myModal-{{ $cate->id }}" class="btn btn-danger">Xóa</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal-{{ $cate->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Bạn có chắc muốn xóa?</h4>
                                                        </div>
                                                        <form action="{{ route('category.destroy', $cate->id) }}" method="post">
                                                            <div class="modal-body">
                                                                <p>Danh mục: {{ $cate->cate_name }}</p>
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="id" value="{{ $cate->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                                            </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                        <div class="form-group">
                            <div class="col-sm-2">
                                <select id="actionDelete" class="form-control">
                                    <option selected>Hành động...</option>
                                    <option value="delete">Xóa mục đã chọn</option>
                                </select>
                            </div>
                            <button class="btn btn-success" id="submitDelete" type="button" data-toggle="modal" data-target="#modalOk">Đồng ý</button>
                        </div>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
            $("div.alert").delay(3000).slideUp();
        });
        // tooltip demo
        $('.tooltip-demo').tooltip({
            selector: "[data-toggle=tooltip]",
            container: "body"
        })
        // popover demo
        $("[data-toggle=popover]").popover()
        var url = "{{ route('category.del-list') }}"
        deleteListId(url);
    </script>
@endsection
