<div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <?php
                $user_L = Auth::user();
                if($user_L->username != "admin"){
            ?>

            {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">--}}
                {{--<a class="nav-link" href="moteler/catalogue_room/list">--}}
                  {{--<i class="fa fa-fw fa-dashboard"></i>--}}
                  {{--<span class="nav-link-text">Loại Phòng</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="moteler/motels/list">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Nhà Trọ</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="moteler/rooms/list">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Phòng trọ</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="moteler/services/list">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dịch vụ</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="moteler/profile/info">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Thông tin</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="moteler/sales/list">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Thanh Toán Trọ</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard" style="margin-left: 8px;">
                <div class="dropdown">
                    <a data-toggle="dropdown" class="nav-link">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Thanh Toán</span>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="background: #0c5460">
                        <li role="presentation" class="nav-link-text">
                            <a role="menuitem" tabindex="-1" href="moteler/sales/list" class="nav-link">Lập hoá đơn</a>
                        </li>
                        <li role="presentation" class="nav-link-text">
                            <a role="menuitem" tabindex="-1" href="moteler/sales/listBills" class="nav-link">Danh sách</a>
                        </li>
                    </ul>
                </div>
            </li>

          <?php }else{ ?>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="admin/account/list">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Tài Khoản</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="admin/account/listMotels">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Phòng trọ</span>
                    </a>
                </li>
          <?php } ?>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
  
  
        <ul class="navbar-nav ml-auto">
         
          <!-- <li class="nav-item">
            <form class="form-inline my-2 my-lg-0 mr-lg-2">
              <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for...">
                <span class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </li> -->
          <?php $user_L = Auth::user() ?>
          @if(isset($user_L))
              <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#modalLogin">
                  <i class="fa fa-fw "></i>Xin Chào: {{ $user_L->username }}</a>
              </li>
              <li class="nav-item nav-link">|</li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#modalLogin">
                  <i class="fa fa-fw fa-sign-out"></i>Đăng xuất</a>
              </li>
            
          @endif
        </ul>
      </div>


