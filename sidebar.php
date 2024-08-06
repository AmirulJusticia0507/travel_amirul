<?php
// sidebar.php

function isPageActive($pageName) {
    if (isset($_GET['page']) && $_GET['page'] == $pageName) {
        return 'active';
    }
    return '';
}

$usersid = isset($_SESSION['usersid']) ? $_SESSION['usersid'] : '';

?>

<style>
    /* CSS untuk spinner */
.page-spinner {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Warna latar belakang dengan transparan */
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.spinner {
    border: 4px solid rgba(0, 0, 0, 0.3);
    border-radius: 50%;
    border-top: 4px solid #007bff; /* Warna utama */
    width: 40px;
    height: 40px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #2c3e50; color: #ecf0f1;">
    <!-- Tambahkan konten sidebar AdminLTE di sini -->
    <a href="index.php?page=dashboard" class="brand-link">
        <center><span class="brand-text font-weight-light"> <img src="img/travelku.png" alt="" style="width:150px;"></span></center>
    </a>
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column nowrap" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="index.php?page=dashboard" class="nav-link <?php echo isPageActive('dashboard'); ?>">
                    <i class="fa fa-tachometer-alt nav-icon"></i>
                    <p>Home</p>
                </a>
            </li>
            <li class="nav-header">MAIN NAVIGATION</li>
            <li class="nav-item">
                <a href="buses.php?page=buses" class="nav-link <?php echo isPageActive('buses'); ?>">
                    <i class="fa fa-bus nav-icon"></i>
                    <p>Buses</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="cars.php?page=cars" class="nav-link <?php echo isPageActive('cars'); ?>">
                    <i class="fa fa-car nav-icon"></i>
                    <p>Cars</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="trips.php?page=trips" class="nav-link <?php echo isPageActive('trips'); ?>">
                    <i class="fa fa-map nav-icon"></i>
                    <p>Trips</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="reservations.php?page=reservations" class="nav-link <?php echo isPageActive('reservations'); ?>">
                    <i class="fa fa-ticket-alt nav-icon"></i>
                    <p>Reservations</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="drivers.php?page=drivers" class="nav-link <?php echo isPageActive('drivers'); ?>">
                    <i class="fa fa-id-card nav-icon"></i>
                    <p>Drivers</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="payments.php?page=payments" class="nav-link <?php echo isPageActive('payments'); ?>">
                    <i class="fa fa-credit-card nav-icon"></i>
                    <p>Payments</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="feedbacks.php?page=feedbacks" class="nav-link <?php echo isPageActive('feedbacks'); ?>">
                    <i class="fa fa-comments nav-icon"></i>
                    <p>Feedbacks</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="user_management.php?page=user_management" class="nav-link <?php echo isPageActive('user_management'); ?>">
                    <i class="fa fa-users-cog nav-icon"></i>
                    <p>User Management</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link logout-link">
                    <i class="fas fa-sign-out-alt nav-icon"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</aside>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Skrip JavaScript untuk mengontrol pushmenu -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const body = document.querySelector("body");
        const pageSpinner = document.getElementById("page-spinner");

        // Function to toggle the sidebar
        const toggleSidebar = () => {
            body.classList.toggle("sidebar-collapse");
            body.classList.toggle("sidebar-open");
        };

        // Add event listener to the sidebar button
        const sidebarButton = document.querySelector(".nav-link[data-widget='pushmenu']");
        sidebarButton.addEventListener("click", function (e) {
            e.preventDefault();
            toggleSidebar();
        });

        // Add event listener to the caret-down icons for submenu
        const submenuToggles = document.querySelectorAll(".nav-item.has-treeview > .nav-link > .fas.fa-caret-down");
        submenuToggles.forEach((toggle) => {
            toggle.addEventListener("click", function (e) {
                e.preventDefault();
                const parent = toggle.parentElement.parentElement;
                parent.classList.toggle("menu-open");
            });
        });

        // Fungsi untuk menampilkan spinner
        function showSpinner() {
            pageSpinner.style.display = "flex";
        }

        // Fungsi untuk menyembunyikan spinner
        function hideSpinner() {
            pageSpinner.style.display = "none";
        }

        // Tambahkan event listener ke setiap tautan navigasi yang akan menampilkan spinner
        const navLinks = document.querySelectorAll(".nav-link");
        navLinks.forEach(function (link) {
            link.addEventListener("click", function () {
                showSpinner();
            });
        });

        // Sembunyikan spinner saat halaman baru dimuat
        window.addEventListener("load", function () {
            hideSpinner();
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Fungsi untuk menampilkan SweetAlert konfirmasi logout
    function confirmLogout() {
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: 'Anda yakin ingin logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke halaman logout.php jika pengguna menekan "Ya"
                window.location.href = "logout.php";
            }
        });
    }

    // Tambahkan event listener ke tautan "Logout"
    const logoutLink = document.querySelector(".logout-link");
    logoutLink.addEventListener("click", function (e) {
        e.preventDefault();
        confirmLogout();
    });
});
</script>