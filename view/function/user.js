function validar_form() {  //funcion para validar los campos del formulario
    //capturar campos de formulario (HTML)
    let nro_documento = document.getElementById("nro_identidad").value;  // Obtiene el valor escrito en el input con id="nro_identidad" y lo guarda en la variable nro_documento
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
    registrarUsuario();  //llamamos a la funcion registrarUsuario para enviar los datos al controlador
}
    
if (document.querySelector('#frm_user')) {  // Verifica si existe un formulario con el id 'frm_user' en el documento
    // valida que se envie el formulario 
    let frm_user = document.querySelector('#frm_user');  //Guarda ese formulario en una variable llamada frm_user
    frm_user.onsubmit = function (e) {  // Asigna una función que se ejecutará cuando se envíe el formulario
        e.preventDefault()  // Evita que el formulario se envíe de la manera tradicional, lo que permite manejar el envío con JavaScript
        validar_form();  // Llama a la función validar_form para validar los campos del formulario
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

