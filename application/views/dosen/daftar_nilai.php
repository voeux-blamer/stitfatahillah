<table class="table table-hover table-bordered table-striped mt-4">
    <tr>
        <td>NO</td>
        <td>NAMA MAHASISWA</td>
        <td>NAMA MATAKULIAH</td>
        <td>NAMA PRODI</td>
        <td>NILAI</td>
    </tr>
    <?php
    $start = 0;
    for ($i = 0; $i < sizeof($krs_id); $i++) {
    ?>

        <tr>
            <td><?php echo $start++ ?></td>
            <td>
                <?= $i['nama_mahasiswa'] ?>
            </td>
            <td>
                <?= $i['nama_makul'] ?>
            </td>
            <td>
                <?= $i['nama_prodi'] ?>
            </td>
            <td><?= $i['nilai'] ?></td>
        </tr>

    <?php } ?>
</table>