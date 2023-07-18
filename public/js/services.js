angular.module('services', [])
    .factory('absenServices', absenServices)
    .factory('laporanServices', laporanServices);

function absenServices($http, $q, helperServices, pesan) {
    var controller = helperServices.url + 'absen/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get,
        post:post
    };

    function get() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'read',
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'post',
            data: param, 
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                pesan.error(err.data.messages.error);
            }
        );
        return def.promise;
    }
}

function laporanServices($http, $q, helperServices, pesan) {
    var controller = helperServices.url + 'laporan/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get,
        post:post
    };

    function get(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'read',
            data:param,
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'post',
            data: param, 
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                pesan.error(err.data.messages.error);
            }
        );
        return def.promise;
    }
}