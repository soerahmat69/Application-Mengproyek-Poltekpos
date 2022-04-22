<?= $this->extend('layout/main'); ?>


<?= $this->section('content'); ?>

<div class="container p-3">

    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Data Barang</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#input_barang">
        Tambah Barang
    </button>

    <!-- Modal -->
    <div class="modal fade" id="input_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('mahasiswa/daftar/simpan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nama_mhs" class="font-weight-bold">Judul Proyek</label>
                            <input autocomplete="off" type="text" class="form-control" name="nama_mhs" id="nama_mhs" aria-describedby="nama_mhs" required>
                        </div>
                        <div class="form-group">
                            <label for="stok" class="font-weight-bold">Latar Belakang</label>
                            <input autocomplete="off" type="text" class="form-control" name="nim_mhs" id="nim_mhs" aria-describedby="nim_mhs" min="0" max="99999" required>
                        </div>
                        <div class="form-group">
                            <label for="harga" class="font-weight-bold">Nomor Whatssapp</label>
                            <input autocomplete="off" type="number" class="form-control" name="harga" id="harga" aria-describedby="harga" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="font-weight-bold">Email Barang</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="harga" class="font-weight-bold">Foto Barang</label>
                            <input type="file" class="form-control" name="foto_barang" id="foto_barang" aria-describedby="harga" min="0" required>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table id="table_barang" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Foto Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            // foreach ($barang as $b) : 
            ?>

            <tr>
                <td class="align-middle" width="20px"><?= $no++ ?></td>
                <td class="align-middle"></td>
                <td class="align-middle"></td>
                <td class="align-middle"></td>
                <td class="align-middle"></td>
                <td class="align-middle"></td>
                <td class="align-middle"><img src=""></td>
                <td width="140px">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_barang<?= $b['id_barang']; ?>">
                        Edit
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="edit_barang<?= $b['id_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/barang/edit" method="post">
                                    <div class="modal-body">
                                        <input autocomplete="off" type="hidden" class="form-control" id="edit_id_barang" aria-describedby="edit_id_barang" value="<?= $b['id_barang']; ?>" name="edit_id_barang">
                                        <div class="form-group">
                                            <label for="edit_nama_barang" class="font-weight-bold">Nama Barang</label>
                                            <input autocomplete="off" type="text" class="form-control" id="edit_nama_barang" aria-describedby="edit_nama_barang" value="<?= $b['nama_barang']; ?>" name="edit_nama_barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_stok" class="font-weight-bold">Stok Barang</label>
                                            <input autocomplete="off" type="number" class="form-control" id="edit_stok" aria-describedby="edit_stok" value="<?= $b['stok']; ?>" name="edit_stok">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_harga" class="font-weight-bold">Harga Barang</label>
                                            <input autocomplete="off" type="number" class="form-control" id="edit_harga" aria-describedby="edit_harga" value="<?= $b['harga']; ?>" name="edit_harga">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_deskripsi" class="font-weight-bold">Deskripsi Barang</label>
                                            <textarea class="form-control" id="edit_deskripsi" rows="3" name="edit_deskripsi"><?= $b['deskripsi']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga" class="font-weight-bold">Foto Barang</label>
                                            <input type="file" class="form-control" name="foto_edit" id="foto_edit" aria-describedby="">
                                            <input type="hidden" class="form-control" name="foto_recent" id="foto_recent" aria-describedby="" value="<?= $b['foto_barang']; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus_barang<?= $b['id_barang']; ?>">
                        Hapus
                    </button>
                    <div class="modal fade" id="hapus_barang<?= $b['id_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Menghapus Data !</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/barang/hapus" method="post">
                                    <div class="modal-body">
                                        Anda yakin menghapus data ?
                                        <input type="hidden" class="form-control" id="hapus_id_barang" aria-describedby="hapus_id_barang" value="<?= $b['id_barang']; ?>" name="hapus_id_barang">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

        </tbody>

    </table>
</div>

<?= $this->endSection(); ?>