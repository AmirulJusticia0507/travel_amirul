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
        
        case 'accounts':
            if ($currentPage !== 'accounts.php') {
                header("Location: accounts.php?page=accounts");
                exit;
            }
            break;
            
        case 'customers':
            if ($currentPage !== 'customers.php') {
                header("Location: customers.php?page=customers");
                exit;
            }
            break;

        case 'departments':
            if ($currentPage !== 'departments.php') {
                header("Location: departments.php?page=departments");
                exit;
            }
            break;

        case 'employees':
            if ($currentPage !== 'employees.php') {
                header("Location: employees.php?page=employees");
                exit;
            }
            break;

        case 'financial_transactions':
            if ($currentPage !== 'financial_transactions.php') {
                header("Location: financial_transactions.php?page=financial_transactions");
                exit;
            }
            break;

        case 'product_categories':
            if ($currentPage !== 'product_categories.php') {
                header("Location: product_categories.php?page=product_categories");
                exit;
            }
            break;

        case 'products':
            if ($currentPage !== 'products.php') {
                header("Location: products.php?page=products");
                exit;
            }
            break;

        case 'purchase_details':
            if ($currentPage !== 'purchase_details.php') {
                header("Location: purchase_details.php?page=purchase_details");
                exit;
            }
            break;

        case 'purchases':
            if ($currentPage !== 'purchases.php') {
                header("Location: purchases.php?page=purchases");
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

        case 'productmanagement':
            if ($currentPage !== 'productmanagement.php') {
                header("Location: productmanagement.php?page=productmanagement");
                exit;
            }
            break;

        case 'cart':
            if ($currentPage !== 'cart.php') {
                header("Location: cart.php?page=cart");
                exit;
            }
            break;

        case 'profile':
            if ($currentPage !== 'profile.php') {
                header("Location: profile.php?page=profile");
                exit;
            }
            break;

        case 'categories':
            if ($currentPage !== 'categories.php') {
                header("Location: categories.php?page=categories");
                exit;
            }
            break;

        case 'brands':
            if ($currentPage !== 'brands.php') {
                header("Location: brands.php?page=brands");
                exit;
            }
            break;

        case 'catalog':
            if ($currentPage !== 'catalog.php') {
                header("Location: catalog.php?page=catalog");
                exit;
            }
            break;

        case 'riwayattransaksi':
            if ($currentPage !== 'riwayattransaksi.php') {
                header("Location: riwayattransaksi.php?page=riwayattransaksi");
                exit;
            }
            break;

        case 'wishlist':
            if ($currentPage !== 'wishlist.php') {
                header("Location: wishlist.php?page=wishlist");
                exit;
            }
            break;
            
        default:
            // Handle cases for other pages or provide a default action
            break;
    }
}
?>
