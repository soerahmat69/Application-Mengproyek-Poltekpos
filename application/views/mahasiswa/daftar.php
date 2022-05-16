<div class="container p-3">

    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Daftar Proyek</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#input_barang">
        Daftar Proyek
    </button>

    <button type="button" class="float-right btn btn-primary mb-4" data-toggle="modal" data-target="#input_barang">
        Aktivitas Proyek
    </button>


    <!-- Modal -->
    <div class="modal fade" id="input_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                <?php foreach ($dospen as $dos) : ?>

                                    <option> <?= $dos['nama']; ?> </option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Abstraksi Proyek</label>
                            <textarea class="form-control" name="abstraksi" id="abstraksi" rows="3" required></textarea>

                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Proposal Proyek</label>
                            <input type="file" class="form-control" name="proposal" id="proposal" aria-describedby="proposal" min="0" required>

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

    <hr style="height: 10px;">
    <div class="container ">
        <div class="row">
            <div class="col justify-content-center d-inline-flex ">
                <?php if (isset($proyek)) : foreach ($proyek as $pro) : ?>
                        <div class="mx-3 card" style="width: 18rem;">

                            <img src="..." class="card-img-top" alt="...">
                            <div class=" card-body">
                                <h5 style="font-size: 25px;" class=" font-weight-bold"><?= $pro['judul']; ?></h5>
                                <?php if (isset($pro['accept_proyek'])) {
                                    $cek = "Diterima";
                                    $set = "badge badge-pill badge-success";
                                } else {
                                    $cek = "Belum Diterima";
                                    $set = "badge badge-pill badge-danger";
                                } ?>
                                <p style="font-size: 15px;" class="font-weight-bold"> Status Proyek: <span style="font-size: 13px;" class="<?= $set ?>"><?= $cek; ?></span></p>
                                <p class=" font-weight-normal "> proyek <?= $pro['proyek'] ?></p>
                                <p class=" font-weight-light ">Abstraksi : <?= (str_word_count($pro['abstraksi']) > 13 ? substr($pro['abstraksi'], 0, 100) . "...." : $pro['abstraksi']) ?></p>

                                <a href=" #" class="btn btn-primary">Detail</a>
                                <a href="<?= base_url() ?>mahasiswa/daftar/bimbingan?id_proyek=<?= $pro['id_proyek']; ?>" class="float-right btn btn-info">Bimbingan</a>
                            </div>
                        </div>

                <?php endforeach;
                endif; ?>

                <div class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>