<div class="container p-3">

    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Manage Mahasiswa</h1>
    </div>

    <!-- Example single danger button -->

    <!-- Example single danger button -->
    <div class="float-right btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            User Another
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url() ?>admin/ManageKoor">Dosen Koor</a>
            <a class="dropdown-item" href="<?= base_url() ?>admin/ManageUser">Mahasiswa</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
        </div>
    </div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#mhs">
        Tambah Mahasiswa
    </button>



    <!-- Modal -->
    <div class="modal fade" id="mhs" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="<?= base_url('admin/ManageUser/tambah_mhs'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="acc py-2 text-size-1" class="font-weight-bold">Masukan Nim</label>
                            <input autocomplete="off" type="number" class="form-control" id="nim" value="" name="nim">
                        </div>
                        <div class="form-group">
                            <label for="acc py-2 text-size-1" class="font-weight-bold">Masukan Nama</label>
                            <input autocomplete="off" type="text" class="form-control" id="nim" value="" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="acc py-2 text-size-1" class="font-weight-bold">Masukan Password</label>
                            <input autocomplete="off" type="text" class="form-control" id="nim" value="" name="pass">
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


                <th>Nim Mahasiswa</th>
                <th>Nama Mahasiswa</th>
                <th>Password Mahasiswa</th>
                <th>Manage</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($user as $a) :
            ?>
                <tr>
                    <td><?= $a['nim']; ?></td>
                    <td><?= $a['nama']; ?></td>
                    <td><?= $a['pass']; ?></td>
                    <td width="140px">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $a['nim']; ?>">
                            Edit
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hapus<?= $a['nim']; ?>">
                            Hapus
                        </button>
                    </td>

                    <div class="modal fade" id="hapus<?= $a['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Mahasiswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="<?= base_url('admin/ManageUser/hapus_mhs') ?>" method="post">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label class="font-weight-bold">Yakin Ingin Menghapus?</label>
                                            <input autocomplete="off" type="hidden" class="form-control" id="partnert" value="<?= $a['nim']; ?>" name="nim">

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Hapus</button>

                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="edit<?= $a['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('admin/ManageUser/edit_mhs') ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="acc py-2 text-size-1" class="font-weight-bold">Masukan Nim</label>
                        <input autocomplete="off" type="number" class="form-control" id="nim" value="<?= $a['nim'] ?>" name="nim">
                    </div>
                    <div class="form-group">
                        <label for="acc py-2 text-size-1" class="font-weight-bold">Masukan Nama</label>
                        <input autocomplete="off" type="text" class="form-control" id="nim" value="<?= $a['nama'] ?>" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="acc py-2 text-size-1" class="font-weight-bold">Masukan Password</label>
                        <input autocomplete="off" type="text" class="form-control" id="nim" value="<?= $a['pass'] ?>" name="pass">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>

                    </div>
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