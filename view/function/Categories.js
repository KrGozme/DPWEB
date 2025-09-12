function validar_form_categoria() {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;

    if (nombre == "" || detalle == "") {
        Swal.fire({
            icon: "error",
            title: "Error: Campos vacíos",
            text: "Por favor, completa todos los campos.",
        });
        return;
    }     

    registrarCategoria();
}

if (document.querySelector('#frm_category')) {
    let frm_category = document.querySelector('#frm_category');
    frm_category.onsubmit = function (e) {
        e.preventDefault();
        validar_form_categoria();
    }
}

async function registrarCategoria() {
    try {
        const datos = new FormData(frm_category);
        let respuesta = await fetch(base_url + 'control/CategoriesControler.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();

        if (json.status) {
            Swal.fire("Registrado", json.msg, "success");
            document.getElementById('frm_category').reset();
        } else {
            Swal.fire("Error", json.msg, "error");
        }

    } catch (error) {
        console.log("Error al registrar categoría: " + error);
    }
}








// Obtener todas las categorías
document.addEventListener("DOMContentLoaded", function() {
    cargarCategorias();
});

async function cargarCategorias() {
    try {
        const response = await fetch(base_url + 'control/CategoriesControler.php?tipo=listar');
        const data = await response.json();
        const tbody = document.getElementById("content_categories");
        let html = "";

        data.forEach((category, index) => {
            html += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${category.nombre}</td>
                    <td>${category.detalle}</td>
                    <td>
                        <a class="btn btn-primary" href="`+base_url+`edit-categories/`+category.id+`">editar</a>
                        <button class="btn btn-danger" onclick="deleteCategory(${category.id})">Eliminar</button>
                    </td>
                </tr>
            `;
        });

        tbody.innerHTML = html;
    } catch (error) {
        console.error("Error al cargar categorías:", error);
    }
}



