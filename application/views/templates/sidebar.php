 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <a class=" gambar sidebar-brand d-flex align-items-center justify-content-center" data-toggle="collapse" aria-expanded="false" href="#">
         <div class="sidebar-brand-icon ">
             <img style="width: 120px;
        height: 70px;
        position:center;
        width: 70px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto;" src="<?= base_url('assets/login/images/stit.jpeg') ?>">
             <br>
         </div>
         <div class="sidebar-brand-text mx-3">STIT FATAHILLAH </div>
     </a>
     <div class="collapse" id="collapseExample">
         <div class="card card-body">
             - Visi STIT FATAHILLAH adalah menjadi sekolah tinggi Islam berbasis tarbiyah terkemuka di Indonesia -
         </div>
     </div>
     <!-- Divider -->
     <hr class="sidebar-divider">

     <!--QUERY MENU -->

     <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`,`menu`
                        FROM `user_menu` JOIN `user_access_menu` 
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                        WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                    ";
        $menu = $this->db->query($queryMenu)->result_array();

        ?>

     <!--LOOPING MENU-->

     <?php foreach ($menu as $m) : ?>

         <div class="sidebar-heading">
             <?= $m['menu']; ?>
         </div>

         <!--SIAPKAN SUB MENU SESUAI MENU -->
         <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT *
                                    FROM `user_sub_menu` JOIN `user_menu` 
                                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                    WHERE `user_sub_menu`.`menu_id` = $menuId
                                    AND `user_sub_menu`.`is_active` = 1
                                    ";
            $SubMenu = $this->db->query($querySubMenu)->result_array();
            ?>

         <?php foreach ($SubMenu as $sm) : ?>
             <?php if ($title == $sm['title']) : ?>
                 <li class="nav-item active">
                 <?php else : ?>
                 <li class="nav-item">
                 <?php endif; ?>
                 <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                     <i class="<?= $sm['icon']; ?>"></i>
                     <span><?= $sm['title']; ?></span></a>
                 </li>

             <?php endforeach; ?>

             <hr class="sidebar-divider mt-3">

         <?php endforeach; ?>

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

 </ul>
 <!-- End of Sidebar -->
 <script>
     $(".gambar").click(function() {
         $(".collapse").collapse('toggle');
     });
 </script>