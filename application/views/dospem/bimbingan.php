<div class="container p-3">


    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Bimbingan Proyek</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#input_barang">
        Proyek
    </button>



    <div class="modal fade" id="input_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hasil Rekrut</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('mahasiswa/team/simpan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="judul_proyek" class="font-weight-bold">Nim</label>


                            <table class=" my-3 table">
                                <thead>

                                    <tr>

                                        <th scope="col">Judul</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Partnert</th>
                                        <th scope="col">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php

                                            foreach ($rekrut as $pro) : ?> -->
                                    <tr>

                                        <td>
                                            <input autocomplete="off" type="hidden" class="form-control" id="nim_acc" value="" name="nim_acc">
                                        </td>
                                        <td>
                                            <input autocomplete="off" type="hidden" class="form-control" id="nama_acc" value="" name="nama_acc">
                                            <input autocomplete="off" type="hidden" class="form-control" id="partnert" value="" name="partnert">
                                        </td>
                                        <td></td>
                                        <td class=""> <input id="check" name="check" value="" type="checkbox" aria-label="Checkbox for following text input"></td>
                                    </tr>
                                    <!-- <?php endforeach; ?> -->
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
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
                <th>Nilai Nim</th>
                <th>Nilai Partnert</th>
                <th>Pesan</th>
                <th>Aktivitas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($bimbingan as $a) :



            ?>

                <tr>
                    <td class="align-middle text-center" style="width: 20px;"><?= $no++ ?></td>
                    <td class="align-middle text-center"><?= $a['kegiatan']; ?></td>
                    <td class="align-middle text-center"><?= $a['file_bimbingan']; ?></td>
                    <td class="align-middle text-center"><?php if (isset($a['nilai_nim'])) {
                                                                echo $a['nilai_nim'];
                                                            } else {
                                                                echo "kosong";
                                                            }
                                                            ?></td>
                    <td class="align-middle text-center"><?php if (isset($a['nilai_partnert'])) {
                                                                echo $a['nilai_partnert'];
                                                            } else {
                                                                echo "kosong";
                                                            }
                                                            ?></td>
                    <td class="align-middle text-center"><?php if (isset($a['pesan'])) {
                                                                echo $a['pesan'];
                                                            } else {
                                                                echo "kosong";
                                                            }
                                                            ?></td>

                    <td class="d-flex" width="140px">


                        <button class="mx-1 btn btn-primary" data-toggle="modal" data-target="#tanggapi<?= $a['id_proyek'] ?>">Tanggapi</button>

                        <button class=" mx-1 btn btn-primary" data-toggle="modal" data-target="#edit">Edit</button>

                    </td>

                    <div class="modal fade" id="tanggapi<?= $a['id_proyek'] ?>">" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Tanggapan Dospem</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('dospem/proyek/bimpan'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Masukan Nilai Mhs</label>
                                            <input autocomplete="off" type="numb" class="form-control" id="nilai_nim" value="" name="nilai_nim">
                                            <input autocomplete="off" type="hidden" class="form-control" id="id_proyek" value="<?= $a['id_proyek'] ?>" name="id_proyek">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Masukan Nilai Mhs</label>
                                            <input autocomplete="off" type="numb" class="form-control" id="nilai_partnert" value="" name="nilai_partnert">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Masukan Pesan</label>
                                            <textarea class=" form-control" name="pesan" id="pesan" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
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