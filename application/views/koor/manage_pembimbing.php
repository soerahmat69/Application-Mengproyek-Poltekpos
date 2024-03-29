<div class="container p-3">

    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Manage Pembimbingan</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#input_barang">
        Tambah Pembimbing
    </button>


    <table id="table_barang" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nim Pembimbing</th>
                <th>Nama Pembimbing</th>
                <th>Jumlah Proyek</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($proyek as $a) :

            ?>

                <tr>
                    <td class="align-middle text-center"><?= $a['nim'] ?></td>
                    <td class="align-middle text-center"><?= $a['nama'] ?></td>
                    <td class="align-middle text-center"><?= $a['dospem'] ?></td>


                    <td width="140px">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rekrut">
                            Pilih
                        </button>




                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="rekrut" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Mengrekrut</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="<?= base_url('mahasiswa/team/rekrut') ?>" method="post">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label class="font-weight-bold">Pilihan anda sudah yakin?</label>
                                            <input autocomplete="off" type="hidden" class="form-control" id="partnert" value="" name="partnert">
                                            <input autocomplete="off" type="hidden" class="form-control" id="nama" value="" name="nama">
                                            <input autocomplete="off" type="hidden" class="form-control" id="nim" value="<?= $nim ?>" name="nim">

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>

                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </tr>
                <!-- <?php endforeach; ?> -->
        </tbody>

    </table>
</div>