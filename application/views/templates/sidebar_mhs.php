<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"><br>
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon">
                <img style="width: 120px;
          height: 70px;
          position:center;
          width: 70px;
          border-radius: 50%;
          overflow: hidden;
          margin: 0 auto;" src="<?= base_url('assets/login/images/stit.jpeg') ?>">
            </div>
            <div class="sidebar-brand-text mx-3">STIT FATAHILLAH </div>
        </a>
        <br>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Akademik
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link" href="biodata">
                <i class="fas fa-user"></i>
                <span>Profile</span></a>
        </li>
        <!-- Nav Item - Mahasiswa  Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemhs" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-list"></i>
                <span>Custom Mahasiswa</span>
            </a>
            <div id="collapsemhs" class="collapse" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Mahasiswa :</h6>
                    <a class="collapse-item" href="krs">KRS</a>
                    <a class="collapse-item" href="khs">KHS</a>
                    <a class="collapse-item" href="download">Download Modul</a>
                </div>
            </div>
        </li>
</div>
<!-- End of Sidebar -->
