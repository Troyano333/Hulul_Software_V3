 function getQueryParams() {
            const params = {};
            window.location.search.substring(1).split("&").forEach(pair => {
                let [key, value] = pair.split("=");
                if (key) {
                    value = value ? value.replace(/\+/g, ' ') : '';
                    params[key] = decodeURIComponent(value);
                }
            });
            return params;
        }

        document.addEventListener("DOMContentLoaded", () => {
            const datos = getQueryParams();
            console.log("Datos recibidos:", datos); // Para depuración

            if (!datos.nombre || !datos.apellido) {
                alert("No se han encontrado datos completos de la reserva.");
                window.location.href = 'index.html';
                return;
            }

            document.getElementById("nombre_reserva").textContent = datos.nombre || "No disponible";
            document.getElementById("apellido_reserva").textContent = datos.apellido || "No disponible";
            document.getElementById("evento_reserva").textContent = datos.evento || "No disponible";
            document.getElementById("fecha_reserva").textContent = datos.fecha || "No disponible";
            document.getElementById("hora_reserva").textContent = datos.hora || "No disponible";
            document.getElementById("lugar_reserva").textContent = datos.lugar || "No disponible";
            document.getElementById("palco_reserva").textContent = datos.zona || "No disponible";

            const textoQR = `Reserva para: ${datos.nombre} ${datos.apellido}
Evento: ${datos.evento || "No disponible"}
Fecha del Evento: ${datos.fecha || "No disponible"}
Hora: ${datos.hora || "No disponible"}
Lugar: ${datos.lugar || "No disponible"}
Zona reservada: ${datos.zona || "No disponible"}`;

            const qrURL = `https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=${encodeURIComponent(textoQR)}`;
            document.getElementById("qr_png").src = qrURL;
        });