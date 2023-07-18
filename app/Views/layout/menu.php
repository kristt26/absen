                            <!-- <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">List Menu</div> -->
                            <ul class="pcoded-item pcoded-left-item mt-3">
                                <li class="<?= $title=='Home' ? 'active' : ''?>">
                                    <a href="<?= base_url()?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>H</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Home</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li  class="<?= $title=='Daftar Karyawan' || $title=="Tambah Karyawan" || $title== "Ubah Karyawan" ? 'active' : ''?>">
                                    <a href="<?= base_url("karyawan")?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>K</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Karyawan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li  class="<?= $title=='Laporan Absensi' || $title=="Detail Laporan" ? 'active' : ''?>">
                                    <a href="<?= base_url("laporan")?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-file"></i><b>L</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Laporan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>