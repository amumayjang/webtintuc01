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
            <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
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
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Đường dẫn:</label>
                                        <input type="text" class="form-control input-sm" name="slug">
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <textarea name="content"></textarea>
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
                                                   show_cates($cates)
                                                @endphp
                                            </select>
                                        @endisset
                                        <p>
                                            <a href="javascript:;">Thêm danh mục</a>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <input type="file" name="thumbnail_image">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"><i class="fa fa-calendar"></i>Thời gian xuất bản
                                        </label>
                                        <div class="input-group date form_datetime" data-date="2017-01-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                            <input class="form-control" size="16" type="text" value="{{ $time }}" readonly>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" /><br/>
                                    </div>
                                    <div class="form-group">
                                        <label>Bài viết hot</label> <br>
                                            <div class="radio">
                                                <label><input type="radio" name="hot" value="1">Có
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" checked name="hot" value="0">Không
                                                </label>
                                            </div>
                                    <div class="form-group">
                                        <label>Thẻ tag</label>
                                        <p>
                                            <select class="js-example-tags form-control" name="name_tag[]" multiple="multiple">
                                                @isset($tags)
                                                    @foreach ($tags as $tag)
                                                        <option value="{{ $tag->name_tag }}">{{ $tag->name_tag }}</option>
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
            format: "dd MM yyyy - hh:ii",
            autoclose: true,
            todayBtn: true,
            startDate: "2017-01-01 10:00",
            minuteStep: 5
        });
        $(".js-example-tags").select2({
            tags: true
        })
    </script>
@endsection
