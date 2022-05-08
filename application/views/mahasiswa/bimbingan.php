<div class="container p-3">
    <?= $id_proyek ?>
    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Bimbingan Proyek</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#bimbing1">
        Buat Bimbingan
    </button>
    <div class="modal fade" id="bimbing1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Buat Bimbingan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('mahasiswa/daftar/bimpan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <label for="" class="font-weight-bold">Kegiatan Pembimbingan :</label>
                        <textarea class=" form-control" name="kegiatan" id="kegiatan" rows="3" required></textarea>
                        <label for="" class=" mt-3 font-weight-bold">File Laporan</label>
                        <input autocomplete="off" type="text" class="form-control" id="file_laporan" value="" name="file_laporan">
                        <input type="hidden" id="id_proyek" name="id_proyek" value="<?= $id_proyek; ?>">
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
                <th style="width: 17px;">Bimbingan</th>
                <th>Kegiatan</th>
                <th>File</th>
                <th>Pesan Dospem</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($proyek as $a) :

            ?>

                <tr>
                    <td class="align-middle text-center" style="width: 20px;"><?= $no++ ?></td>
                    <td class="align-middle text-center"><?= $a['kegiatan']; ?></td>
                    <td class="align-middle text-center"><?= $a['file_bimbingan']; ?></td>


                    <td width="140px">

                        <button class="btn btn-primary" data-toggle="modal" data-target="#pesan<?= $a['id_bimbingan'] ?>">lihat Pesan</button>

                    </td>

                    <div class="modal fade" id="pesan<?= $a['id_bimbingan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Pesan Dospem</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('mahasiswa/team/simpan'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <p><?= $a['pesan']; ?></p>

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