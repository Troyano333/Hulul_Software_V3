// Función para abrir el modal de Nueva Reserva
function openReservaModal() {
    const reservaModal = new bootstrap.Modal(document.getElementById('reservaModal'));
    reservaModal.show();
}

// Función para cerrar el modal
function closeModal() {
    const reservaModal = new bootstrap.Modal(document.getElementById('reservaModal'));
    reservaModal.hide();
}

// Función para guardar la nueva reserva
function guardarReserva() {
    // Obtener los valores del formulario
    const cliente = document.getElementById('clienteSelect').value;
    const evento = document.getElementById('eventoSelect').value;
    const tipo = document.getElementById('tipoReserva').value;
    const item = document.getElementById('itemSelect').value;
    const estado = document.getElementById('estadoReserva').value;
    const total = document.getElementById('totalReserva').value;

    // Validar que todos los campos estén llenos
    if (!cliente || !evento || !tipo || !item || !estado || !total) {
        alert('Por favor, completa todos los campos');
        return;
    }

    // Aquí puedes agregar la lógica para enviar estos datos a un servidor o guardarlos localmente
    // Para este ejemplo, simplemente logeamos los valores
    console.log({
        cliente,
        evento,
        tipo,
        item,
        estado,
        total
    });

    // Cerrar el modal después de guardar
    closeModal();

    // Limpiar el formulario
    document.getElementById('reservaForm').reset();
}

// Función para mostrar secciones
function showSection(section) {
    let sections = document.querySelectorAll('.section');
    sections.forEach(sec => sec.classList.remove('active'));
    document.getElementById(section).classList.add('active');
}

// Datos de ejemplo para el gráfico de Reservas por Día
const reservasPorDiaChart = new Chart(document.getElementById('reservasPorDiaChart'), {
    type: 'line',
    data: {
        labels: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
        datasets: [{
            label: 'Reservas por Día',
            data: [12, 19, 3, 5, 2, 3, 8],
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            fill: false
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Datos de ejemplo para el gráfico de Estado de Reservas
const estadoReservasChart = new Chart(document.getElementById('estadoReservasChart'), {
    type: 'pie',
    data: {
        labels: ['Confirmada', 'Pendiente', 'Cancelada'],
        datasets: [{
            data: [70, 20, 10],
            backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
            hoverOffset: 4
        }]
    }
});
