        </div>
    </div>
</div>
        
        <script>window.jQuery || document.write('<script src="<?= base_url() ?>vendor/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="<?= base_url() ?>vendor/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/screenfull/dist/screenfull.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/moment/moment.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/d3/dist/d3.min.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/c3/c3.min.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/amcharts/amcharts.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/amcharts/gauge.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/amcharts/serial.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/amcharts/themes/light.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/amcharts/animate.min.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/amcharts/pie.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/ammap3/ammap/ammap.js"></script>
        <script src="<?= base_url() ?>vendor/plugins/ammap3/ammap/maps/js/usaLow.js"></script>
        <script src="<?= base_url() ?>vendor/js/chart-amcharts.js"></script>
        <script src="<?= base_url() ?>vendor/js/tables.js"></script>
        <script src="<?= base_url() ?>vendor/js/widgets.js"></script>
        <script src="<?= base_url() ?>vendor/js/charts.js"></script>
        <script src="<?= base_url() ?>vendor/dist/js/theme.min.js"></script>
        <script src="<?= base_url() ?>vendor/js/datatables.js"></script>
        <script src="<?= base_url() ?>client/chart.js/dist/Chart.min.js"></script>
        <!-- <script src="<?= base_url() ?>client/geo-location-javascript/js/geo-min.js"></script> -->
        <script src="<?= base_url() ?>assets/js/main.js"></script>
        <?php if( isset($jabatan) ) : ?>
        <script>
            $('table tbody tr').click(function () { 
                $('table tbody tr').css('background-color', 'white')
                $('#editJabatan').css('display', 'inline-block')
                $('.btn-hapus').css('display', 'inline-block')
                $('#batal').css('display', 'inline-block')
                $(this).css('background-color', 'skyblue')
                var id = $(this).attr('id')
                $('#editJabatan').on('click', function () {
                    document.location.href = '<?= site_url('jabatan/edit/') ?>'+id;
                })
                $('.btn-hapus').on('click', function (event) {
                    event.preventDefault();
                    const objek = $(this).attr('href'); 

                    Swal.fire({
                        title: 'Apakah Anda Yakin..??',
                        text: "Data Akan Di Hapus!!",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus Data!'
                    }).then((result) => {
                        if (result.value) {
                            document.location.href = '<?= site_url('jabatan/hapus/') ?>'+id;
                        }
                    });

                });
            })

            $('#batal').click(function () {  
                $('table tbody tr').css('background-color', 'white')
                $('#editJabatan').css('display', 'none')
                $('.btn-hapus').css('display', 'none')
                $('#batal').css('display', 'none')
            })
        </script>
        <?php endif ?>
        <?php if( isset($pangkat) ) : ?>
        <script>
            $('table tbody tr').click(function () { 
                $('table tbody tr').css('background-color', 'white')
                $('#editPangkat').css('display', 'inline-block')
                $('.btn-hapus').css('display', 'inline-block')
                $('#batal').css('display', 'inline-block')
                $(this).css('background-color', 'skyblue')
                var id = $(this).attr('id')
                $('#editPangkat').on('click', function () {
                    document.location.href = '<?= site_url('pangkat/edit/') ?>'+id;
                })
                $('.btn-hapus').on('click', function (event) {
                    event.preventDefault();
                    const objek = $(this).attr('href'); 

                    Swal.fire({
                        title: 'Apakah Anda Yakin..??',
                        text: "Data Akan Di Hapus!!",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus Data!'
                    }).then((result) => {
                        if (result.value) {
                            document.location.href = '<?= site_url('pangkat/hapus/') ?>'+id;
                        }
                    });
                });
            })

            $('#batal').click(function () {  
                $('table tbody tr').css('background-color', 'white')
                $('#editPangkat').css('display', 'none')
                $('.btn-hapus').css('display', 'none')
                $('#batal').css('display', 'none')
            })
        </script>
        <?php endif ?>
        <?php if( isset($unit_kerja) ) : ?>
        <script>
            $('table tbody tr').click(function () { 
                $('table tbody tr').css('background-color', 'white')
                $('#editUnitKerja').css('display', 'inline-block')
                $('.btn-hapus').css('display', 'inline-block')
                $('#batal').css('display', 'inline-block')
                $(this).css('background-color', 'skyblue')
                var id = $(this).attr('id')
                $('#editUnitKerja').on('click', function () {
                    document.location.href = '<?= site_url('unit_kerja/edit/') ?>'+id;
                })
                $('.btn-hapus').on('click', function (event) {
                    event.preventDefault();
                    const objek = $(this).attr('href'); 

                    Swal.fire({
                        title: 'Apakah Anda Yakin..??',
                        text: "Data Akan Di Hapus!!",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus Data!'
                    }).then((result) => {
                        if (result.value) {
                            document.location.href = '<?= site_url('unit_kerja/hapus/') ?>'+id;
                        }
                    });
                });
            })

            $('#batal').click(function () {  
                $('table tbody tr').css('background-color', 'white')
                $('#editUnitKerja').css('display', 'none')
                $('.btn-hapus').css('display', 'none')
                $('#batal').css('display', 'none')
            })
        </script>
        <?php endif ?>
        <?php if( isset($pegawai) ) : ?>
        <script>
            $('#tambahPegawai').on('click', function () {
                document.location.href = '<?= site_url('pegawai/tambah/') ?>';
            })
            $('table tbody tr').click(function () { 
                $('table tbody tr').css('background-color', 'white')
                $('#detailPegawai').css('display', 'inline-block')
                $('#editPegawai').css('display', 'inline-block')
                $('.btn-hapus').css('display', 'inline-block')
                $('#batal').css('display', 'inline-block')
                $(this).css('background-color', 'skyblue')
                var id = $(this).attr('id')
                $('#editPegawai').on('click', function () {
                    document.location.href = '<?= site_url('pegawai/edit/') ?>'+id;
                })
                $('#detailPegawai').on('click', function () {
                    document.location.href = '<?= site_url('pegawai/detail/') ?>'+id;
                })
                $('.btn-hapus').on('click', function (event) {
                    event.preventDefault();
                    const objek = $(this).attr('href'); 

                    Swal.fire({
                        title: 'Apakah Anda Yakin..??',
                        text: "Data Akan Di Hapus!!",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus Data!'
                    }).then((result) => {
                        if (result.value) {
                            document.location.href = '<?= site_url('pegawai/hapus/') ?>'+id;
                        }
                    });
                });
            })

            $('#batal').click(function () {  
                $('table tbody tr').css('background-color', 'white')
                $('#detailPegawai').css('display', 'none')
                $('#editPegawai').css('display', 'none')
                $('.btn-hapus').css('display', 'none')
                $('#batal').css('display', 'none')
            })
        </script>
        <?php endif ?>
        <?php if( isset($waktu_kerja) ) : ?>
        <script>
            $('#tambahWaktuKerja').on('click', function () {
                document.location.href = '<?= site_url('waktu_kerja/tambah') ?>';
            })
            $('table tbody tr').click(function () { 
                $('table tbody tr').css('background-color', 'white')
                $('#editWaktuKerja').css('display', 'inline-block')
                $('.btn-hapus').css('display', 'inline-block')
                $('#batal').css('display', 'inline-block')
                $(this).css('background-color', 'skyblue')
                var id = $(this).attr('id')
                $('#editWaktuKerja').on('click', function () {
                    document.location.href = '<?= site_url('waktu_kerja/edit/') ?>'+id;
                })
                $('.btn-hapus').on('click', function (event) {
                    event.preventDefault();
                    const objek = $(this).attr('href'); 

                    Swal.fire({
                        title: 'Apakah Anda Yakin..??',
                        text: "Data Akan Di Hapus!!",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus Data!'
                    }).then((result) => {
                        if (result.value) {
                            document.location.href = '<?= site_url('waktu_kerja/hapus/') ?>'+id;
                        }
                    });
                });
            })

            $('#batal').click(function () {  
                $('table tbody tr').css('background-color', 'white')
                $('#editWaktuKerja').css('display', 'none')
                $('.btn-hapus').css('display', 'none')
                $('#batal').css('display', 'none')
            })
        </script>
        <?php endif ?>
        <?php if( isset($hari_libur) ) : ?>
        <script>
            $('#tambahHariLibur').on('click', function () {
                document.location.href = '<?= site_url('hari_libur/tambah') ?>';
            })
            $('table tbody tr').click(function () { 
                $('table tbody tr').css('background-color', 'white')
                $('#editHariLibur').css('display', 'inline-block')
                $('.btn-hapus').css('display', 'inline-block')
                $('#batal').css('display', 'inline-block')
                $(this).css('background-color', 'skyblue')
                var id = $(this).attr('id')
                $('#editHariLibur').on('click', function () {
                    document.location.href = '<?= site_url('hari_libur/edit/') ?>'+id;
                })
                $('.btn-hapus').on('click', function (event) {
                    event.preventDefault();
                    const objek = $(this).attr('href'); 

                    Swal.fire({
                        title: 'Apakah Anda Yakin..??',
                        text: "Data Akan Di Hapus!!",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus Data!'
                    }).then((result) => {
                        if (result.value) {
                            document.location.href = '<?= site_url('hari_libur/hapus/') ?>'+id;
                        }
                    });
                });
            })

            $('#batal').click(function () {  
                $('table tbody tr').css('background-color', 'white')
                $('#editHariLibur').css('display', 'none')
                $('.btn-hapus').css('display', 'none')
                $('#batal').css('display', 'none')
            })
        </script>
        <?php endif ?>

        <script>
            $('#show-password').click(function () { 
                if ( $(this).data('aktif') ) {
                    $('#show-password').css('color', 'black')
                    $('#password').attr('type', 'password')
                    $(this).data('aktif', '')
                } else {
                    $(this).data('aktif', 'aktif')
                    $('#password').attr('type', 'text')
                    $('#show-password').css('color', 'skyblue')
                }
            })
        </script>

    <?php if( isset($pegawai_dash) ) : ?>
        <script>
        var chart = AmCharts.makeChart("bar_chart", {
            "type": "serial",
            "theme": "light",
            "valueAxes": [{
                "id": "v1",
                "fontSize": 0,
                "axisAlpha": 0,
                "lineAlpha": 0,
                "gridAlpha": 0,
                "position": "left",
                "autoGridCount": false,
                "labelFunction": function(value) {
                    return value;
                }
            }],
            "graphs": [{
                "id": "g3",
                "valueAxis": "v1",
                "lineColor": "#2ed8b6",
                "fillColors": "#2ed8b6",
                "fillAlphas": 0.3,
                "type": "column",
                "title": "Jumlah Absen",
                "valueField": "absen",
                "columnWidth": 0.5,
                "legendValueText": "[[value]]",
                "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]] Hari</b>"
            }],
            "chartCursor": {
                "pan": true,
                "valueLineEnabled": true,
                "valueLineBalloonEnabled": true,
                "cursorAlpha": 0,
                "valueLineAlpha": 0.2
            },
            "categoryField": "bulan",
            "categoryAxis": {
                "axisAlpha": 0,
                "lineAlpha": 0,
                "gridAlpha": 0,
                "minorGridEnabled": true,
            },
            "balloon": {
                "borderThickness": 1,
                "shadowAlpha": 0
            },
            "export": {
                "enabled": true
            },
            "dataProvider": [
            <?php foreach($pegawai_dash as $p) : ?>
                <?php $jumlah = $this->m_presensi->chart($p->id, $tahun, $bulan) ?>
                {
                "bulan": "<?= $p->nama_pekerja ?>",
                "absen": <?= $jumlah->jumlah ?>
                },
            <?php endforeach ?>
            ]
        });
        </script>
    <?php endif ?>
    <script>
        if(geo_position_js.init()){
            geo_position_js.getCurrentPosition(success_callback,error_callback,{enableHighAccuracy:true});
        }
        else{
            alert("Functionality not available");
        }

        function success_callback(p)
        {
            const lat       = p.coords.latitude;
            const long      = p.coords.longitude;
            let lokLat      = <?= $this->config->item('latitude') ?> - 0.000100
            let lokLong     = <?= $this->config->item('longtitude') ?> - 0.000100
            let lockLat     = <?= $this->config->item('latitude') ?> + 0.000100
            let lockLong    = <?= $this->config->item('longtitude') ?> + 0.000100
            if ( (lat > lokLat) && (lat < lockLat) ) {
                if ( (long > lockLong) && (long < lokLong) ) {
                    $('#in-location').css('display', 'block')
                } else {
                    $('#in-location').css('display', 'none')
                    $('#non-location').html('Anda Tidak Berada Dalam Lokasi Kantor')
                }
            } else {
                $('#in-location').css('display', 'none')
                $('#non-location').html('Anda Tidak Berada Dalam Lokasi Kantor')
            }
        }

        function error_callback(p)
        {
            alert('error='+p.message);
        }
    </script>
    </body>
</html>