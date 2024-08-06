<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $currentPage = basename($_SERVER['PHP_SELF']); // Mendapatkan halaman saat ini

    switch ($page) {
        case 'dashboard':
            if ($currentPage !== 'index.php') {
                header("Location: index.php?page=dashboard");
                exit;
            }
            break;
        
        case 'buses':
            if ($currentPage !== 'buses.php') {
                header("Location: buses.php?page=buses");
                exit;
            }
            break;
            
        case 'cars':
            if ($currentPage !== 'cars.php') {
                header("Location: cars.php?page=cars");
                exit;
            }
            break;

        case 'drivers':
            if ($currentPage !== 'drivers.php') {
                header("Location: drivers.php?page=drivers");
                exit;
            }
            break;

        case 'feedbacks':
            if ($currentPage !== 'feedbacks.php') {
                header("Location: feedbacks.php?page=feedbacks");
                exit;
            }
            break;

        case 'payments':
            if ($currentPage !== 'payments.php') {
                header("Location: payments.php?page=payments");
                exit;
            }
            break;

        case 'reservations':
            if ($currentPage !== 'reservations.php') {
                header("Location: reservations.php?page=reservations");
                exit;
            }
            break;

        case 'trips':
            if ($currentPage !== 'trips.php') {
                header("Location: trips.php?page=trips");
                exit;
            }
            break;

        case 'user_management':
            if ($currentPage !== 'user_management.php') {
                header("Location: user_management.php?page=user_management");
                exit;
            }
            break;

        case 'invoices':
            if ($currentPage !== 'invoices.php') {
                header("Location: invoices.php?page=invoices");
                exit;
            }
            break;

        case 'sales':
            if ($currentPage !== 'sales.php') {
                header("Location: sales.php?page=sales");
                exit;
            }
            break;

        case 'sales_details':
            if ($currentPage !== 'sales_details.php') {
                header("Location: sales_details.php?page=sales_details");
                exit;
            }
            break;

        case 'vendors':
            if ($currentPage !== 'vendors.php') {
                header("Location: vendors.php?page=vendors");
                exit;
            }
            break;

        case 'logout':
            if ($currentPage !== 'logout.php') {
                header("Location: logout.php?page=logout");
                exit;
            }
            break;
            
        default:
            // Handle cases for other pages or provide a default action
            break;
    }
}
?>
