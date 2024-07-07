<div class="main-wrapper">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Akun</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($accounts as $key => $account) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $account['name']; ?></td>
                                <td><?= $account['email']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>