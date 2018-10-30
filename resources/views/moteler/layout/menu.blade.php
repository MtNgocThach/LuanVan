<div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="moteler/catalogue_room/list">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">Loại Phòng</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="moteler/motels/list">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">Nhà Trọ</span>
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
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-fw "></i>Xin Chào: {{ $user_L->username }}</a>
              </li>
              <li class="nav-item nav-link">|</li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-fw fa-sign-out"></i>Đăng xuất</a>
              </li>
            
          @endif
        </ul>
      </div>


