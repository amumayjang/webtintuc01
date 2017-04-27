@extends('admin.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa danh mục</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Cập nhật thông tin danh mục
                        </div>
                        <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-4">
                                <form role="form" action="{{ route("category.update", $cate->id) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input class="form-control" value="{{ $cate->cate_name }}" name="cate_name" type="text">
                                        @if ($errors->has('cate_name'))
                                            <p class="text-danger">{{ $errors->first('cate_name') }}</p>
                                        @endif
                                        <p class="help-block">Ví dụ: Thể thao</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục cha</label>
                                        <select name="parent_id"  class="form-control">
                                            <option value="">Lựa chọn danh mục cha...</option>
                                            @php
                                               show_cates($cates, $cate->parent_id)
                                            @endphp
                                        </select>
                                        @if ($errors->has('parent_id'))
                                            <p class="text-danger">{{ $errors->first('parent_id') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="description" class="form-control">{{ $cate->description }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    <a href="{{ route('category.index') }}">
                                        <button type="reset" class="btn btn-danger">Hủy</button>
                                    </a>
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
@stop