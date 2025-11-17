<div class="container-fluid mt-4 row">
    <div class="col-8">
        <div class="card">
            <div class="card-body ">
                <div class="search-box d-flex mb-3">
                    <h5 class="card-title">Busqueda de Productos</h5>
                    <input type="text" id="busqueda_venta" class="form-control" placeholder="Buscar..." onkeyup="viewProductosVendedor();">
                </div>
                <div class="overflow-auto" style="height: 75vmin;">
                    <div class="row container-fluid" id="productos-container">
                        <!-- Productos se cargan aquí dinámicamente -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Lista de Compra</h5>
                <div class="row" style="min-height: 500px;">
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="lista_compra">
                                <tr>
                                    <td>Laptop</td>
                                    <td>2</td>
                                    <td>$10.00</td>
                                    <td>$20.00</td>
                                    <td><button class="btn btn-danger btn-sm">Eliminar</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-end">
                        <h4>Subtotal : <label id="">$20.00</label></h4>
                        <h4>Igv : <label id="">$20.00</label></h4>
                        <h4>Total : <label id="">$20.00</label></h4>
                        <button class="btn btn-success">Realizar Venta</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= BASE_URL ?>view/function/products.js"></script>
<script src="<?= BASE_URL ?>view/function/venta.js"></script>