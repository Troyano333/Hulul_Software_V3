// Agregar un evento
document.getElementById('addEventoForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const nombre = document.getElementById('eventoNombre').value;
    const fecha = document.getElementById('eventoFecha').value;
    const hora = document.getElementById('eventoHora').value;
    const descripcion = document.getElementById('eventoDescripcion').value;
    const imagen = document.getElementById('eventoImagen').files[0];

    // Crear una URL para la imagen
    const imagenURL = URL.createObjectURL(imagen);

    // Crear la card para el evento
    const eventoCard = document.createElement('div');
    eventoCard.classList.add('col-lg-4', 'col-md-6', 'mb-4');
    eventoCard.innerHTML = `
        <div class="card">
            <img src="${imagenURL}" class="card-img-top" alt="Evento">
            <div class="card-body">
                <h5 class="card-title">${nombre}</h5>
                <p class="card-text">${descripcion}</p>
                <p><strong>Fecha:</strong> ${fecha}</p>
                <p><strong>Hora:</strong> ${hora}</p>
                <div class="buttons">
                    <button class="btn btn-primary btn-edit" onclick="editarEvento(this)">Editar</button>
                    <button class="btn btn-danger btn-delete" onclick="borrarEvento(this)">Borrar</button>
                </div>
            </div>
        </div>
    `;

    // Agregar el evento a la lista de eventos
    document.getElementById('eventosList').appendChild(eventoCard);

    // Limpiar el formulario
    document.getElementById('addEventoForm').reset();
});

// Editar evento
function editarEvento(button) {
    const card = button.closest('.card');
    const titulo = card.querySelector('.card-title').textContent;
    const descripcion = card.querySelector('.card-text').textContent;
    const fecha = card.querySelector('.card-body').querySelector('p:nth-child(3)').textContent.split(':')[1].trim();
    const hora = card.querySelector('.card-body').querySelector('p:nth-child(4)').textContent.split(':')[1].trim();

    // Llenar el formulario con los datos actuales del evento
    document.getElementById('eventoNombre').value = titulo;
    document.getElementById('eventoDescripcion').value = descripcion;
    document.getElementById('eventoFecha').value = fecha;
    document.getElementById('eventoHora').value = hora;

    // Eliminar el evento
    borrarEvento(button);
}

// Borrar evento
function borrarEvento(button) {
    const card = button.closest('.card');
    card.remove();
}
