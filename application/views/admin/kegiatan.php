<div class="container p-3">

    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Manage Kegiatan</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#input_barang">
        Tambah Kategori
    </button>

    <table id="table_barang" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>


                <th class="text-center">Judul</th>
                <th class="text-center">Kegiatan</th>
                <th class="text-center">Abstraksi</th>
                <th class="text-center">Dospem</th>
                <th class="text-center">Dospeng</th>
                <th class="text-center">Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($proyek as $a) :

            ?>

                <tr>
                    <td class="align-middle text-center"><?= $a['judul']; ?></td>
                    <td class="align-middle text-center"><?= $a['proyek']; ?></td>
                    <td class="align-middle text-center"><?= $a['abstraksi']; ?></td>
                    <td class="align-middle text-center"><?= $a['nama']; ?></td>
                    <?php if (isset($a['nim_dospeng'])) {
                        foreach ($dospeng as $dos) {
                            echo '<td class="align-middle text-center">' . $dos['nama'] . '</td>';
                        }
                    } else {
                        echo '<td class="align-middle text-center">kosong...</td>';
                    } ?>


                    <td width="140px">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $a['id_proyek']; ?>">
                            Edit
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hapus<?= $a['id_proyek']; ?>">
                            Hapus
                        </button>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>