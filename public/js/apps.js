angular.module('apps', ['services', 'helper.service', 'message.service'])
    .controller('absenController', absenController);

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