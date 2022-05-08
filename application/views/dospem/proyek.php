<div class="container p-3">

    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Manage Proyek</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#input_barang">
        Recent Proyek
    </button>

    <button type="button" class="float-right btn btn-primary mb-4" data-toggle="modal" data-target="#acc">
        Accept Proyek
    </button>



    <!-- Modal -->
    <div class="modal fade" id="acc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Accept Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="<?= base_url('dospem/proyek/terima'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body overflow-hidden">

                        <div class="form-group">
                            <label for="acc py-2 text-size-1" class="font-weight-bold">Yang ingin mengrekrut</label>
                            <table class=" my-3 table">
                                <thead>

                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Partnert</th>
                                        <th>Pilih</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($rekrut as $acc) : ?>
                                        <tr>

                                            <td> <?= $acc['judul']; ?>
                                                <input autocomplete="off" type="hidden" class="form-control" id="id_proyek" value="<?= $acc['id_proyek']; ?>" name="id_proyek">
                                            </td>
                                            <td> <?= $acc['judul']; ?>
                                            </td>
                                            <td class=""><input id="accept" name="accept" value="1" type="checkbox" aria-label="Checkbox for following text input"></td>
                                            <td><a data-target="#PembingAcc" data-toggle="modal" class="btn btn-primary mb-4" name href="#">Detail</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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


    <!-- Modal Pembimbing Meng Acc-->
    <div class="modal fade" id="PembingAcc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Daftar Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('mahasiswa/daftar/simpan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">


                        <div class="form-group">
                            <label class="font-weight-bold">Judul Proyek</label>
                            <input autocomplete="off" type="text" class="form-control" name="judul_proyek" id="judul_proyek" aria-describedby="judul_proyek" required>
                            <input autocomplete="off" type="hidden" class="form-control" name="nim_mhs" id="nim_mhs" value="<?= $nim ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Proyek</label>
                            <select class="  form-control" id="proyek" name="proyek" required>
                                <option class="" value="">--pilih--</option>
                                <option class="" value="1">1</option>
                                <option class="" value="2">2</option>
                                <option class="" value="3">3</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Dosen Pembimbing</label>
                            <select class="  form-control" id="dospem" name="dospem" required>
                                <option class="">--pilih--</option>
                                <!-- <?php foreach ($dospen as $dos) : ?> -->

                                <option></option>

                                <!-- <?php endforeach; ?> -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Abstraksi Proyek</label>
                            <textarea class="form-control" name="abstraksi" id="abstraksi" rows="3" required></textarea>

                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Proposal Proyek</label>
                            <input type="text" class="form-control" name="proposal" id="proposal" aria-describedby="proposal" min="0" required>

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
                                    <?php

                                    foreach ($rekrut as $pro) : ?>
                                        <tr>

                                            <td><?= $pro['judul']; ?>
                                                <input autocomplete="off" type="hidden" class="form-control" id="nim_acc" value="" name="nim_acc">
                                            </td>
                                            <td>
                                                <input autocomplete="off" type="hidden" class="form-control" id="nama_acc" value="" name="nama_acc">
                                                <input autocomplete="off" type="hidden" class="form-control" id="partnert" value="" name="partnert">
                                            </td>
                                            <td></td>
                                            <td class=""> <input id="check" name="check" value="" type="checkbox" aria-label="Checkbox for following text input"></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>

            </div>
        </div>
    </div>

    <table id="table_barang" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nim</th>
                <th>Proyek</th>
                <th>Judul</th>
                <th>Bimbingan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($proyek as $a) :

            ?>

                <tr>
                    <td class="align-middle text-center" width="20px"><?= $no++ ?></td>
                    <td class="align-middle text-center"><?= $a['id_team']; ?></td>
                    <td class="align-middle text-center"><?= $a['proyek']; ?></td>
                    <td class="align-middle text-center"><?= $a['judul']; ?></td>


                    <td width="140px">

                        <a class="btn btn-primary" href="<?= base_url(); ?>dospem/proyek/bimbingan/?id_proyek=<?= $id = $a['id_proyek']; ?>">Lanjut</a>

                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>