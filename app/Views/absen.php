<!DOCTYPE html>
<html lang="en" ng-app="apps">

<head>
    <title>Mega Able bootstrap admin template by codedthemes </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />
    <link rel="icon" href="<?= base_url() ?>/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/icon/icofont/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/icon/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/style.css">
</head>

<body themebg-pattern="theme4" ng-controller="absenController">
    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" ng-submit="save()">
                        <div class="text-center">
                            <img src="<?= base_url() ?>/assets/images/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Absen</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <select class="form-control" ng-options="item.nama for item in datas" ng-model="karyawan" ng-change="model.karyawan_id=karyawan.id"></select>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Kayawan</label>
                                </div>
                                <div class="form-group form-primary">
                                    <select class="form-control" ng-model="model.status">
                                        <option value="datang">Datang</option>
                                        <option value="pulang">Pulang</option>
                                    </select>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Status Absen</label>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Absen</button>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?= base_url('auth')?>" class="btn btn-info btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script src="<?= base_url() ?>/assets/pages/waves/js/waves.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/SmoothScroll.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/i18next/23.2.11/i18next.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/i18next-xhr-backend/3.2.2/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/i18next-browser-languagedetector/7.1.0/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-i18next/1.2.1/jquery-i18next.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/common-pages.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/js/angular.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/js/apps.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/js/services.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/js/helper.services.js"></script>
    <script src="<?= base_url() ?>js/pesan.services.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="<?= base_url() ?>libs/select2/select22.min.js"></script> -->
    <script src="<?= base_url() ?>libs/angular-ui-select2/src/select2.js"></script>
    <script src="<?= base_url() ?>libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>

</html>