<div class="container">
    <h2>DOWNLOAD MODUL</h2>
    <div class="row">
        <?php if (!empty($files)) {
            foreach ($files as $frow) { ?>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <!--Card-->
                    <div class="card hoverable">

                        <!--Card image-->

                        <embed src="<?php echo base_url() . 'uploads/files/' . $frow['file_name']; ?>" class="img-fluid" alt="">
                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="card-title"><?php echo $frow['title']; ?></h4>
                            <!--Text-->

                            <a href="<?php echo base_url() . 'Mahasiswa/proses_download/' . $frow['id']; ?>" class="btn btn-outline-dark btn-sm">Download</a>
                        </div>

                    </div><br />
                    <!--/.Card-->
                </div>
				</div>
        <?php }
        } ?>
