<div class="border-left px-4 mt-3 col-md-6">
    <h1 style="font-size: 30px;" class="mt-3 d-flex justify-content-center font-weight-bold">Sidang Proyek</h1>

    <table class="mt-4 table-bordered table">
        <thead class="thead-light">
            <tr>
                <th colspan="2" class="text-center" scope="col">Nama & Nim Pembimbing</th>
                <th scope="col" class="text-center" colspan="2">Nama & Nim Penguji</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proyek as $pro) : ?>
                <tr>
                    <th><?= $pro['nim'] ?></th>
                    <td><?= $pro['nama'] ?></td> <?php endforeach;
                                                foreach ($dospeng as $dos) : ?>
                    <td><?= $dos['nim'] ?></td>
                    <td><?= $dos['nama'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div>