<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title">
                <i class="fa fa-google-wallet" aria-hidden="true"></i>
                <span>My Survey</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img class="img-circle profile_img" src="{{ asset('image/admin.png') }}" alt="Avatar"
                     title="Change the avatar">
            </div>
            <div class="profile_info">
                <span>Xin chào</span>
                <h2>{{ Auth::user()->username }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu"
             class="main_menu_side hidden-print main_menu">
            <div class="menu_section">

                <ul class="nav side-menu">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> Trang chủ </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-outdent"></i> Quản lý môn học
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="#">Thêm môn học</a></li>
                            <li><a href="#">Danh sách môn học</a></li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-align-right"></i> Quản lý survey
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="#">Thêm survey</a></li>
                            <li><a href="#">Danh sách survey</a></li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-newspaper-o"></i> Quản lý sinh viên
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="#">Danh sách sinh viên</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Website" href="#"> <span
                        class="glyphicon glyphicon-globe" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top"
               title=""> <span class="glyphicon glyphicon-fullscreen"
                               aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title=""> <span
                        class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Thoát"
               href="#"> <span class="glyphicon glyphicon-off"
                               aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>