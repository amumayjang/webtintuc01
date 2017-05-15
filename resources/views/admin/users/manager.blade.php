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
                <h1 class="page-header">Quản lý thành viên</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Danh sách thành viên
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <input type="checkbox" id="checkAll">
                                    </th>
                                    <th class="text-center">Họ và tên</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Vai trò</th>
                                    <th class="text-center">Ngày tham gia</th>
                                    <th class="text-center">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                            @isset ($users)
                                @foreach ($users as $user)
                                    <tr class="odd gradeX" id="{!! $user->id !!}">
                                        <td class="text-center">
                                            <input value="{!! $user->id !!}" type="checkbox" class="checkOne">
                                        </td>
                                        <td class="center">{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center" id="role-{!! $user->id !!}">{{ $user->role()->get()->first()->role_name }}</td>
                                        <td class="text-center">{{ $user->created_at }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('users.edit', $user->id) }}">
                                                <button type="button" class="btn btn-info">Sửa</button>
                                            </a>                                        
                                            <button type="button" data-toggle="modal" data-target="#myModal-{{ $user->id }}" class="btn btn-danger">Xóa</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal-{{ $user->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Bạn có chắc muốn xóa người dùng?</h4>
                                                        </div>
                                                        <form action="{{ route('users.delete', $user->id) }}" method="post">
                                                            <div class="modal-body">
                                                                <label>{{ $user->name }}</label>
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="id" value="{{ $user->id }}">
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
                            <button class="btn btn-success" id="submitDelete" type="button">Đồng ý</button>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <select id="actionChange" class="form-control">
                                    <option selected value="">Thay đổi vai trò...</option>
                                    @php
                                        show_roles($cates)
                                    @endphp
                                </select>
                            </div>
                            <button class="btn btn-primary" id="submitChange" type="button">Thay đổi</button>
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
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });

        var url = "{{ route('users.del-list') }}";
        deleteListId(url);

        $("#submitChange").click(function () {
            var ok = confirm("Xác nhận thay đổi vai trò của người dùng đã chọn?");
            if (ok) {
                var role = $("#actionChange").val();
                var nameRole = $("option[value='"+ role +"']").text();
                var listIdUser = [];
                var index = 0;
                $(":checkbox.checkOne").each(function () {
                    if ($(this).is(":checked")) {
                        listIdUser[index] = $(this).val();
                        index++;
                    }
                })
                if ((listIdUser[0] != null)&&(role != "")) {
                    $.ajax({
                        url: "{{ route('users.change-role') }}",
                        data: 
                            {
                                listId: listIdUser,
                                role: role
                            },
                        dataType: "JSON",
                        type: "GET",
                        success: function (rp) {
                            if (rp) {
                                for (var i = 0; i < listIdUser.length; i++) {
                                    $("td#role-" + listIdUser[i]).text(nameRole);
                                }                                               
                            } 
                        }
                    })
                }
            }
        })
    });
    </script>
@endsection
