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
        <center><span class="brand-text font-weight-light"> <img src="img/erpsystems.png" alt="" style="width:150px;"></span></center>
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
                <a href="accounts.php?page=accounts" class="nav-link <?php echo isPageActive('accounts'); ?>">
                    <i class="fa fa-book nav-icon"></i>
                    <p>Accounts</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="customers.php?page=customers" class="nav-link <?php echo isPageActive('customers'); ?>">
                    <i class="fa fa-users nav-icon"></i>
                    <p>Customers</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="departments.php?page=departments" class="nav-link <?php echo isPageActive('departments'); ?>">
                    <i class="fa fa-building nav-icon"></i>
                    <p>Departments</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="employees.php?page=employees" class="nav-link <?php echo isPageActive('employees'); ?>">
                    <i class="fa fa-user nav-icon"></i>
                    <p>Employees</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="financial_transactions.php?page=financial_transactions" class="nav-link <?php echo isPageActive('financial_transactions'); ?>">
                    <i class="fa fa-exchange-alt nav-icon"></i>
                    <p>Financial Transactions</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="product_categories.php?page=product_categories" class="nav-link <?php echo isPageActive('product_categories'); ?>">
                    <i class="fa fa-tags nav-icon"></i>
                    <p>Product Categories</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="products.php?page=products" class="nav-link <?php echo isPageActive('products'); ?>">
                    <i class="fa fa-box nav-icon"></i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="purchase_details.php?page=purchase_details" class="nav-link <?php echo isPageActive('purchase_details'); ?>">
                    <i class="fa fa-list-alt nav-icon"></i>
                    <p>Purchase Details</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="purchases.php?page=purchases" class="nav-link <?php echo isPageActive('purchases'); ?>">
                    <i class="fa fa-shopping-cart nav-icon"></i>
                    <p>Purchases</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="invoices.php?page=invoices" class="nav-link <?php echo isPageActive('invoices'); ?>">
                    <i class="fa fa-file-lines nav-icon"></i>
                    <p>Invoices</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="sales.php?page=sales" class="nav-link <?php echo isPageActive('sales'); ?>">
                    <i class="fa fa-chart-line nav-icon"></i>
                    <p>Sales</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="sales_details.php?page=sales_details" class="nav-link <?php echo isPageActive('sales_details'); ?>">
                    <i class="fa fa-receipt nav-icon"></i>
                    <p>Sales Details</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="vendors.php?page=vendors" class="nav-link <?php echo isPageActive('vendors'); ?>">
                    <i class="fa fa-truck nav-icon"></i>
                    <p>Vendors</p>
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