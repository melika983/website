@extends('admin.master')

@section('header-scripts')
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
    <script src="{{url('assets/js-admin/persianDatepicker.min.js')}}"></script>

    <link href="{{env('SITE_URL')}}/assets/css-admin/persianDatepicker-default.css" rel="stylesheet">

@stop

@section('content')
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6" style="text-align: right;">
                        <h2>مدیریت جوایز</h2>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>

            <div class="container">
                <button type="button" id="btnAddNewReward" class="btn btn-primary">+افزودن جایزه</button>
            </div>

            <table class="table table-striped table-hover text-center">
                <thead>
                <tr>
                    <th>
                      کد
                    </th>
                    <th>عنوان جایزه</th>
                    <th>توضیحات جایزه</th>
                    <th>آیدی شرکت</th>
                    <th>ساعت شروع</th>
                    <th>ساعت پایان</th>
                    <th>تعداد جوایز</th>
                    <th>تعداد جایزه های رزور شده</th>
                    <th style="width: 310px">عملیات</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($Reward as $item)
                    <tr>
                        <td>
                            {{$item->id}}
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{!!$item->description !!}</td>
                        <td>{{ $item->company_id }}</td>
                        <td>{{ \Morilog\Jalali\Jalalian::forge($item->start_dt)->format('Y-m-d H:i:s') }}</td>
                        <td>{{ \Morilog\Jalali\Jalalian::forge($item->end_dt)->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ $item->total_emergency }}</td>

                        <td>
                            <a href="#" data-id="{{ $item->id }}"
                               class="btn btn-primary btn-sm text-white btn-edit">ویرایش</a>
                            <a href="#" data-id="{{ $item->id }}"
                               class="btn btn-danger btn-sm text-white btn-delete">حذف</a>
                            <a href="{{url('admin/reward/details/'.$item->id)}}" data-id="{{ $item->id }}"
                               class="btn btn-info btn-sm text-white">جزییات جوایز</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        {{ $Reward->links('admin.pagination') }}
    </div>
@stop

@section('scripts')
    <div id="editRewardModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content text-right">
                <form method="POST" action="{{url('/admin/reward/store')}}">
                    @csrf
                    <input type="hidden" name="id" id="idKey" value=""/>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">ویرایش جایزه</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name"> عنوان جایزه</label>
                                <input type="text" name="name" id="name" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="company_id">شرکت</label>
                                <select class="form-control" name="company_id" id="company_id" required>
                                    <option value="">انتخاب کنید </option>
                                    @foreach(\App\Models\Company::query()->pluck('name','id') as $k=>$v)
                                        <option value="{{$k}}">{{$v}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="start_dt">ساعت شروع</label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" autocomplete="off" name="start_d" id="start_d" class="form-control" value="">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="time" name="start_t" id="start_t" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="end_dt">ساعت پایان</label>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" autocomplete="off" name="end_d" id="end_d" class="form-control" value="">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="time" name="end_t" id="end_t" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total">تعداد جوایز</label>
                                <input type="text" name="total" id="total" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="total_emergency">تعداد جایزه های رزور شده</label>
                                <input type="text" name="total_emergency" id="total_emergency" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">توضیحات جایزه</label>
                                <textarea type="text" name="description" id="description"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="انصراف">
                            <input type="submit" class="btn btn-info" value="ذخیره">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="deleteRewardModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{url('/admin/reward/delete')}}">
                    @csrf
                    <input type="hidden" name="id" id="id" value=""/>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">حذف شرکت</h4>
                    </div>
                    <div class="modal-body">
                        <p>آیااز حذف جایزه مطمین هستید ؟</p>
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
        $("#btnAddNewReward").on('click',function () {
            $("#id").val('');
            $("#idKey").val('');
            $("#name").val('');
            $("#description").val('');
            $("#company_id").val('');
            $("#start_dt").val('');
            $("#end_dt").val('');
            $("#total").val('');
            $("#total_emergency").val('');
            editor.setData('');

            $("#editRewardModal").modal('show');
        });
        $(".btn-delete").on('click',function () {
            $("#id").val($(this).attr('data-id'));
            $("#deleteRewardModal").modal('show');
        });
        $(".btn-edit").on('click',function () {
            let rewardId = $(this).attr('data-id');
            $("#idKey").val(rewardId);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                type: 'GET',
                data: {
                    id: rewardId
                },
                url: '{{env('SITE_URL').'/admin/reward/'}}' + rewardId,
                success: function (data) {
                    $("#name").val(data.name);
                    $("#description").val(data.description);
                    $("#company_id").val(data.company_id);
                    $("#start_t").val(data.start_t);
                    $("#end_t").val(data.end_t);
                    $("#start_d").val(data.start_d);
                    $("#end_d").val(data.end_d);
                    $("#total").val(data.total);
                    $("#total_emergency").val(data.total_emergency);

                    editor.setData(data.description);
                    //$("#").val(data.total);
                }
            });

            $("#editRewardModal").modal('show');
        });

        var editor;

        function createEditor() {


            if (editor) {
                return;
            }
            var editorId = "description";
            var element = $("#" + editorId);
            var html = element.val();

            // Create a new editor inside the <div id="editor">
            editor = CKEDITOR.replace(editorId, {
                    language: 'fa',
                    extraPlugins: 'html5video,imagebrowser',
                    imageBrowser_listUrl : '<?php url("admin/api/FileUpload/json"); ?>',
                    removeDialogTabs: 'image:advanced',
                    font_names:'Yekan;shabnam;Arial/Arial;monospace;Tahoma;Times New Roman;Verdana',
                    height: 450,
                    filebrowserUploadUrl: '<?php url("admin/api/FileUpload/upload"); ?>',
                    filebrowserUploadMethod: 'form',
                    imageUploadURL: '<?php url("admin/api/FileUpload/upload"); ?>',
                }
            );
            $.fn.modal.Constructor.prototype._enforceFocus = function () {
                modal_this = this;
                $(document).on('focusin', function (e) {
                    //modal_this.element[0] !== e.target &&
                    if (modal_this && modal_this.element && !modal_this.element.has(e.target).length
                        && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select')
                        && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                        modal_this.element.focus()
                    }
                })
            };
            editor.setData(html);
        }

        function removeEditor() {
            if (!editor)
                return;

            // Retrieve the editor contents. In an Ajax application, this data would be
            // sent to the server or used in any other way.
            $("#description").val(editor.getData());
            //document.getElementById( 'editorcontents' ).innerHTML = editor.getData();
            //document.getElementById( 'contents' ).style.display = '';

            // Destroy the editor.
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

            $("#end_d, #start_d").persianDatepicker({
                formatDate: "YYYY-MM-DD",
            });

        });
    </script>

@stop
