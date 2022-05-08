<div class="container p-3">
    <?= $nim ?>
    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Manage Proposal</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#input_barang">
        Rekrut Team
    </button>

    <button type="button" class="float-right btn btn-primary mb-4" data-toggle="modal" data-target="#acc">
        Accept Team
    </button>


    <table id="table_barang" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Rekrut</th>
            </tr>
        </thead>
        <tbody>
            <!-- <?php
                    $no = 1;
                    foreach ($user as $a) :

                    ?> -->

            <tr>
                <td class="align-middle text-center" width="20px"></td>
                <td class="align-middle text-center"></td>
                <td class="align-middle text-center"></td>


                <td width="140px">

                    <a href="<?= base_url(); ?>koor/proyek/" type="button" class="btn btn-primary">
                        Pilih
                    </a>




                </td>

            </tr>
            <!-- <?php endforeach; ?> -->
        </tbody>

    </table>
</div>