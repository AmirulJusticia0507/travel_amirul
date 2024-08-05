<?php
include 'konekke_local.php';

// Periksa apakah pengguna telah terautentikasi
session_start();
if (!isset($_SESSION['userid'])) {
    // Jika tidak ada sesi pengguna, alihkan ke halaman login
    header('Location: login.php');
    exit;
}

// Fungsi untuk mengambil jumlah data dari tabel
function countTableRows($table) {
    global $koneklocalhost;
    $query = "SELECT COUNT(*) as total FROM $table";
    $result = mysqli_query($koneklocalhost, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - ERP Systems</title>
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
    <link rel="icon" href="img/erpsystems.png" type="image/png">
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
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <?php
                include 'navigation.php';
                ?>

                <div class="row" align="center">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="small-box bg-secondary">
                            <div class="inner text-center">
                                <i class="fas fa-file-alt fa-3x"></i>
                                <h5 class="card-title mt-3">Accounts</h5>
                                <p class="card-text">
                                    <?php
                                    // Query untuk menghitung jumlah data accounts
                                    $query = "SELECT COUNT(*) AS total FROM db_erp_systems.accounts";
                                    $result = mysqli_query($koneklocalhost, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['total'] . " records";
                                    ?>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <a href="accounts.php" class="small-box-footer">
                                Manage Accounts <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Lakukan hal yang sama untuk setiap tabel yang Anda sebutkan -->
                    <!-- Contoh untuk tabel customers -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="small-box bg-secondary">
                            <div class="inner text-center">
                                <i class="fas fa-user fa-3x"></i>
                                <h5 class="card-title mt-3">Customers</h5>
                                <p class="card-text">
                                    <?php
                                    // Query untuk menghitung jumlah data customers
                                    $query = "SELECT COUNT(*) AS total FROM db_erp_systems.customers";
                                    $result = mysqli_query($koneklocalhost, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['total'] . " records";
                                    ?>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <a href="customers.php" class="small-box-footer">
                                Manage Customers <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                   <!-- Small box untuk Employees -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="small-box bg-secondary">
                                <div class="inner text-center">
                                    <i class="fas fa-user fa-3x"></i>
                                    <h5 class="card-title mt-3">Employees</h5>
                                    <p class="card-text">
                                        <?php
                                        // Query untuk menghitung jumlah data employees
                                        $query = "SELECT COUNT(*) AS total FROM db_erp_systems.employees";
                                        $result = mysqli_query($koneklocalhost, $query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['total'] . " records";
                                        ?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <a href="employees.php" class="small-box-footer">
                                    Manage Employees <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Small box untuk Vendors -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="small-box bg-secondary">
                                <div class="inner text-center">
                                    <i class="fas fa-truck fa-3x"></i>
                                    <h5 class="card-title mt-3">Vendors</h5>
                                    <p class="card-text">
                                        <?php
                                        // Query untuk menghitung jumlah data vendors
                                        $query = "SELECT COUNT(*) AS total FROM db_erp_systems.vendors";
                                        $result = mysqli_query($koneklocalhost, $query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['total'] . " records";
                                        ?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <a href="vendors.php" class="small-box-footer">
                                    Manage Vendors <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="small-box bg-secondary">
                                <div class="inner text-center">
                                    <i class="fas fa-chart-line fa-3x"></i>
                                    <h5 class="card-title mt-3">Sales</h5>
                                    <p class="card-text">
                                        <?php
                                        // Query untuk menghitung jumlah data sales
                                        $query = "SELECT COUNT(*) AS total FROM db_erp_systems.sales";
                                        $result = mysqli_query($koneklocalhost, $query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['total'] . " records";
                                        ?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <a href="sales.php" class="small-box-footer">
                                    Manage Sales <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    <!-- Lakukan hal yang sama untuk setiap tabel lainnya -->
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