<div class="container p-3">

    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Manage Dosen Koor</h1>
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
        Tambah Kegiatan
    </button>

    <button type="button" class="btn btn-primary mx-3 mb-4" data-toggle="modal" data-target="#koor">
        Tambah Dosen Koor
    </button>


    <div class="modal fade" id="koor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="<?= base_url('admin/ManageKoor/tambah_koor'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="acc py-2 text-size-1" class="font-weight-bold">Masukan Nim Dosen</label>
                            <input autocomplete="off" type="text" class="form-control" id="nim" value="" name="nim">
                        </div>

                        <div class="form-group">
                            <label for="acc py-2 text-size-1" class="font-weight-bold">Masukan Nama Dosen</label>
                            <input autocomplete="off" type="text" class="form-control" id="nim" value="" name="nama">
                        </div>

                        <div class="form-group">
                            <label for="acc py-2 text-size-1" class="font-weight-bold">Masukan Nama Pssword</label>
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



    <div class="modal fade" id="mhs" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="<?= base_url('admin/ManageKoor/tambah_kegiatan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="acc py-2 text-size-1" class="font-weight-bold">Masukan Nama Kegiatan</label>
                            <input autocomplete="off" type="text" class="form-control" id="nim" value="" name="nim">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Masukan Nama Dosen Koor</label>
                            <select class="  form-control" id="dospem" name="koor" required>
                                <option class="">--pilih--</option>
                                <?php foreach ($user as $dos) : ?>

                                    <option value="<?= $dos['nim'] ?>"><?= $dos['nama'] ?></option>

                                <?php endforeach; ?>
                            </select>
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


                <th>Nama Kegiatan</th>
                <th>Dosen Koor</th>
                <!-- <th>Password Mahasiswa</th> -->
                <th>Manage</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($kegiatan as $a) :

            ?>

                <tr>
                    <td><?= $a['nama_kegiatan']; ?></td>
                    <td><?php if (isset($a['dosen_koor'])) {
                            echo $a['dosen_koor'];
                        } else {
                            echo "Kosong...";
                        } ?></td>



                    <td width="140px">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $a['id_kegiatan']; ?>">
                            Edit
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hapus<?= $a['id_kegiatan']; ?>">
                            Hapus
                        </button>
                    </td>

                    <div class="modal fade" id="hapus<?= $a['id_kegiatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Mahasiswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="<?= base_url('admin/ManageUser/hapus') ?>" method="post">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label class="font-weight-bold">Yakin Ingin Menghapus?</label>
                                            <input autocomplete="off" type="hidden" class="form-control" id="partnert" value="<?= $a['id_kegiatan']; ?>" name="nim">

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
<div class="modal fade" id="edit<?= $a['id_kegiatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('admin/ManageKoor/edit_kegiatan') ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="font-weight-bold">Masukan Nama Kegiatan</label>
                        <input autocomplete="off" type="hidden" class="form-control" id="partnert" value="<?= $a['id_kegiatan']; ?>" name="partnert">
                        <input autocomplete="off" type="text" class="form-control" id="nim" value="<?= $a['nama_kegiatan']; ?>" name="nim">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Pilih Nama Koor Dosen</label>
                        <select class="  form-control" id="dospem" name="koor" required>
                            <option class="">--pilih--</option>
                            <?php foreach ($user as $dos) : ?>

                                <option value="<?= $dos['nim'] ?>"><?= $dos['nama'] ?></option>

                            <?php endforeach; ?>
                        </select>
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