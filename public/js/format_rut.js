function formatRut(cliente) {
  cliente.value = cliente.value
    .replace(/[^0-9kK]/g, '') // Elimina todo excepto números y la letra 'k' o 'K'
    .replace(/^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4'); // Agrega puntos y guión en el formato estándar
}