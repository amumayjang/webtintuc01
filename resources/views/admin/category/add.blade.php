@extends('admin.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm danh mục</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Thông tin danh mục
                        </div>
                        <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-4">
                                <form role="form" action="{{ route("category.store") }}" method="post">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input class="form-control" slug="input" name="cate_name" type="text">
                                        <p class="text-danger msg-result" id="msg_cate_name"></p>
                                        @if ($errors->has('cate_name'))
                                            <p class="text-danger">{{ $errors->first('cate_name') }}</p>
                                        @endif
                                        <p class="help-block">Ví dụ: Thể thao</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Đường dẫn tĩnh</label>
                                        <input class="form-control input-sm" slug="output" name="slug" type="text">
                                        <p class="text-danger msg-result" id="msg_slug"></p>
                                        @if ($errors->has('slug'))
                                            <p class="text-danger">{{ $errors->first('slug') }}</p>
                                        @endif
                                        <p class="help-block">Ví dụ: the-thao</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục cha</label>
                                        <select name="parent_id"  class="form-control">
                                            <option value="">Lựa chọn danh mục cha...</option>
                                            @php
                                               show_cates($cates)
                                            @endphp
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                    <button type="reset" class="btn btn-danger">Xóa</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                    </div>
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
    <script type="text/javascript">
        var url = "{{ route('category.make-slug') }}";
        $(document).ready(function() {
            $("[slug='input']").blur(function() {
                var str = $("[slug='input']").val();
                var msg = $(this).parent().children("p.msg-result");
                var labelName = $(this).parent().children("label").text();
                makeSlug(url, str, msg, labelName);
            })

            $("[slug='output']").blur(function() {
                var str = $("[slug='output']").val();
                var msg = $(this).parent().children("p.msg-result");
                var labelName = $(this).parent().children("label").text();
                makeSlug(url, str, msg, labelName);
            })
        })
    </script>
@endsection
