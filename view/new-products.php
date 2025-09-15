<div class="container mt-4">
    <div class="card">
        <h5 class="card-header">Registrar Nuevo Producto</h5>
        <form id="frm_product" action="" method="">
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-4 col-form-label">Código:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-4 col-form-label">Nombre:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="detalle" class="col-sm-4 col-form-label">Detalle:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="detalle" name="detalle" placeholder="Detalle del producto" required></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="precio" class="col-sm-4 col-form-label">Precio:</label>
                    <div class="col-sm-8">
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" placeholder="Precio" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="stock" class="col-sm-4 col-form-label">Stock:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fecha_vencimiento" class="col-sm-4 col-form-label">Fecha Vencimiento:</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="imagen" class="col-sm-4 col-form-label">Imagen:</label>
                    <div class="col-sm-8">
                        <small>Si subes un archivo, se prioriza sobre la URL.</small>
                        <div id="preview_imagen" class="mb-2" style="width:150px; height:150px; border-radius:30px; overflow:hidden; border:2px solid #ccc; display:flex; align-items:center; justify-content:center;">
                            <span style="color:#aaa;">Vista previa</span>
                        </div>
                        <input type="file" class="form-control mb-2" id="imagen_file" name="imagen_file" accept="image/*">
                        <input type="text" class="form-control" id="imagen_url" name="imagen_url" placeholder="URL de la imagen">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Registrar</button>
                <button type="reset" class="btn btn-info">Limpiar</button>
                <a href="<?php echo BASE_URL; ?>products" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<script src="<?php echo BASE_URL; ?>view/function/Products.js"></script>
