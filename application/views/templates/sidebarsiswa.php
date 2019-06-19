

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user');?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-book-open"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SisRank</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!--Query Menu-->
      <?php
        //$role_id = $this->session->userdata('role_id');
        //   $queryMenu = "SELECT 'side_menu'.'id','menu'
        //                 FROM 'side_menu' JOIN 'side_access_menu'
        //                 ON 'side_menu'.'id' = 'side_access_menu'.'menu_id'
        //                 WHERE 'side_access_menu'.'role_id' = $role_id
        //                 ORDER BY 'side_access_menu'.'menu_id' ASC
        //                 ";
        // $menu = $this->db->query($queryMenu)->result_array();
        // var_dump($menu);
        // die;
        //$this->db->select('side_menu.id, menu');
        //$this->db->from('side_menu');
        //$this->db->join('side_access_menu','side_access_menu.menu_id = side_menu.id');
        //$this->db->where('side_access_menu.role_id',$role_id);
        //$this->db->order_by('side_access_menu.menu_id','DSC');
        //$query = $this->db->get();
        //$resutl = $query->result_array();
      ?>




      <!-- Heading -->
      
        <div class="sidebar-heading my-0">
          Siswa
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user');?>">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Halaman Utama Siswa</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/kelas');?>">
              <i class="fas fa-fw fa-school"></i>
              <span>Lihat Kelas</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/tugasindividu');?>">
              <i class="fas fa-fw fa-file"></i>
              <span>Tugas Individu</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/lihatkelompok');?>">
              <i class="fas fa-fw fa-user-friends"></i>
              <span>Lihat Kelompok</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/tugaskelompok');?>">
              <i class="fas fa-fw fa-users"></i>
              <span>Tugas Kelompok</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/nilai');?>">
              <i class="fas fa-fw fa-layer-group"></i>
              <span>List Nilai</span></a>
          </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading 
      <div class="sidebar-heading my-0">
        User
      </div>

      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-user"></i>
          <span>Profilku</span></a>
      </li>-->

      <!-- Nav Item - Pages Collapse Menu
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>

       Nav Item - Utilities Collapse Menu 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>

       Divider 
      <hr class="sidebar-divider">

       Heading 
      <div class="sidebar-heading">
        Addons
      </div>

       Nav Item - Pages Collapse Menu 
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

       Nav Item - Charts 
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

       Nav Item - Tables 
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> 

       Divider 
      <hr class="sidebar-divider d-none d-md-block">-->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->