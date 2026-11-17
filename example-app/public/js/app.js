document.addEventListener("DOMContentLoaded", function () {

    const formEstudiante = document.getElementById("formEstudiante");
    const mensajeError = document.getElementById("mensajeError");

    if (formEstudiante && mensajeError) {

        formEstudiante.addEventListener("submit", function (evento) {

            mensajeError.textContent = "";
            mensajeError.classList.add("d-none");

            const nombre = document.getElementById("nombre").value.trim();
            const cedula = document.getElementById("cedula").value.trim();
            const correo = document.getElementById("correo").value.trim();
            const asignatura = document.getElementById("asignatura").value;

            let errores = [];

            if (nombre === "") {
                errores.push("El nombre es obligatorio.");
            } else if (nombre.length < 3) {
                errores.push("El nombre debe tener al menos 3 caracteres.");
            }

            if (cedula === "") {
                errores.push("La cédula es obligatoria.");
            } else if (!/^[0-9]+$/.test(cedula)) {
                errores.push("La cédula debe contener únicamente números.");
            }

            if (correo === "") {
                errores.push("El correo electrónico es obligatorio.");
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo)) {
                errores.push("Ingrese un correo electrónico válido.");
            }

            if (asignatura === "") {
                errores.push("Debe seleccionar una asignatura.");
            }

            if (errores.length > 0) {

                evento.preventDefault();

                mensajeError.innerHTML = "";

                const titulo = document.createElement("strong");
                titulo.textContent = "Corrija los siguientes errores:";

                const lista = document.createElement("ul");
                lista.classList.add("mb-0", "mt-2");

                errores.forEach(function (error) {
                    const elemento = document.createElement("li");
                    elemento.textContent = error;
                    lista.appendChild(elemento);
                });

                mensajeError.appendChild(titulo);
                mensajeError.appendChild(lista);
                mensajeError.classList.remove("d-none");

                mensajeError.scrollIntoView({
                    behavior: "smooth",
                    block: "center"
                });
            }

        });
    }


    

const formulariosEliminar = document.querySelectorAll(".form-eliminar");

formulariosEliminar.forEach(function (formulario) {
    formulario.addEventListener("submit", function (evento) {
        const confirmar = window.confirm(
            "¿Estás seguro de que deseas eliminar este estudiante?"
        );

        if (confirmar === false) {
            evento.preventDefault();
        }
    });
});




    const formBusqueda = document.getElementById("formBusqueda");

    if (formBusqueda) {

        formBusqueda.addEventListener("submit", function (evento) {

            const campoBuscar = document.getElementById("buscar");
            const filtroAsignatura = document.getElementById("asignatura");

            const buscar = campoBuscar.value.trim();
            const asignatura = filtroAsignatura.value;

            if (buscar === "" && asignatura === "") {
                evento.preventDefault();

                campoBuscar.focus();

                alert(
                    "Escribe un nombre o correo, o selecciona una asignatura para buscar."
                );
            }

        });

    }

});