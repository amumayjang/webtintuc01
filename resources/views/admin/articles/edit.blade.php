@extends('admin.layouts.master')
@section('head')
    <link rel="stylesheet" href="{{ url('public/admin/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ url('public/admin/plugins/select2/dist/css/select2.min.css') }}">
    <script src="{{ url('public/admin/js/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ url('public/admin/js/ckfinder/ckfinder.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var baseURL = "{{ url('/') }}"
    </script>
    <script src="{{ url('public/admin/js/func_ckfinder.js') }}" type="text/javascript"></script>
@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm bài viết mới</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Bài viết
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="panel-heading">
                                    <div class="form-group">
                                        <input type="text" slug="output" class="form-control" placeholder="Tiêu đề" value="{{ $article->title }}" name="title">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Đường dẫn:</div>
                                            <div class="input-group-addon">{{ asset('/') }}</div>
                                            <input type="text" value="{{ $article->slug }}" class="form-control input-sm" slug="output" name="slug">
                                        </div>
                                        <p class="text-danger msg-result"></p>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="description" placeholder="Mô tả bài viết">{{ $article->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="content">{{ $article->content }}</textarea>
                                        <script type="text/javascript">ckeditor("content")</script>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                    <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-9 -->            
                <div class="col-lg-3">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Cài đặt
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        @isset ($cates)
                                            <select name="cate_id"  class="form-control">
                                                @php
                                                   show_cates($cates, $article->cate()->get()->first()->id)
                                                @endphp
                                            </select>
                                            <p>
                                                <a href="{{ route('category.create') }}">Thêm danh mục</a>
                                            </p>
                                        @endisset
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        @if ($article->imgThumb != '')
                                            <img src="{{ url('public/admin/uploads/images/thumbnail-articles/'.$article->imgThumb) }}" class="img-thumbnail" width="300" height="300">
                                            <p class="help-block">Thay ảnh</p>
                                        @else
                                            <p class="help-block">Chưa có! Hãy thêm ảnh</p>
                                        @endif
                                        <input type="file" name="thumbnail_image">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"><i class="fa fa-calendar"></i>Thời gian xuất bản
                                        </label>
                                        <input size="16" class="form-control" type="text" value="{{ $article->time_public }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Bài viết hot</label> <br>
                                            <div class="radio">
                                                <label><input type="radio" name="hot" value="1"
                                                    @if ($article->hot == 1)
                                                        checked
                                                    @endif
                                                >Có
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="hot" value="0"
                                                @if ($article->hot == 0)
                                                        checked
                                                    @endif
                                                >Không
                                                </label>
                                            </div>
                                    <div class="form-group">
                                        <label>Thẻ tag</label>
                                        <p>
                                            <select class="js-tags form-control" name="name_tag[]" multiple="multiple">
                                                @isset($tags)
                                                    @foreach ($tags as $tag)
                                                        <option value="{{ $tag->name_tag }}"
                                                        @foreach ($article->tags()->get() as $checkTag)
                                                            @if ($checkTag->id == $tag->id)
                                                                selected
                                                            @endif
                                                        @endforeach
                                                        >{{ $tag->name_tag }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                    <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-3 -->
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                    <a href="{{ route('articles.index') }}">
                        <button type="button" class="btn btn-default">Hủy</button>
                    </a>
                </div>
            </form>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-heading">
                    <h3>Bình luận:</h3>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalAdd">Thêm bình luận</button>
                    <!-- Modal reply -->
                    <div class="modal fade" id="modalAdd" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Thêm bình luận</h4>
                                </div>
                                <form action="{{ route('comments.store') }}" method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" name="content_cmt"></textarea>
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                                            <input type="hidden" name="parent_id" value="0">
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
                </div>
                <table class="table">
                    <tbody id="show-comments">
                        @isset($comments)
                            @foreach ($comments as $comment)
                                <tr class="div-show">
                                    <td>
                                        <p>
                                            {{ $comment->user()->get()->first()->name }}
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            {{ $comment->content_cmt }}
                                        </p>
                                        <ul class="div-hidden">
                                            <li class="col-md-offset-1 col-md-3">
                                                <a href="javascript:;" data-toggle="modal" data-target="#modalRep-{{ $comment->id }}">Trả lời</a>
                                            </li>                                            
                                            <li class="col-md-3">
                                                <a href="javascript:;" data-toggle="modal" data-target="#modalEdit-{{ $comment->id }}">Chỉnh sửa</a>
                                            </li>                                            
                                            <li class="col-md-3">
                                                <a href="javascript:;" data-toggle="modal" data-target="#modalDel-{{ $comment->id }}">Xóa</a>
                                            </li>                                            
                                        </ul>
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
                                                                <input type="hidden" name="article_id" value="{{ $article->id }}">
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
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Có chắc chắn muốn xóa bình luận?</h4>
                                                    </div>
                                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                        <div class="modal-body">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <p>{{ $comment->user()->get()->first()->name }}:</p>
                                                            <p>{{ $comment->content_cmt }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection
@section('script')
    <script src="{{ url('public/admin/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ url('public/admin/plugins/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            autoclose: true,
            todayBtn: true,
            startDate: "2017-01-01 00:00",
            minuteStep: 5
        });
        $(".js-tags").select2({
            tags: true
        })
    </script>
@endsection
