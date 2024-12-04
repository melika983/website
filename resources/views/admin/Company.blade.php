@extends('admin.master')
@section('header-scripts')
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
@stop

@section('content')
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6" style="text-align: right;">
                        <h2>مدیریت شرکت ها</h2>
                    </div>
                </div>
            </div>

            <div class="container">
                <button type="button" id="btnAddNewCompany" class="btn btn-primary">+افزودن شرکت</button>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>
                        کد
                    </th>
                    <th>نام شرکت</th>
                    <th>ادرس</th>
                    <th>نام رابط</th>
                    <th>سمت رابط</th>
                    <th>تلفن رابط</th>
                    <th>توضیحات</th>
                    <th colspan="2">عملیات</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($Company as $item)
                    <tr>
                        <td>
                            {{$item->id}}
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->contact_name }}</td>
                        <td>{{ $item->contact_position }}</td>
                        <td>{{ $item->contact_phone }}</td>
                        <td>{!! $item->description !!}</td>
                        <td>
                            <a href="#" data-id="{{ $item->id }}"
                               class="btn btn-primary btn-sm btn-edit text-white">ویرایش</a>
                        </td>
                        <td>
                            <a href="#" data-id="{{ $item->id }}"
                               class="btn btn-danger btn-sm btn-delete text-white">حذف</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $Company->links('admin.pagination') }}
        </div>
    </div>
@stop
@section('scripts')
    <div id="deleteCompanyModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{url('/admin/Company/delete')}}">
                    @csrf
                    <input type="hidden" name="id" id="id" value=""/>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">حذف شرکت</h4>
                    </div>
                    <div class="modal-body">
                        <p>آیااز حذف شرکت مطمین هستید ؟</p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="انصراف">
                        <input type="submit" class="btn btn-danger" value="حذف">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editeCompanyModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('admin/Company')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="idKey" value=""/>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">ثبت شرکت</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editCompanyId" name="editCompanyId" value="">

                        <div class="form-group">
                            <label for="name">نام شرکت</label>
                            <input name="name" id="name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="uuid">کد اختصاصی(یک رشته)</label>
                            <input name="uuid" id="uuid" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">ادرس</label>
                            <input  name="address" id="address" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_name">نام رابط</label>
                            <input name="contact_name" id="contact_name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="contact_position">سمت رابط</label>
                            <input name="contact_position" id="contact_position" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="contact_phone">تلفن رابط</label>
                            <input name="contact_phone" id="contact_phone" type="tel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">توضیحات</label>
                            <textarea id="description" style="width: 500px" name="description" type="text" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="انصراف">
                        <input type="submit" class="btn btn-success" value="ثبت">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#btnAddNewCompany").on('click', function () {
            // تنظیم فرم به حالت جدید
            $("#id").val('');
            $("#idKey").val('');
            $("#name").val('');
            $("#description").val('');
            $("#address").val('');
            $("#contact_name").val('');
            $("#contact_position").val('');
            $("#contact_phone").val('');
            $("#uuid").val('');
            editor.setData('');

            $("#editeCompanyModal").modal('show');
        });

        $(".btn-delete").on('click', function () {
            $("#id").val($(this).attr('data-id'));
            $("#deleteCompanyModal").modal('show');
        });

        // فرم حذف شرکت
        $("#deleteCompanyModal form").on('submit', function (event) {
            event.preventDefault();  // جلوگیری از ارسال فرم به صورت پیش‌فرض

            var formData = new FormData(this);  // جمع‌آوری داده‌ها
            $.ajax({
                type: 'POST',
                url: '{{url('/admin/company/delete')}}',  // مسیر صحیح برای حذف
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: "حذف موفقیت‌آمیز",
                        text: "شرکت با موفقیت حذف شد.",
                        icon: "success"
                    }).then(() => {
                        $("#deleteCompanyModal").modal('hide');
                        location.reload();  // صفحه رفرش می‌شود
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "خطا",
                        text: "در حذف شرکت مشکلی پیش آمد.",
                        icon: "error"
                    });
                }
            });
        });

        // فرم ویرایش یا اضافه کردن شرکت
        $(".btn-edit").on('click', function () {
            let companyId = $(this).attr('data-id');
            $("#idKey").val(companyId);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                type: 'GET',
                data: { id: companyId },
                url: '{{env('SITE_URL').'/admin/company/'}}' + companyId,
                success: function (data) {
                    // پر کردن فیلدهای فرم با داده‌های دریافتی
                    $("#name").val(data.name);
                    $("#description").val(data.description);
                    $("#address").val(data.address);
                    $("#contact_name").val(data.contact_name);
                    $("#contact_position").val(data.contact_position);
                    $("#contact_phone").val(data.contact_phone);
                    $("#uuid").val(data.uuid);

                    editor.setData(data.description);
                },
                error: function() {
                    Swal.fire({
                        title: "خطا",
                        text: "در بارگذاری اطلاعات شرکت مشکلی پیش آمد.",
                        icon: "error"
                    });
                }
            });

            $("#editeCompanyModal").modal('show');
        });

        var editor;

        function createEditor() {
            if (editor) {
                return;
            }

            var editorId = "description";
            var element = $("#" + editorId);
            var html = element.val();

            editor = CKEDITOR.replace(editorId, {
                language: 'fa',
                extraPlugins: 'html5video,imagebrowser',
                imageBrowser_listUrl: '<?php url("admin/api/FileUpload/json"); ?>',
                removeDialogTabs: 'image:advanced',
                font_names: 'Yekan;shabnam;Arial/Arial;monospace;Tahoma;Times New Roman;Verdana',
                height: 450,
                filebrowserUploadUrl: '<?php url("admin/api/FileUpload/upload"); ?>',
                filebrowserUploadMethod: 'form',
                imageUploadURL: '<?php url("admin/api/FileUpload/upload"); ?>',
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

            editor.setData(html);
        }

        function removeEditor() {
            if (!editor)
                return;

            // ذخیره محتوای ویرایشگر در فیلد متن
            $("#description").val(editor.getData());

            // Destroy کردن ویرایشگر
            editor.destroy();
            editor = null;
        }

        $(document).ready(function () {
            var e = CKEDITOR.instances["description"];
            if (e) {
                e.destroy(true);
            }
            editor = null;
            createEditor();
        });

        // ذخیره یا ویرایش اطلاعات شرکت
        $("form").on('submit', function (event) {
            event.preventDefault();  // جلوگیری از ارسال فرم به صورت پیش‌فرض

            var formData = new FormData(this);  // جمع‌آوری داده‌ها
            $.ajax({
                type: 'POST',
                url: '{{url('admin/Company')}}',  // مسیر ذخیره‌سازی یا ویرایش اطلاعات
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: "عملیات موفقیت‌آمیز",
                        text: "اطلاعات شرکت با موفقیت ذخیره شد!",
                        icon: "success"
                    }).then(() => {
                        $("#editeCompanyModal").modal('hide');
                        location.reload();  // رفرش کردن صفحه برای نمایش داده‌های جدید
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

    </script>

@stop
