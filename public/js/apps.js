angular.module('apps', ['services', 'helper.service', 'message.service'])
    .controller('absenController', absenController)
    .controller('laporanController', laporanController)


function absenController($scope, absenServices, pesan) {
    $scope.model={};
    $scope.karyawan = {};
    absenServices.get().then(res=>{
        $scope.datas= res;
    })
    $scope.save = ()=>{
        absenServices.post($scope.model).then(res=>{
            pesan.Success('Berhasil Absen');
            $scope.model={};
            $scope.karyawan = {};
        })
    }
}
function laporanController($scope, laporanServices, pesan, helperServices) {
    $scope.model={};
    $scope.karyawan = {};
    
    $scope.showData = (param)=>{
        var item = param.split(' - ');
        $scope.model.dari = item[0];
        $scope.model.sampai = item[1];
        laporanServices.get($scope.model).then(res=>{
            $scope.datas = res;
        })
    }

    $scope.showDetail = (param)=>{
        location.href = helperServices.url + "/laporan/detail/" + $scope.model.dari + "/" + $scope.model.sampai + "/" + param.id;
    }
}