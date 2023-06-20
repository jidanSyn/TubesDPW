

  function previewFoto() {
    const foto = document.querySelector('#foto');
    const fotoPreview = document.querySelector('.foto-preview');
    fotoPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(foto.files[0]);
    oFReader.onload = function(oFREvent) {
      fotoPreview.src = oFREvent.target.result;
    }  
  }

  function previewBanner() {
    const foto = document.querySelector('#banner');
    const fotoPreview = document.querySelector('.banner-preview');
    fotoPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(banner.files[0]);
    oFReader.onload = function(oFREvent) {
      fotoPreview.src = oFREvent.target.result;
    }  
  }

