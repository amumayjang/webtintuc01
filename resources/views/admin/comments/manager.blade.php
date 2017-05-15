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
                <h1 class="page-header">Quản lý phản hồi</h1>
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
                        Tất cả phản hồi
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll"></th>
                                    <th class="text-center">Người dùng</th>
                                    <th class="text-center">Nội dung</th>
                                    <th class="text-center" style="width: 13%">Tác vụ</th>
                                    <th class="text-center">Bài viết</th>
                                    <th class="text-center">Thời gian đăng</th>
                                </tr>
                            </thead>
                            <tbody>
                            @isset ($comments)
                                @foreach ($comments as $comment)
                                    <tr class="odd gradeX" id="{{ $comment->id }}">
                                        <td class="text-center">
                                            <input type="checkbox" class="checkOne" value="{{ $comment->id }}">
                                        </td>
                                        <td class="center">{{ $comment->user()->get()->first()->name }}</td>
                                        <td class="center">
                                            {{ $comment->content_cmt }}
                                        </td>
                                        <td class="text-center" style="width: 13%">
                                            <button type="button" class="btn-primary" data-toggle="modal" data-target="#modalRep-{{ $comment->id }}"><i class="fa fa-reply"></i></button>
                                            <button type="button" class="btn-warning" data-toggle="modal" data-target="#modalEdit-{{ $comment->id }}"><i class="fa fa-pencil"></i></button>
                                            <button type="button" class="btn-danger" data-toggle="modal" data-target="#modalDel-{{ $comment->id }}"><i class="fa fa-trash"></i></button>
                                        </td>
                                        <td class="center">{{ $comment->article()->get()->first()->title }}</td>
                                        <td class="text-center">{{ $comment->created_at }}</td>
                                    </tr>
                                    <!-- Modal reply -->
                                    <div class="modal fade" id="modalRep-{{ $comment->id }}" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Trả lời bình luận</h4>
                                                </div>
                                                <form action="{{ route('comments.store') }}" method="POST">
                                                    <div class="modal-body">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label>{{ $comment->user()->get()->first()->name }}</label>
                                                            <p>{{ $comment->content_cmt }}</p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Trả lời:</label>
                                                            <textarea class="form-control" rows="5" name="content_cmt"></textarea>
                                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                            <input type="hidden" name="article_id" value="{{ $comment->article_id }}">
                                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Đăng</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal edit -->
                                    <div class="modal fade" id="modalEdit-{{ $comment->id }}" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Chỉnh sửa bình luận</h4>
                                                </div>
                                                <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                                                    <div class="modal-body">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PUT') }}
                                                        <div class="form-group">
                                                            <label>{{ $comment->user()->get()->first()->name }}</label>
                                                            <textarea class="form-control" name="content_edit">{{ $comment->content_cmt }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal delete -->
                                    <div class="modal fade" id="modalDel-{{ $comment->id }}" role="dialog">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Có chắc chắn muốn xóa bình luận?</h4>
                                                </div>
                                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                    <div class="modal-body">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <div class="form-group">
                                                            <label>{{ $comment->user()->get()->first()->name }}:</label>
                                                            <p>{{ $comment->content_cmt }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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

        var url = "{{ route('comments.del-list') }}";
        deleteListId(url);
    </script>
@endsection
