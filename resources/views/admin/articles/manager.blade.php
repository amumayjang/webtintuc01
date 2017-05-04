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
                <h1 class="page-header">Quản lý bài viết</h1>
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
                        Tất cả bài viết
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center">Tiêu đề</th>
                                    <th class="text-center">Danh mục</th>
                                    <th class="text-center">Tags</th>
                                    <th class="text-center">Tác giả</th>
                                    <th class="text-center">Thời gian viết</th>
                                </tr>
                            </thead>
                            <tbody>
                            @isset ($articles)
                                @foreach ($articles as $article)
                                    <tr class="odd gradeX div-show">
                                        <td class="center">{{ $article->title }}
                                            <p class="text-center div-hidden">
                                                <a href="{{ route('articles.edit', $article->id) }}">
                                                    <button type="button" class="btn btn-info"><i class="fa fa-pencil"></i>
                                                    </button>
                                                </a> 
                                                <button type="button" data-toggle="modal" data-target="#myModal-{{ $article->id }}" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </p>
                                        <!-- Modal -->
                                            <div class="modal fade" id="myModal-{{ $article->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Bạn có chắc muốn xóa?</h4>
                                                        </div>
                                                        <form action="{{ route('articles.destroy', $article->id) }}" method="post">
                                                            <div class="modal-body">
                                                                <p>Bài viết: {{ $article->title }}</p>
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="id" value="{{ $article->id }}">
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
                                        <td class="text-center">{{ $article->cate()->get()->first()->cate_name }}</td>
                                        <td class="text-center">
                                            @foreach ($article->tags()->get() as $tag)
                                                {{ $tag->name_tag }},
                                            @endforeach
                                        </td>
                                        <td class="text-center">{{ $article->author()->get()->first()->name }}</td>
                                        <td class="text-center">
                                            {{ $article->created_at }}
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
    </script>
@endsection
