// Función para borrar un usuario
function borrarUsuario(id) {
    // Encontrar la fila correspondiente al usuario a eliminar
    const usuarioFila = document.querySelector(`tr[data-id='${id}']`);
    
    // Confirmar si el usuario realmente desea borrar el registro
    const confirmar = confirm(`¿Está seguro de que desea eliminar el usuario con ID ${id}?`);
    
    if (confirmar) {
        // Eliminar la fila de la tabla
        usuarioFila.remove();
    }
}
