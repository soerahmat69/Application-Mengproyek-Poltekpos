<div class="border-left px-4 mt-3 col-md-6">
    <h1 style="font-size: 30px;" class="mt-3 d-flex justify-content-center font-weight-bold">Team Proyek</h1>

    <table class=" mt-4 table-bordered table">
        <thead class="thead-light">
            <tr>
                <th colspan="2" class="text-center" scope="col">Nama & Nim Ketua</th>
                <th scope="col" class="text-center" colspan="2">Nama & Nim Partnert</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proyek as $pro) : ?>
                <tr>
                    <th><?= $pro['nim_mhs'] ?></th>
                    <td><?= $pro['nama_mhs'] ?></td>
                    <td><?= $pro['partnert'] ?></td>
                    <td><?= $pro['nama_partnert'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div>