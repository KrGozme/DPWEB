<main class="main home-main">
    <!-- Cabecera de la vista -->
    <header class="main-header">
        <h1 class="main-title">Gestión de Proveedores</h1>
        <div class="main-actions">
            <a href="<?= BASE_URL ?>new-proveedor" class="btn btn-success">+ Nuevo</a>
        </div>
    </header>
    <!-- Contenido principal -->
    <section class="main-content">
        <div class="table-wrapper">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>DNI</th>
                        <th>Nombres y Apellidos</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="content_proveedor">
                    <!-- Contenido dinámico -->
                </tbody>
            </table>
        </div>
    </section>
    <script src="<?= BASE_URL ?>view/function/proveedor.js"></script>
</main>