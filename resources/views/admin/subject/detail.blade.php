@extends('admin.layouts.master')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-xs-12">
                    <div class="x_panel">
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
                        <div class="x_title">
                            <h2><h4>{{ str_replace(' ', '', $subject->subject_class_code) }}
                                    - {{ $subject->name }} - {{ $subject->teacher_name }}</h4></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="{{ route('subject.addSurvey', $subject->id) }}" method="post">
                                {{ csrf_field() }}
                                <h3>Thêm survey cho môn học</h3>
                                <div class="col-md-6">
                                    <select name="survey_id" id="" class="form-control" required>
                                        <option value="">Chọn survey</option>
                                        @foreach($surveys as $survey)
                                            <option value="{{ $survey->id }}">{{ $survey->survey_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </form>
                            <hr>
                            @if(isset($selected))
                                <h3>Danh sách survey</h3>
                                <hr>
                                <ul>
                                    <li><a href="#"><h4>{{ $selected->survey_name }}</h4></a></li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
