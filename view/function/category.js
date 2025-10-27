function validar_form(tipo) {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;
    if (nombre == "" || detalle == "") {
        Swal.fire({
            title: "Error campos vacios!",
            icon: "Error",
            draggable: true
        });
        return;
    }
    if (tipo == "nuevo") {
        registrarCategoria();
    }
    if (tipo == "actualizar") {
        actualizarCategoria();
    }
}

if (document.querySelector('#frm_category')) {
    let frm_category = document.querySelector('#frm_category');
    frm_category.onsubmit = function (e) {
        e.preventDefault();
        validar_form("nuevo");
    }
}

// Registrar Categoria
async function registrarCategoria() {
    try {
        const datos = new FormData(frm_category);
        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_category').reset();
        } else {
            alert(json.msg);
        }
    } catch (e) {
        console.log("Error al registrar Categoria:" + e);
    }
}

// Ver Categoria
async function view_categorias() {
    try {
        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=ver_categorias', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        json = await respuesta.json();
        contenidot = document.getElementById('content_categorias');
        if (json.status) {
            let cont = 1;
            json.data.forEach(categoria => {
                
                let nueva_fila = document.createElement("tr");
                nueva_fila.id = "fila" + categoria.id;
                nueva_fila.className = "filas_tabla";
                nueva_fila.innerHTML = `<td>${cont}</td>
                                        <td>${categoria.nombre}</td>
                                        <td>${categoria.detalle}</td>
                                        <td>
                                          <a class="btn btn-primary" href="`+ base_url + `edit-category/` + categoria.id + `">Editar</a>
                                          <button class="btn btn-danger" onclick="fn_eliminar(` + categoria.id + `);">Eliminar</button>
                                        </td>`;
                cont++;
                contenidot.appendChild(nueva_fila);
            });
        }
    } catch (error) {
        console.log('error en mostrar categoria ' + error);
    }
}
if (document.getElementById('content_categorias')) {
    view_categorias();
}

// Editar Categoria
async function edit_categoria() {
    try {
        let id_categoria = document.getElementById('id_categoria').value;
        const datos = new FormData();
        datos.append('id_categoria', id_categoria);
        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=ver', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (!json.status) {
            alert(json.msg);
            return;
        }
        document.getElementById('nombre').value = json.data.nombre;
        document.getElementById('detalle').value = json.data.detalle;
    } catch (error) {
        console.log('oops, ocurrió un error ' + error);
    }
}
if (document.querySelector('#frm_edit_category')) {
    edit_categoria();
    let frm_user = document.querySelector('#frm_edit_category');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form("actualizar");
    }
}

// Actualizar Categoria
async function actualizarCategoria() {
    const datos = new FormData(frm_edit_category);
    let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=actualizar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json = await respuesta.json();
    if (!json.status) {
        alert("Oooooops, ocurrio un error al actualizar, intentelo nuevamente");
        console.log(json.msg);
        return;
    }else{
        alert(json.msg);
    }
}

// Eliminar Categoria
async function fn_eliminar(id) {
    if (window.confirm("Confirmar eliminar?")) {
        eliminar(id);
    }
}
async function eliminar(id) {
    let datos = new FormData();
    datos.append('id_categoria', id);
    let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=eliminar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json = await respuesta.json();
    if (!json.status) {
        alert("Oooooops, ocurrio un error al eliminar categhoria, intentelo mas tarde");
        console.log(json.msg);
        return;
    }else{
        alert(json.msg);
        location.replace(base_url + 'category');
    }
}