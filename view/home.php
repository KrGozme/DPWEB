<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Comercial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f8f9fa;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background: #1a1d29;
            padding: 30px 0;
            z-index: 1000;
        }

        .logo-section {
            padding: 0 30px 30px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 30px;
        }

        .logo-section h2 {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }

        .logo-section p {
            color: rgba(255,255,255,0.6);
            font-size: 0.85rem;
            margin: 5px 0 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 15px 30px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .menu-item:hover {
            background: rgba(255,255,255,0.05);
            color: white;
            border-left-color: #4f46e5;
        }

        .menu-item.active {
            background: rgba(79, 70, 229, 0.1);
            color: white;
            border-left-color: #4f46e5;
        }

        .menu-item i {
            width: 24px;
            margin-right: 15px;
            font-size: 1.1rem;
        }

        .main-content {
            margin-left: 280px;
            padding: 30px;
            height: 100vh;
            overflow-y: auto;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .welcome-section h1 {
            font-size: 2rem;
            color: #1a1d29;
            font-weight: 700;
            margin: 0;
        }

        .welcome-section p {
            color: #6b7280;
            margin: 5px 0 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transform: translateY(-2px);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .stat-card.blue .stat-icon {
            background: #eff6ff;
            color: #3b82f6;
        }

        .stat-card.green .stat-icon {
            background: #f0fdf4;
            color: #22c55e;
        }

        .stat-card.purple .stat-icon {
            background: #faf5ff;
            color: #a855f7;
        }

        .stat-card.orange .stat-icon {
            background: #fff7ed;
            color: #f97316;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a1d29;
            margin: 0;
        }

        .stat-label {
            color: #6b7280;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .modules-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            border: 1px solid #e5e7eb;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-header h2 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #1a1d29;
            margin: 0;
        }

        .modules-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .module-card {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 25px 20px;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
        }

        .module-card:hover {
            background: white;
            border-color: #4f46e5;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.15);
            transform: translateY(-3px);
        }

        .module-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.8rem;
            color: white;
            transition: all 0.3s ease;
        }

        .module-card:hover .module-icon {
            transform: scale(1.1);
        }

        .module-card:nth-child(1) .module-icon { background: linear-gradient(135deg, #667eea, #764ba2); }
        .module-card:nth-child(2) .module-icon { background: linear-gradient(135deg, #f093fb, #f5576c); }
        .module-card:nth-child(3) .module-icon { background: linear-gradient(135deg, #4facfe, #00f2fe); }
        .module-card:nth-child(4) .module-icon { background: linear-gradient(135deg, #43e97b, #38f9d7); }
        .module-card:nth-child(5) .module-icon { background: linear-gradient(135deg, #fa709a, #fee140); }
        .module-card:nth-child(6) .module-icon { background: linear-gradient(135deg, #30cfd0, #330867); }
        .module-card:nth-child(7) .module-icon { background: linear-gradient(135deg, #a8edea, #fed6e3); }
        .module-card:nth-child(8) .module-icon { background: linear-gradient(135deg, #ff6b6b, #feca57); }

        .module-title {
            font-size: 1rem;
            font-weight: 600;
            color: #1a1d29;
            margin-bottom: 5px;
        }

        .module-desc {
            font-size: 0.85rem;
            color: #6b7280;
        }

        @media (max-width: 1400px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .modules-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }
            .logo-section h2,
            .logo-section p,
            .menu-item span {
                display: none;
            }
            .menu-item {
                justify-content: center;
                padding: 15px;
            }
            .menu-item i {
                margin: 0;
            }
            .main-content {
                margin-left: 70px;
            }
            .modules-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-section">
            <h2><i class="fas fa-store"></i> TuTienda</h2>
            <p>Sistema de Gestión</p>
        </div>
        <a href="<?= BASE_URL ?>" class="menu-item active">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
        <a href="<?= BASE_URL ?>users" class="menu-item">
            <i class="fas fa-users"></i>
            <span>Usuarios</span>
        </a>
        <a href="<?= BASE_URL ?>products" class="menu-item">
            <i class="fas fa-box"></i>
            <span>Productos</span>
        </a>
        <a href="<?= BASE_URL ?>category" class="menu-item">
            <i class="fas fa-tags"></i>
            <span>Categorías</span>
        </a>
        <a href="<?= BASE_URL ?>clients" class="menu-item">
            <i class="fas fa-user-tie"></i>
            <span>Clientes</span>
        </a>
        <a href="<?= BASE_URL ?>proveedor" class="menu-item">
            <i class="fas fa-truck"></i>
            <span>Proveedores</span>
        </a>
        <a href="<?= BASE_URL ?>" class="menu-item">
            <i class="fas fa-shopping-bag"></i>
            <span>Tiendas</span>
        </a>
        <a href="#" class="menu-item">
            <i class="fas fa-chart-line"></i>
            <span>Ventas</span>
        </a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <div class="welcome-section">
                <h1>Bienvenido al Dashboard</h1>
                <p>Panel de control y gestión comercial</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card blue">
                <div class="stat-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="stat-value">1,234</div>
                <div class="stat-label">Ventas del Mes</div>
            </div>

            <div class="stat-card green">
                <div class="stat-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-value">S/. 45,678</div>
                <div class="stat-label">Ingresos Totales</div>
            </div>

            <div class="stat-card purple">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-value">856</div>
                <div class="stat-label">Clientes Activos</div>
            </div>

            <div class="stat-card orange">
                <div class="stat-icon">
                    <i class="fas fa-box"></i>
                </div>
                <div class="stat-value">3,456</div>
                <div class="stat-label">Productos en Stock</div>
            </div>
        </div>

        <!-- Modules Section -->
        <div class="modules-section">
            <div class="section-header">
                <h2>Módulos del Sistema</h2>
            </div>

            <div class="modules-grid">
                <a href="<?= BASE_URL ?>users" class="module-card">
                    <div class="module-icon">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <div class="module-title">Usuarios</div>
                    <div class="module-desc">Gestión de usuarios</div>
                </a>

                <a href="<?= BASE_URL ?>products" class="module-card">
                    <div class="module-icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="module-title">Productos</div>
                    <div class="module-desc">Inventario completo</div>
                </a>

                <a href="<?= BASE_URL ?>category" class="module-card">
                    <div class="module-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="module-title">Categorías</div>
                    <div class="module-desc">Clasificación</div>
                </a>

                <a href="<?= BASE_URL ?>clients" class="module-card">
                    <div class="module-icon">
                        <i class="fas fa-address-book"></i>
                    </div>
                    <div class="module-title">Clientes</div>
                    <div class="module-desc">Base de datos</div>
                </a>

                <a href="<?= BASE_URL ?>proveedor" class="module-card">
                    <div class="module-icon">
                        <i class="fas fa-truck-loading"></i>
                    </div>
                    <div class="module-title">Proveedores</div>
                    <div class="module-desc">Gestión de proveedores</div>
                </a>

                <a href="<?= BASE_URL ?>" class="module-card">
                    <div class="module-icon">
                        <i class="fas fa-store-alt"></i>
                    </div>
                    <div class="module-title">Tiendas</div>
                    <div class="module-desc">Puntos de venta</div>
                </a>

                <a href="#" class="module-card">
                    <div class="module-icon">
                        <i class="fas fa-cash-register"></i>
                    </div>
                    <div class="module-title">Ventas</div>
                    <div class="module-desc">Registro de ventas</div>
                </a>

                <a href="#" class="module-card">
                    <div class="module-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div class="module-title">Reportes</div>
                    <div class="module-desc">Análisis y estadísticas</div>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>