<main class="main">
    <!-- Cabecera de la vista -->
    <header class="main-header">
        <h1 class="main-title">Gestión de Categorias</h1>
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
                        <th>Nombre</th>
                        <th>Detalle</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="content_categorias">
                    <!-- Contenido dinámico -->
                </tbody>
            </table>
        </div>
    </section>
    <script src="<?= BASE_URL ?>view/function/category.js"></script>
</main>