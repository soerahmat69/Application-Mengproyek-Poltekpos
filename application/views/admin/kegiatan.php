<div class="container p-3">

    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Manage Kegiatan</h1>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#kegiatan">
        Mulai Kegiatan
    </button>

    <!-- Modal -->
    <div class="modal fade" id="kegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Masukan Waktu Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="<?= base_url('admin/ManageUser/tambah_kategori'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="acc py-2 text-size-1" class="font-weight-bold">Masukan Tanggal Mulai</label>
                            <input autocomplete="off" type="date" class="form-control" id="nim" value="" name="start">
                        </div>
                        <div class="form-group">
                            <label for="acc py-2 text-size-1" class="font-weight-bold">Masukan Tanggal Berakhir Kegiatan</label>
                            <input autocomplete="off" type="date" class="form-control" id="nim" value="" name="end">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Terima</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                            Detail
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hapus<?= $a['id_proyek']; ?>">
                            Edit
                        </button>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>