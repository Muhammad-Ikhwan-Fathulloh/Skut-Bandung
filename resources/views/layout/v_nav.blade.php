 <!-- Nav Item - Dashboard -->
      <li class="nav-item {{request()->is('dashboard')?'active':''}}">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- <li class="nav-item {{request()->is('register')?'active':''}}">
        <a class="nav-link" href="/register">
          <i class="fas fa-fw fa-user"></i>
          <span>Register User</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-home"></i>
          <span>Blog</span></a>
      </li>
      <li class="nav-item {{request()->is('fitur')?'active':''}}">
        <a class="nav-link" href="/fitur">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Fitur</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{request()->is('pengguna')?'active':''}}">
        <a class="nav-link" href="/pengguna">
          <i class="fas fa-fw fa-user"></i>
          <span>Pengguna</span></a>
      </li>

      <li class="nav-item {{request()->is('pengelola')?'active':''}}">
        <a class="nav-link" href="/pengelola">
          <i class="fas fa-fw fa-user"></i>
          <span>Pengelola</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{request()->is('wisata')?'active':''}} {{request()->is('transaksi')?'active':''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-list"></i>
          <span>Wisata</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/wisata">Destinasi</a>
            <a class="collapse-item" href="/transaksi">Transaksi</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      
      

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->