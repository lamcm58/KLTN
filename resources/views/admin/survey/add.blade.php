@extends('admin.layouts.master')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-10 col-xs-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Thêm survey</h2>
                            <div class="clearfix"></div>
                        </div>
                        {{--Thêm survey bằng file text--}}
                        <div class="x_title">
                            <h2>Thêm bằng file</h2>
                            <br/>
                            <form action="{{ route('survey.import') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="x_panel">
                                    <input type="file" name="text_file" style="display: inline;" />
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="all"> Áp dụng cho tất cả các lớp môn học
                                        </label>
                                    </div>
                                </div>

                            </form>
                            <div class="clearfix"></div>
                        </div>

                        {{--Thêm thủ công--}}
                        <div class="x_content">
                            <h2>Thêm bằng tay</h2>
                            <br />
                            <form class="form-horizontal form-label-left" action="{{ route('survey.create') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên survey<span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" name="survey_name" class="form-control" placeholder="Tên survey" value="{{ old('survey_name') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Môn học<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="check_all" id="check"> Áp dụng cho tất cả các lớp môn học
                                            </label>
                                        </div>
                                        <select name="subject_id" id="subject_id" class="form-control">
                                            <option value="">Chọn lớp môn học</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->subject_class_code }} - {{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày hết hạn<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <fieldset>
                                            <input type="text" class="form-control has-feedback-left"
                                                   id="expired_day" placeholder="" name="expired_day">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                  aria-hidden="true">
                                        </span>
                                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $("input#expired_day").datepicker({
        minDate: 0,
        dateFormat: 'dd-mm-yy',
    }).datepicker("setDate", new Date());

    $(document).ready(function () {
        $('#check').on('change', function() {
            if($(this).is(":checked")) {
                $('#subject_id').prop('disabled', true);
            } else {
                $('#subject_id').prop('disabled', false);
            }
        });
    });
</script>
@endsection
