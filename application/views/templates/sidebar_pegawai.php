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
      <a class="nav-link" href="dasboard">
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
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span>PROFILE</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">List Profile : </h6>
          <a class="collapse-item" href="buttons.html">Manajement</a>
          <a class="collapse-item" href="cards.html">Pegawai</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Dosen  Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-user"></i>
        <span>Dosen</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Dosen :</h6>
          <a class="collapse-item" href="dosen_pgmi">PGMI</a>
          <a class="collapse-item" href="dosen_mpi">MPI</a>
        </div>
      </div>
    </li>
    <!-- Nav Item - Mahasiswa  Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemhs" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-list"></i>
        <span>Mahasiswa</span>
      </a>
      <div id="collapsemhs" class="collapse" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Mahasiswa :</h6>
          <a class="collapse-item" href="mahasiswa_pgmi">PGMI</a>
          <a class="collapse-item" href="mahasiswa_mpi">MPI</a>
        </div>
      </div>
    </li>


    <!-- Nav Item - Prodi  Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseprodi" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-book"></i>
        <span>Program Studi</span>
      </a>
      <div id="collapseprodi" class="collapse" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Program Studi :</h6>
          <a class="collapse-item" href="prodi_pgmi">PGMI</a>
          <a class="collapse-item" href="prodi_mpi">MPI</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Matkul  Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsematkul" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-list"></i>
        <span>Matakuliah</span>
      </a>
      <div id="collapsematkul" class="collapse" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Matakuliah :</h6>
          <a class="collapse-item" href="matkul_pgmi">PGMI</a>
          <a class="collapse-item" href="matkul_mpi">MPI</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Jadwal  Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsejadwal" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-clock"></i>
        <span>Jadwal Kuliah</span>
      </a>
      <div id="collapsejadwal" class="collapse" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Jadwal Kuliah :</h6>
          <a class="collapse-item" href="jadwal_pgmi">PGMI</a>
          <a class="collapse-item" href="jadwal_mpi">MPI</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - PMB  Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepmb" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-book"></i>
        <span>Data PMB</span>
      </a>
      <div id="collapsepmb" class="collapse" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom PMB :</h6>
          <a class="collapse-item" href="pmb_pgmi">PGMI</a>
          <a class="collapse-item" href="pmb_mpi">MPI</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="inputNilai">
        <i class="fas fa-book"></i>
        <span>Input Nilai Mahasiswa</span></a>
    </li>
		<li class="nav-item">
      <a class="nav-link" href="reportAbsen">
        <i class="fas fa-industry"></i>
        <span>Report Absen Mahasiswa</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Fasilitas
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
      <a class="nav-link" href="ruangan">
        <i class="fas fa-building"></i>
        <span>Ruangan Kelas</span></a>
    </li>

  </ul>
</div>

<!-- End of Sidebar -->
