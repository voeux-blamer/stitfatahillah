<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <div class="bs-example">
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <legend class="mt-3"><strong><i class="fas fa-school"></i> STIT FATAHILLAH
          </strong></legend>
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="#select" aria-expanded="false" href="#">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?> |</span>
              <img src="<?= base_url() ?>./uploads/profile/<?= $user['image'] ?>" style="height:45px; width:45px; 
                    border-radius:50%; overflow: hidden;margin: 0 auto;"></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="<?= base_url('Auth/logout') ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>Logout</a>
            </div>
          </li>
        </ul>
    </div>
    </nav>