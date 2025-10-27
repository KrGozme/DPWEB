<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kilder</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/css/header.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
    <?php
    if (isset($_GET["views"])) {
        $ruta = explode("/", $_GET["views"]);
        //echo $ruta[1];
    }
    ?>
</head>

<body>
    <!-- HEADER -->
    <header class="header">
        <div class="left-header">
            <button class="menu-toggle" id="menuToggle">
                <i class="bi bi-list"></i>
            </button>
            <h1>Mi Sistema</h1>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Buscar..." />
            <i class="bi bi-search"></i>
        </div>

        <div class="user-info">
            <span>Admin</span>
            <img src="https://m.media-amazon.com/images/M/MV5BZjA0MDgyYmItNzkzMC00OTM2LThlYzktMWMxZWU3ZGNkNDI3XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg" alt="User">
        </div>
    </header>

    <div class="content-wrapper">
        <!-- Sidebar -->
        <nav class="sidebar" aria-label="Menú principal">
            <a href="<?= BASE_URL ?>home" class="active">🏠 Home</a>
            <a href="<?= BASE_URL ?>users">👥 Users</a>
            <a href="<?= BASE_URL ?>products">📦 Products</a>
            <a href="<?= BASE_URL ?>category">🗂️ Categories</a>
            <a href="<?= BASE_URL ?>clients">👤 Clients</a>
            <a href="<?= BASE_URL ?>proveedor">🏭 Proveedores</a>
            <a href="<?= BASE_URL ?>#">🛍️ Shops</a>
            <a href="<?= BASE_URL ?>#">💰 Sales</a>
        </nav>