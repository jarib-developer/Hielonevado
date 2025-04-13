function previewImage(event) {
  const archivo = event.target.files[0];
  const preview = document.getElementById('preview');

  if (archivo) {
      if (!archivo.type.startsWith('image/')) {
          alert("El archivo seleccionado no es una imagen válida.");
          event.target.value = "";
          preview.src = "<?= base_url('img/default.png') ?>";
          return;
      }

      if (archivo.size > 6 * 1024 * 1024) {
          alert("La imagen no debe superar los 6 MB.");
          event.target.value = "";
          preview.src = "<?= base_url('img/default.png') ?>";
          return;
      }

      const reader = new FileReader();
      reader.onload = function(e) {
          preview.src = e.target.result;
      };
      reader.readAsDataURL(archivo);
  }
}