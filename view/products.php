<main class="home-main">
    <!-- Cabecera de la vista -->
    <header class="main-header">
        <h1 class="main-title">Gestión de Productos</h1>
        <div class="main-actions">
            <a href="<?= BASE_URL ?>new-product" class="btn btn-success">+ Nuevo</a>
        </div>
    </header>
    <!-- Contenido principal -->
    <section class="main-content">
        <div class="table-wrapper">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Detalle</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoria</th>
                        <th>F.V.</th>
                        <th>Proveedor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="content_products">
                    <!-- Contenido dinámico -->
                </tbody>
            </table>
        </div>
    </section>
    <script src="<?= BASE_URL ?>view/function/products.js"></script>
</main>
</main>