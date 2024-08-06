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
    <style>
        /* Bus Seat Layout CSS */
        .bus {
            width: 60%;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .row {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .seat-row {
            display: flex;
            justify-content: space-between;
        }

        .seat {
            width: 50px;
            height: 50px;
            background-color: #28a745;
            color: #fff;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 2px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .seat:hover {
            background-color: #218838;
        }

        .driver {
            margin-bottom: 20px;
        }

        .driver-seat {
            background-color: #ffc107;
            color: #000;
            cursor: default;
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

                <!-- Bus Type Selection -->
                <div class="container mt-4">
                    <h3 class="text-center">Bus Seat Layout</h3>
                    <div class="form-group">
                        <label for="busType">Select Bus Type:</label>
                        <select class="form-control" id="busType">
                            <option value="regular">Regular Bus (60 seats)</option>
                            <option value="travel">Travel Bus</option>
                        </select>
                    </div>

                    <!-- Regular Bus Seat Layout -->
                    <div id="regularBus" class="bus d-none">
                        <div class="row driver">
                            <div class="col-12 text-end">
                                <div class="seat driver-seat">Driver</div>
                            </div>
                        </div>
                        <?php for ($i = 1; $i <= 15; $i++): ?>
                        <div class="row">
                            <div class="col-6 seat-row">
                                <div class="seat"><?= $i * 4 - 3 ?>A</div>
                                <div class="seat"><?= $i * 4 - 2 ?>B</div>
                            </div>
                            <div class="col-6 seat-row">
                                <div class="seat"><?= $i * 4 - 1 ?>C</div>
                                <div class="seat"><?= $i * 4 ?>D</div>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>

                    <!-- Travel Bus Seat Layout -->
                    <div id="travelBus" class="bus d-none">
                        <div class="row driver">
                            <div class="col-12 text-end">
                                <div class="seat driver-seat">Driver</div>
                            </div>
                        </div>
                        <!-- 3 rows of seats with 2-2 configuration -->
                        <?php for ($i = 1; $i <= 3; $i++): ?>
                        <div class="row">
                            <div class="col-6 seat-row">
                                <div class="seat"><?= $i * 4 - 3 ?>A</div>
                                <div class="seat"><?= $i * 4 - 2 ?>B</div>
                            </div>
                            <div class="col-6 seat-row">
                                <div class="seat"><?= $i * 4 - 1 ?>C</div>
                                <div class="seat"><?= $i * 4 ?>D</div>
                            </div>
                        </div>
                        <?php endfor; ?>
                        <!-- Additional seats for travel bus -->
                        <div class="row">
                            <div class="col-3 seat-row">
                                <div class="seat">10A</div>
                            </div>
                            <div class="col-9 seat-row">
                                <div class="seat">10B</div>
                                <div class="seat">10C</div>
                                <div class="seat">10D</div>
                            </div>
                        </div>
                        <?php for ($i = 11; $i <= 14; $i++): ?>
                        <div class="row">
                            <div class="col-3 seat-row">
                                <div class="seat"><?= $i ?>A</div>
                            </div>
                            <div class="col-9 seat-row">
                                <div class="seat"><?= $i ?>B</div>
                                <div class="seat"><?= $i ?>C</div>
                                <div class="seat"><?= $i ?>D</div>
                            </div>
                        </div>
                        <?php endfor; ?>
                        <div class="row">
                            <div class="col-12 seat-row">
                                <div class="seat">15A</div>
                                <div class="seat">15B</div>
                                <div class="seat">15C</div>
                                <div class="seat">15D</div>
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
    

</body>
</html>