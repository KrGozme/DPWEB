function validar_form(tipo) { 
    let nro_documento = document.getElementById("nro_identidad").value;  
    let razon_social = document.getElementById("razon_social").value;
    let telefono = document.getElementById("telefono").value;
    let correo = document.getElementById("correo").value;
    let departamento = document.getElementById("departamento").value;
    let provincia = document.getElementById("provincia").value;
    let distrito = document.getElementById("distrito").value;
    let cod_postal = document.getElementById("cod_postal").value;
    let direccion = document.getElementById("direccion").value;
    let rol = document.getElementById("rol").value;


    //validamos que los campos no esten vacios
    //si estan vacios mostramos un mensaje de error
    if (nro_documento == "" || razon_social == "" || telefono == "" || correo == "" || departamento == "" || provincia == "" || distrito == "" || cod_postal == "" || direccion == "" || rol == "") {
        Swal.fire({
            //alerta de error al momento de poner campos vacios 
            icon: "error",
            title: "Error existen campos vacios",
            text: "No seas Gil",
        });
        return;
    }
    if (tipo == "nuevo") {
        registrarUsuario();  
    }
    if (tipo == "actualizar") {
        actualizarUsuario();
    }
}
    
if (document.querySelector('#frm_user')) {  // Verifica si existe un formulario con el id 'frm_user' en el documento
    // valida que se envie el formulario 
    let frm_user = document.querySelector('#frm_user');  //Guarda ese formulario en una variable llamada frm_user
    frm_user.onsubmit = function (e) {  // Asigna una función que se ejecutará cuando se envíe el formulario
        e.preventDefault()  // Evita que el formulario se envíe de la manera tradicional, lo que permite manejar el envío con JavaScript
        validar_form("nuevo");  // Llama a la función validar_form para validar los campos del formulario
    }
}

async function registrarUsuario() {  // Función asíncrona para registrar un usuario
    try {
        //capturar campos de formulario (HTML)
        const datos = new FormData(frm_user);
        //enviar datos al controlador
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=registrar',{  // Realiza una petición al controlador UsuarioController.php con el tipo de acción 'registrar'
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();  // Convierte la respuesta del servidor a formato JSON
        // validamos que json.status sea = true
        if (json.status) { 
            alert(json.msg); // Muestra un mensaje de éxito al usuario
            document.getElementById('frm_user').reset();  // Resetea el formulario para que los campos queden vacíos después de registrar
        }else {
            alert(json.msg); // Muestra un mensaje de error al usuario si el registro falla
        }

    } catch (error) {  // Captura cualquier error que ocurra durante el proceso
        console.log("Error al registrar usuario:"+ error)  // Muestra el error en la consola
    }
}


 
async function iniciar_sesion() {  // Función asíncrona para iniciar sesión
    let usuario = document.getElementById("username").value; // Obtiene el valor del campo de usuario
    let password = document.getElementById("password").value;  // Obtiene el valor del campo de contraseña
    //validamos que los campos no esten vacios
    if (usuario == "" || password == "") {
        alert("Error, campos vacios");
        return;
    }
    try {
        //capturar campos de formulario (HTML)
        const datos = new FormData(frm_login);
        //enviar datos al controlador
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=iniciar_sesion', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        // Convertimos la respuesta a formato JSON
        let json =  await respuesta.json();
        // validamos que json.status sea = true
        if (json.status) { //true
            location.replace(base_url + 'new-user'); // Redirige al usuario a la página de nuevo usuario si el inicio de sesión es exitoso
        } else {
            alert(json.msg);  // Muestra un mensaje de error si el inicio de sesión falla
        }
        
    } catch (error) {  // Captura cualquier error que ocurra durante el proceso
        console.log(error);  // Muestra el error en la consola
    } 
} 





