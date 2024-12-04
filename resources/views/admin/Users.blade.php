@extends('admin.master')
@section('header-scripts')
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
@stop
@section('content')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6" style="text-align: right;">
                            <h2>مدیریت کاربران</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <button type="button" id="btnAddNewUsers" class="btn btn-primary">+افزودن کاربر</button>

                    <a href="{{url("admin/users/report_excel")}}" class="btn btn-dark">دریافت
                        فایل کاربران</a>

                </div>
                <table class="table table-striped table-hover text-center" dir="rtl">
                    <thead>
                    <tr>
                        <th>
                            کد
                        </th>
                        <th>نام و نام خانوادگی</th>
                        <th>شماره همراه</th>
                        <th>ادمین</th>
                        <th>تایید شده</th>
                        <th colspan="2">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($User as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{ $item->fullname }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->is_admin }}</td>
                            <td>{{ $item->is_verified }}</td>
                            <td>
                                <a href="#editEmployeeModal" data-id="{{ $item->id }}"
                                   data-toggle="modal"
                                   class="btn btn-primary btn-sm btn-edit text-white">ویرایش</a>
                            </td>
                            <td>
                                <a href="#deleteUserModal" data-id="{{ $item->id }}" data-toggle="modal"
                                   class="btn btn-danger btn-sm btn-delete text-white">حذف</a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

                {{ $User->links('admin.pagination') }}
            </div>
        </div>
    </div>

@stop
@section('scripts')
    <div id="editUserModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('admin/Users')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="idUsers" value=""/>
                    <div class="modal-header">
                        <h4 class="modal-title">ویرایش کاربر</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group text-right">
                            <label>نام و نام خانوادگی</label>
                            <input type="text" name="fullname" id="fullname"  class="form-control" >
                        </div>
                        <div class="form-group text-right">
                            <label>شماره همراه</label>
                            <input type="tel" name="phone" id="phone" class="form-control" >
                        </div>
                        <div class="form-group text-right">
                            <label>ادمین</label>
                            <select name="is_admin" id="is_admin" class="form-control">
                                <option value="0">خیر</option>
                                <option value="1">بله</option>
                            </select>
                        </div>
                        <div class="form-group text-right">
                            <label>رمزعبور</label>
                            <input type="password" name="password" id="password" class="form-control" >
                        </div>
                        <div class="form-group text-right">
                            <label>تایید شده</label>
                            <select name="is_verified" id="is_verified" class="form-control">
                                <option value="0">خیر</option>
                                <option value="1">بله</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="انصراف">
                        <input type="submit" class="btn btn-info" value="ذخیره">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteUserModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST" action="{{url('/admin/Users/delete')}}">
                    @csrf
                    <input type="hidden" name="id" id="id" value=""/>
                    <div class="modal-header">
                        <h4 class="modal-title">حذف کاربر</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>آیا از حذف کاربر مطمین هستید ؟</p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="انصراف">
                        <input type="submit" class="btn btn-danger" value="حذف">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>

        $("#btnAddNewUsers").on('click', function () {
            $("#idUsers").val('');
            $("#fullname").val('');
            $("#phone").val('');
            $("#is_admin").val('');
            $("#is_verified").val('0');
            $("#password").val('');
            // editor.setData('');
            $("#editUserModal").modal('show');
        });
        $(".btn-delete").on('click', function () {
            $("#id").val($(this).attr('data-id'));
            $("#deleteUserModal").modal('show');
        });

        $("#deleteUserModal form").on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: '{{url('/admin/Users/delete')}}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: "حذف موفقیت‌آمیز",
                        text: "کاربر با موفقیت حذف شد.",
                        icon: "success"
                    }).then(() => {
                        $("#deleteUserModal").modal('hide');
                        location.reload(); // Refresh page
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "خطا",
                        text: "در حذف کاربر مشکلی پیش آمد.",
                        icon: "error"
                    });
                }
            });
        });

        $(".btn-edit").on('click', function () {
            let UsersId = $(this).attr('data-id');
            $("#idUsers").val(UsersId);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                type: 'GET',
                data: {
                    id: UsersId
                },
                url: '{{env('SITE_URL').'/admin/Users/'}}' + UsersId,
                success: function (data) {
                    $("#fullname").val(data.fullname);
                    $("#phone").val(data.phone);
                    $("#is_admin").val(data.is_admin);
                    $("#is_verified").val(data.is_admin);
                    $("#password").val(data.password);
                 }
            });
            $("#editUserModal").modal('show');
        });
        $("form").on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: '{{url('admin/Users')}}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: "عملیات موفقیت‌آمیز",
                        text: "اطلاعات کاربر با موفقیت ذخیره شد!",
                        icon: "success"
                    }).then(() => {
                        $("#editUserModal").modal('hide');
                        location.reload(); // Refresh page
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "خطا",
                        text: "در ذخیره اطلاعات مشکلی پیش آمد.",
                        icon: "error"
                    });
                }
            });
        });

        function createEditor() {
            if (editor) {
                return;
            }

            // var editorId = "description";
            var element = $("#" + editorId);
            var html = element.val();

            editor = CKEDITOR.replace(editorId, {
                language: 'fa',
                extraPlugins: 'html5video,imagebrowser',
                imageBrowser_listUrl: '{{ url("admin/api/FileUpload/json") }}',
                removeDialogTabs: 'image:advanced',
                font_names: 'Yekan;shabnam;Arial/Arial;monospace;Tahoma;Times New Roman;Verdana',
                height: 450,
                filebrowserUploadUrl: '{{ url("admin/api/FileUpload/upload") }}',
                filebrowserUploadMethod: 'form',
                imageUploadURL: '{{ url("admin/api/FileUpload/upload") }}',
            });

            $.fn.modal.Constructor.prototype._enforceFocus = function () {
                modal_this = this;
                $(document).on('focusin', function (e) {
                    if (modal_this && modal_this.element && !modal_this.element.has(e.target).length
                        && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select')
                        && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                        modal_this.element.focus();
                    }
                });
            };
         }

        function removeEditor() {
            if (!editor)
                return;

            // $("#description").val(editor.getData());
            editor.destroy();
            editor = null;
        }
    </script>
@stop






