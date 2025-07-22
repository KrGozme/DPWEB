<div class="container">
    <div class="p-2 pt-1 pb-1" style="justify-content: space-between; display: flex; background-color: #ffcb3cff; border:solid 5px #000;">
        <h1 style="font-weight:900; font-family: Arial;">Lista de usuarios</h1>
        <button style="font-weight:700" type="button" class="btn btn-success">
            <a class="nav-link" href="<?php echo BASE_URL; ?>new-user">new users</a>
        </button>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nro</th>
                <th>DNI</th>
                <th>Nombres y Apellidos</th>
                <th>correo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="content_users">

        </tbody>
    </table>
</div>
<script src="<?php echo BASE_URL; ?>view/function/user.js"></script>
<!--<script>view_users();</script>-->