async function view_users() {
    try {
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver_usuarios', {
            method: 'GET',
            mode: 'cors',
            cache: 'no-cache'
        });

        let json = await respuesta.json(); 
        let content_users = document.getElementById('content_users');
        content_users.innerHTML = ''; // limpiamos antes de insertar

        json.forEach((user, index) => {
            let fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${index + 1}</td>
                <td>${user.nro_identidad}</td>
                <td>${user.razon_social}</td>
                <td>${user.correo}</td>
                <td>${user.rol}</td>
                <td>${user.estado}</td>
                <td>
                   <a class="btn btn-primary" href="`+base_url+`edit-user/`+user.id+`">editar</a>
                   <button class="btn btn-danger" onclick="delete_user(${user.id})">Eliminar</button>
                </td>
            `;
            content_users.appendChild(fila);
        });

    } catch (error) {
        console.log("Error al obtener usuarios: " + error); 
    }
}

if (document.getElementById('content_users')) {
    view_users();
}


async function edit_user() {
    try {
        let id_persona = document.getElementById('id_persona').value;
        const datos = new FormData();
        datos.append('id_persona', id_persona);
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver', {
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
        document.getElementById('nro_identidad').value = json.data.nro_identidad;
        document.getElementById('razon_social').value = json.data.razon_social;
        document.getElementById('telefono').value = json.data.telefono;
        document.getElementById('correo').value = json.data.correo;
        document.getElementById('departamento').value = json.data.departamento;
        document.getElementById('provincia').value = json.data.provincia;
        document.getElementById('distrito').value = json.data.distrito;
        document.getElementById('cod_postal').value = json.data.cod_postal;
        document.getElementById('direccion').value = json.data.direccion;
        document.getElementById('rol').value = json.data.rol;
        
    } catch (error) {
        console.log("oops, ocurrió un error" + error);
    }
} 

if (document.querySelector('#frm_edit_user')) {  
    // valida que se envie el formulario 
    let frm_user = document.querySelector('#frm_edit_user');  
    frm_user.onsubmit = function (e) {  
        e.preventDefault()  
        validar_form("actualizar");  
    }
}

//actualizar usuario
async function actualizarUsuario() {
    const datos = new FormData(frm_edit_user);
    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=actualizar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json = await respuesta.json();
    if (!json.status) {
        alert("Ooooops, ocurrió un error al actualizar, intentalo nuevamente");
        console.log(json.msg);
        return;
    }else {
        alert(json.msg);
    }
}


// eliminar usuario
async function delete_user(id) {
    if (!confirm("¿Seguro que deseas eliminar este usuario?")) {
        return;
    }

    const datos = new FormData();
    datos.append("id_persona", id);

    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=eliminar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });

    let json = await respuesta.json();

    if (!json.status) {
        alert("Ooooops, ocurrió un error al eliminar");
        console.log(json.msg);
        return;
    } else {
        alert(json.msg);
        if (typeof view_users === "function") {
            view_users(); 
        }
    }
}





async function view_categories() {
    try {
        let respuesta = await fetch(base_url + 'control/CategoriesController.php?tipo=ver_categorias', {
            method: 'GET',
            mode: 'cors',
            cache: 'no-cache'
        });

        let json = await respuesta.json();
        let content = document.getElementById('content_categories');
        content.innerHTML = '';

        json.forEach((cat, index) => {
            let fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${index + 1}</td>
                <td>${cat.nombre}</td>
                <td>${cat.detalle}</td>
                <td>
                    <a class="btn btn-primary" href="`+base_url+`edit-category/`+cat.id+`">Editar</a>
                    <button class="btn btn-danger" onclick="delete_category(${cat.id})">Eliminar</button>
                </td>
            `;
            content.appendChild(fila);
        });

    } catch (error) {
        console.log("Error al obtener categorías: " + error);
    }
}

async function delete_category(id) {
    if (confirm("¿Seguro que deseas eliminar esta categoría?")) {
        try {
            let respuesta = await fetch(base_url + 'control/CategoriesController.php?tipo=eliminar', {
                method: 'POST',
                body: new URLSearchParams({ id: id })
            });

            let result = await respuesta.json();
            alert(result.msg);
            view_categories();

        } catch (error) {
            console.log("Error al eliminar categoría: " + error);
        }
    }
}

// Ejecutar al cargar
if (document.getElementById('content_categories')) {
    view_categories();
}
