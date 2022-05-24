<div class="container p-3">

    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Manage Prodi</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#input_barang">
        Mulai Kegiatan
    </button>

    <!-- Modal -->
    <div class="modal fade" id="acc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Accept Team</h5>
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
                <th class="text-center">Kegiatan</th>
                <th class="text-center">koor</th>
                <th class="text-center">Manage</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($user as $a) :

            ?>

                <tr>
                    <td class="align-middle text-center"><?= $a['nim']; ?></td>
                    <td class="align-middle text-center"><?= $a['nama']; ?></td>


                    <td width="140px">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $a['nim']; ?>">
                            Edit
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hapus<?= $a['nim']; ?>">
                            Hapus
                        </button>
                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="edit<?= $a['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Mengrekrut</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="<?= base_url('admin/ManageUser/edit') ?>" method="post">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label class="font-weight-bold">Masukan Nim</label>
                                            <input autocomplete="off" type="hidden" class="form-control" id="partnert" value="<?= $a['nim']; ?>" name="partnert">
                                            <input autocomplete="off" type="number" class="form-control" id="nim" value="<?= $a['nim']; ?>" name="nim">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Masukan Nama</label>
                                            <input autocomplete="off" type="text" class="form-control" id="nama" value="<?= $a['nama']; ?>" name="nama">

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>

                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="hapus<?= $a['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Mengrekrut</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="<?= base_url('admin/ManageUser/hapus') ?>" method="post">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label class="font-weight-bold">Yakin Ingin Menghapus?</label>
                                            <input autocomplete="off" type="hidden" class="form-control" id="partnert" value="<?= $a['nim']; ?>" name="nim">

                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>