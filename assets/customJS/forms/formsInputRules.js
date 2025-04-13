$(document).ready(function () {
  // Función para aplicar las reglas a los inputs con la clase .form-control
  $('.form-control').each(function () {
      var $input = $(this);
      var attributes = $input.data(); // Obtener los atributos personalizados

      // Comprobar y aplicar las reglas
      if (attributes.l) {
          $input.on('input', function () {
              this.value = this.value.replace(/[^a-zA-Z]/g, ''); // Solo letras
          });
      }

      if (attributes.n) {
          $input.on('input', function () {
              this.value = this.value.replace(/[^0-9]/g, ''); // Solo números
          });
      }

      if (attributes.nc) {
          $input.on('input', function () {
              this.value = this.value.replace(/[^0-9-]/g, ''); // Números y guiones
          });
      }

      if (attributes.cap) {
          $input.on('input', function () {
              this.value = this.value.toUpperCase(); // Convertir a mayúsculas
          });
      }

      if (attributes.min) {
          $input.on('input', function () {
              this.value = this.value.toLowerCase(); // Convertir a minúsculas
          });
      }

      if (attributes.money) {
          $input.on('input', function () {
              var value = this.value.replace(/[^0-9]/g, ''); // Eliminar caracteres no numéricos
              if (value) {
                  value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Formato con separador de miles
              }
              this.value = value;
          });
      }
  });
});