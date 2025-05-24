 window.onload = function () {
        // Obtener datos guardados del evento desde localStorage
        const evento = localStorage.getItem("eventoSeleccionado");
        const zona = localStorage.getItem("zonaSeleccionada");
        const fecha = localStorage.getItem("fechaEvento");
        const hora = localStorage.getItem("horaEvento");
        const lugarEvento = localStorage.getItem("lugarEvento"); // Lugar exacto del evento
        const ciudadEvento = localStorage.getItem("ciudadEvento"); // Ciudad del evento

        // Asignar valores a inputs solo lectura
        if (evento) document.getElementById("eventoSeleccionado").value = evento;
        if (zona) document.getElementById("zonaSeleccionada").value = zona;
        if (fecha) document.getElementById("fechaEvento").value = fecha;
        if (hora) document.getElementById("horaEvento").value = hora;

        // Llenar select lugar
        const lugarSelect = document.getElementById("lugar");
        lugarSelect.innerHTML = "";

        if (lugarEvento) {
          // Opción principal: lugar del evento
          const opcionEvento = document.createElement("option");
          opcionEvento.value = lugarEvento;
          opcionEvento.textContent = lugarEvento;
          lugarSelect.appendChild(opcionEvento);
        }

        // Agregar otras opciones basadas en la ciudad del evento (si existe)
        if (ciudadEvento) {
          // Por ejemplo, agregar opciones: El Centro (con texto ciudadEvento), Norte, Sur
          const opciones = [
            { valor: "El Centro", texto: `El Centro - ${ciudadEvento}` },
            { valor: "Norte", texto: `Norte - ${ciudadEvento}` },
            { valor: "Sur", texto: `Sur - ${ciudadEvento}` },
          ];

          opciones.forEach(({ valor, texto }) => {
            // No repetir si es el mismo que lugarEvento
            if (valor !== lugarEvento) {
              const opt = document.createElement("option");
              opt.value = valor;
              opt.textContent = texto;
              lugarSelect.appendChild(opt);
            }
          });
        }

        // Limpiar localStorage para evitar repetir datos al recargar
        localStorage.removeItem("eventoSeleccionado");
        localStorage.removeItem("zonaSeleccionada");
        localStorage.removeItem("fechaEvento");
        localStorage.removeItem("horaEvento");
        localStorage.removeItem("lugarEvento");
        localStorage.removeItem("ciudadEvento");
      };