<?php
include 'konekke_local.php';

// Periksa apakah pengguna telah terautentikasi
session_start();
if (!isset($_SESSION['userid'])) {
    // Jika tidak ada sesi pengguna, alihkan ke halaman login
    header('Location: login.php');
    exit;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bus - Travelku</title>
    <!-- Tambahkan link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan link AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- Tambahkan link DataTables CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="checkbox.css">
    <!-- Sertakan CSS Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <link rel="stylesheet" href="uploadfoto.css"> -->
    <link rel="icon" href="img/travelku.png" type="image/png">
    <style>
        /* Tambahkan CSS agar tombol accordion terlihat dengan baik */
        .btn-link {
            text-decoration: none;
            color: #007bff; /* Warna teks tombol */
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        .card-header {
            background-color: #f7f7f7; /* Warna latar belakang header card */
        }

        #notification {
            display: none;
            margin-top: 10px; /* Adjust this value based on your layout */
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f8f8f8;
            color: #333;
        }
    </style>
    <style>
        .myButtonCekSaldo {
            box-shadow: 3px 4px 0px 0px #899599;
            background:linear-gradient(to bottom, #ededed 5%, #bab1ba 100%);
            background-color:#ededed;
            border-radius:15px;
            border:1px solid #d6bcd6;
            display:inline-block;
            cursor:pointer;
            color:#3a8a9e;
            font-family:Arial;
            font-size:17px;
            padding:7px 25px;
            text-decoration:none;
            text-shadow:0px 1px 0px #e1e2ed;
        }
        .myButtonCekSaldo:hover {
            background:linear-gradient(to bottom, #bab1ba 5%, #ededed 100%);
            background-color:#bab1ba;
        }
        .myButtonCekSaldo:active {
            position:relative;
            top:1px;
        }

        #imagePreview img {
            margin-right: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 5px;
            height: 150px;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <?php include 'header.php'; ?>
        </nav>
        
        <?php include 'sidebar.php'; ?>

        <div class="content-wrapper">
            <!-- Konten Utama -->
            <main class="content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bus</li>
                    </ol>
                </nav>
                <?php
                include 'navigation.php';
                ?>

                    <h2>Data Bus</h2>
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBusModal">Tambah Bus</button>
                    <table id="busTable" class="display table table-bordered table-striped table-hover responsive nowrap" style="width:100%" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nomor Polisi</th>
                                <th>Merk</th>
                                <th>Model</th>
                                <th>Tahun</th>
                                <th>Kapasitas</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be populated by jQuery -->
                        </tbody>
                    </table>

                <!-- Add Bus Modal -->
                <div class="modal fade" id="addBusModal" tabindex="-1" aria-labelledby="addBusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addBusModalLabel">Tambah Bus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addBusForm">
                                    <div class="mb-3">
                                        <label for="addNomorPolisi" class="form-label">Nomor Polisi</label>
                                        <input type="text" class="form-control" id="addNomorPolisi" name="nomor_polisi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addMerk" class="form-label">Merk</label>
                                        <input type="text" class="form-control" id="addMerk" name="merk" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addModel" class="form-label">Model</label>
                                        <input type="text" class="form-control" id="addModel" name="model" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addTahun" class="form-label">Tahun</label>
                                        <input type="text" class="form-control" id="addTahun" name="tahun" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addKapasitas" class="form-label">Kapasitas</label>
                                        <input type="number" class="form-control" id="addKapasitas" name="kapasitas" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addStatus" class="form-label">Status</label>
                                        <input type="text" class="form-control" id="addStatus" name="status" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Bus Modal -->
                <div class="modal fade" id="editBusModal" tabindex="-1" aria-labelledby="editBusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editBusModalLabel">Edit Bus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editBusForm">
                                    <input type="hidden" id="editBusId" name="id">
                                    <div class="mb-3">
                                        <label for="editNomorPolisi" class="form-label">Nomor Polisi</label>
                                        <input type="text" class="form-control" id="editNomorPolisi" name="nomor_polisi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editMerk" class="form-label">Merk</label>
                                        <input type="text" class="form-control" id="editMerk" name="merk" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editModel" class="form-label">Model</label>
                                        <input type="text" class="form-control" id="editModel" name="model" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editTahun" class="form-label">Tahun</label>
                                        <input type="text" class="form-control" id="editTahun" name="tahun" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editKapasitas" class="form-label">Kapasitas</label>
                                        <input type="number" class="form-control" id="editKapasitas" name="kapasitas" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editStatus" class="form-label">Status</label>
                                        <input type="text" class="form-control" id="editStatus" name="status" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Bus Modal -->
                <div class="modal fade" id="deleteBusModal" tabindex="-1" aria-labelledby="deleteBusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteBusModalLabel">Hapus Bus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus bus ini?</p>
                                <form id="deleteBusForm">
                                    <input type="hidden" id="deleteBusId" name="id">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
<?php include 'footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>    
<!-- Tambahkan Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            // Tambahkan event click pada tombol pushmenu
            $('.nav-link[data-widget="pushmenu"]').on('click', function() {
                // Toggle class 'sidebar-collapse' pada elemen body
                $('body').toggleClass('sidebar-collapse');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#busTable').DataTable({
                "ajax": "fetch_buses.php",
                "columns": [
                    { "data": "id" },
                    { "data": "nomor_polisi" },
                    { "data": "merk" },
                    { "data": "model" },
                    { "data": "tahun" },
                    { "data": "kapasitas" },
                    { "data": "status" },
                    { "data": null, "render": function (data, type, row) {
                        return '<button class="btn btn-warning btn-sm editBtn" data-bs-toggle="modal" data-bs-target="#editBusModal" data-id="'+row.id+'" data-nomor_polisi="'+row.nomor_polisi+'" data-merk="'+row.merk+'" data-model="'+row.model+'" data-tahun="'+row.tahun+'" data-kapasitas="'+row.kapasitas+'" data-status="'+row.status+'">Edit</button>' +
                               '<button class="btn btn-danger btn-sm deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteBusModal" data-id="'+row.id+'">Delete</button>';
                    }}
                ]
            });

            // Add Bus
            $('#addBusForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'add_bus.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#addBusModal').modal('hide');
                        table.ajax.reload();
                    }
                });
            });

            // Edit Bus
            $('#editBusModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var nomor_polisi = button.data('nomor_polisi');
                var merk = button.data('merk');
                var model = button.data('model');
                var tahun = button.data('tahun');
                var kapasitas = button.data('kapasitas');
                var status = button.data('status');

                var modal = $(this);
                modal.find('#editBusId').val(id);
                modal.find('#editNomorPolisi').val(nomor_polisi);
                modal.find('#editMerk').val(merk);
                modal.find('#editModel').val(model);
                modal.find('#editTahun').val(tahun);
                modal.find('#editKapasitas').val(kapasitas);
                modal.find('#editStatus').val(status);
            });

            $('#editBusForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'edit_bus.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#editBusModal').modal('hide');
                        table.ajax.reload();
                    }
                });
            });

            // Delete Bus
            $('#deleteBusModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');

                var modal = $(this);
                modal.find('#deleteBusId').val(id);
            });

            $('#deleteBusForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'delete_bus.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#deleteBusModal').modal('hide');
                        table.ajax.reload();
                    }
                });
            });
        });
    </script>

</body>
</html>