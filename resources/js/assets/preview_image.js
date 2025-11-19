window.preview_image = function(event, querySelector){

    // Recuperamos el inpuyt que desencadeno la acción
    let input = event.target;
    // Recuperamos la etqueta img donde cargamos la imagen
    let imgPreview = document.querySelector(querySelector);
    // verificamos si existe la imagen seleccionada
    if(!input.files.length) return;
    // recuperamos el archivo subido
    let file = input.files[0];
    // Creamos la Url
    let objectURL = URL.createObjectURL(file);
    // Modificamos el atributo src de la etiqueta img
    imgPreview.src = objectURL;

}