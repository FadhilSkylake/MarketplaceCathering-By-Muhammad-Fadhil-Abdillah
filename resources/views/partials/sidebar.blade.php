<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="#" class="text-nowrap">
        <h1>MARKETPLACE KATERING</h1>
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Data</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/dashboard') }}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/user') }}" aria-expanded="false">
              <span>
                <i class="ti ti-user"></i>
              </span>
              <span class="hide-menu">User</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/merchant') }}" aria-expanded="false">
              <span>
                <i class="ti ti-alert-circle"></i>
              </span>
              <span class="hide-menu">Merchant</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/menu') }}" aria-expanded="false">
              <span>
                <i class="ti ti-article"></i>
              </span>
              <span class="hide-menu">Menu</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/order') }}" aria-expanded="false">
              <span>
                <i class="ti ti-cards"></i>
              </span>
              <span class="hide-menu">Order</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/invoice') }}" aria-expanded="false">
              <span>
                <i class="ti ti-file-description"></i>
              </span>
              <span class="hide-menu">Invoice</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  