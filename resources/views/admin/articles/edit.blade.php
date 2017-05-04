@extends('admin.layouts.master')
@section('head')
    <link rel="stylesheet" href="{{ url('public/admin/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ url('public/admin/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css') }}">
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
                                        <label>Tiêu đề:</label>
                                        <input type="text" class="form-control" value="{{ $article->title }}" name="title">
                                    </div>
                                </div>
                                <div class="panel-body">
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
                                                <option value="">Lựa chọn danh mục...</option>
                                                @php
                                                   show_cates($cates, $article->cate()->get()->first()->id)
                                                @endphp
                                            </select>
                                        @endisset
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <img src="{{ url('public/admin/uploads/images/thumbnail-articles/'.$article->imgThumb) }}" class="img-thumbnail" width="300" height="300">
                                        <p class="help-block">Thay ảnh</p>
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
                                        <input type="text" value="{{ $tags }}" class="form-control" name="name_tags" data-role="tagsinput" />
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
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-default">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection
@section('script')
    <script src="{{ url('public/admin/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ url('public/admin/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".form_datetime").datetimepicker({
                format: "yyyy-mm-dd hh:ii",
                autoclose: true,
                todayBtn: true,
                startDate: "2017-01-01 00:00",
                minuteStep: 5
            });
        })
    </script>
@endsection
