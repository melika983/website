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
                <button type="button" id="btnAddNewReward" class="btn btn-primary">+افزودن از فایل</button>
                <a href="{{url("admin/reward/report/".request()->id)}}" id="btnDownloadExcel" class="btn btn-dark">دریافت
                    فایل برندگان</a>

                <div class="row">
                    <div class="col-lg-3">
                        <label class="float-right">تعداد کل: {{$items->total()}}</label>
                    </div>
                    <div class="col-lg-3">
                        تعداد استفاده شده :{{$usedCount}}
                    </div>

                </div>
            </div>

            <table class="table table-striped table-hover text-center">
                <thead>
                <tr>
                    <th>
                        کد
                    </th>
                    <th>استفاده شده</th>
                    <th>کاربر</th>
                    <th>تلفن</th>
                    <th>کد جایزه</th>
                    <th>اسم جایزه</th>
                    <th>زمان شانس</th>
                    <th>اضطراری</th>
                    <th colspan="2">عملیات</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($items as $item)
                    <tr>
                        <td>
                            {{$item->id}}
                        </td>
                        <td>{!!$item->is_used ? '<span class="text-success">بله</span>' : '<span class="text-danger">خیر</span>' !!}</td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->phone }}</td>

                        <td>{{$item->reward_code}}</td>
                        <td>{{ $item->reward }}</td>
                        <td>{{ \Morilog\Jalali\Jalalian::forge($item->random_dt)->format('Y-m-d H:i:s') }}</td>
                        <td>{!!$item->is_emergency ? '<span class="text-success">بله</span>' : '<span class="text-danger">خیر</span>' !!}</td>
                        <td>
                            <a href="#" data-id="{{ $item->id }}"
                               class="btn btn-danger btn-sm text-white btn-delete">حذف</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        {{ $items->links('admin.pagination') }}
    </div>
@stop

@section('scripts')
    <div id="editRewardModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content text-right">
                <form method="POST" action="{{url('/admin/reward_detail/store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="reward_id" id="reward_id" value="{{request()->id}}"/>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">ثبت جوایز از فایل</h4>
                    </div>
                    <div class="modal-body">
                        <div>توجه:</div>

                        <ul>
                            <li>فایل باید با فرمت xlsx باشد.</li>
                            <li>ستون اول باید شامل عنوان جایزه باشد.</li>
                            <li>ستون دوم باید شامل کد جایزه باشد.</li>
                        </ul>

                        <div class="form-group">
                            <label for="start_dt">زمان شروع</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text"  autocomplete="off" name="start_d" id="start_d" class="form-control" value="">
                                </div>
                                <div class="col-lg-6">
                                    <input type="time" name="start_t" id="start_t" class="form-control" value="16:30:00">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end_dt">زمان پایان</label>

                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text"  autocomplete="off" name="end_d" id="end_d" class="form-control" value="">
                                </div>
                                <div class="col-lg-6">
                                    <input type="time" name="end_t" id="end_t" class="form-control" value="22:00:00">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="excelFile">انتخاب فایل اکسل</label>
                            <input type="file" name="excelFile" id="excelFile"></input>
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
    <div id="deleteRewardModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{url('/admin/reward_detail/delete')}}">
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
        $("#btnAddNewReward").on('click', function () {

            $("#editRewardModal").modal('show');
        });
        $(".btn-delete").on('click', function () {
            $("#id").val($(this).attr('data-id'));
            $("#deleteRewardModal").modal('show');
        });
        $(".btn-edit").on('click', function () {
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
                    editor.setData(data.description);
                    //$("#").val(data.total);
                }
            });

            $("#editRewardModal").modal('show');
        });

        $(document).ready(function () {
            $("#end_d, #start_d").persianDatepicker({
                formatDate: "YYYY-MM-DD",
            });

        });
    </script>

@stop
