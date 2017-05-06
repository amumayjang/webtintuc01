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
                                        <label>Tiêu đề:</label>
                                        <input type="text" slug="output" class="form-control" value="{{ $article->title }}" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Đường dẫn:</label> <br>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control input-sm" value="{{ url('/') }}" disabled>
                                        </div>                                        
                                        <div class="col-lg-9">
                                            <input type="text" value="{{ $article->slug }}" class="form-control input-sm" slug="output" name="slug">
                                        </div>
                                        <p class="text-danger msg-result"></p>
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
        $(document).ready(function() {
            //make url to send ajax of checkslug function
            var url = "{{ route('articles.make-slug') }}";
            $("[slug='input']").blur(function() {
                var str = $("[slug='input']").val();
                var id = 1;
                console.log(id);
                debugger;
            })

            // $("[slug='output']").blur(function() {
            //     var str = $("[slug='output']").val();
            //     var msg = $(this).parent().parent().children("p.msg-result");
            //     var labelName = "Đường dẫn";
            //     makeSlug(url, str, msg, labelName);
            // })
        })
    </script>
@endsection
