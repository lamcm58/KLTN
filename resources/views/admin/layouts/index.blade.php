@extends('admin.layouts.master')

@section('content')
    <div class="right_col" role="main">
        @if(session('err'))
            <div class="alert alert-warning" role="alert">{{ session('err') }}</div>
    @endif
    <!-- top tiles -->
        <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-clone"></i> Tổng số thể loại</span>
                <div class="count">12</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-cubes"></i> Tổng số sản phẩm</span>
                <div class="count">12</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-users"></i> Tổng số khách hàng</span>
                <div class="count">12</div>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-reorder"></i> Tổng số đơn hàng</span>
                <div class="count">12</div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-dollar"></i> Tổng giá trị các đơn hàng</span>
                <div class="count">12</div>
            </div>
        </div>
        <!-- /top tiles -->
    </div>
@endsection

@section('js')
    <script>
        $('div .alert').delay(3000).slideUp();
    </script>
@endsection