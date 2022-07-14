<?php include_once('../_header.php'); ?>

<!-- Integrasi DataTables Server-side dengan PHP dan Bootstrap -->

<div class="box">
    <a href="#menu-toggle" class="btn btn-default btn-xs" id="menu-toggle">Toggle Menu</a>
    <h3>
        Data Pasien
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Pasien</a>
        </div>
    </h3>
    <div class="table-responsive">
        <!-- Data Tables Server-side id (id="pasien") -->
        <table class="table table-striped table-bordered table-hover" id="pasien">
            <thead>
                <tr>
                    <th>No Identitas</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th><i class="glyphicon glyphicon-cog"></i></th>
                </tr>
            </thead>
        </table>
    </div>

    <!-- Data Tables Server Side-->
    <script>
        $(document).ready(function() {
            $('#pasien').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'pasien_data.php', //server (pasien_data.php)
                scrollY: '340px', //scroll tabel body
                dom: 'Bfrtip', //export
                buttons: [{
                        extend: 'pdf',
                        orientation: 'potrait',
                        pageSize: 'Legal',
                        title: 'Data Pasien AM Klinik',
                        download: 'open'
                    },
                    'csv', 'excel', 'print', 'copy'
                ],
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 4,
                    "render": function(data, type, row) {
                        var btn = "<center><a href=\"edit.php?id=" + data + "\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a> <a href=\"del.php?id=" + data + "\" onclick=\"return confirm('Yakin menghapus data?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
                        return btn;
                    }
                }]
            });
        });
    </script>

</div>



<?php include_once('../_footer.php'); ?>