<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="col-12" ng-app="apps" ng-controller="laporanController">
    <div class="card">
        <div class="card-header">
            <div class="form-group">
                <label for="">Tanggal</label>
                <div class="col-3 pl-0 d-flex">
                    <input type="text" class="form-control" name="" id="tanggalMulai" ng-model="tanggal" ng-change="showData(tanggal)">
                    <button class="btn btn-primary btn-sm"><i class="fa fa-search fa-lg"></i></button>
                </div>
            </div>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Total Absen</th>
                            <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="item in datas">
                            <td>{{$index+1}}</td>
                            <td>{{item.nama}}</td>
                            <td>{{item.absen.length}}</td>
                            <td><button class="btn btn-info btn-sm" ng-click="showDetail(item)"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i></button></td>
                        </tr>
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
<?= $this->endSection() ?>