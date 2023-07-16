<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h5>Daftar Karyawan</h5>
            <div class="card-header-right">
                <a href="<?= base_url('karyawan/create') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus text-white" aria-hidden="true"></i> Tammbah</a>
            </div>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Handphone</th>
                            <th>Alamat</th>
                            <th>Username</th>
                            <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $karyawan) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $karyawan->nama ?></td>
                                <td><?= $karyawan->gender ?></td>
                                <td><?= $karyawan->tempat_lahir ?></td>
                                <td><?= $karyawan->tanggal_lahir ?></td>
                                <td><?= $karyawan->hp ?></td>
                                <td><?= $karyawan->alamat ?></td>
                                <td><?= $karyawan->username ?></td>
                                <td>
                                    <a href="<?= base_url('karyawan/update/' . $karyawan->id) ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <a href="#" data-href="<?= base_url('karyawan/delete/' . $karyawan->id) ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h2 class="h2">Are you sure?</h2>
        <p>The data will be deleted and lost forever</p>
      </div>
      <div class="modal-footer">
        <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script>

</script>
<?= $this->endSection() ?>