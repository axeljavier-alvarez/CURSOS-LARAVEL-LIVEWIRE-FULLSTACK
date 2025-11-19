
// cadena str que queremos convertir a slog
// querySelector donde quemos que ponga el Slug
window.string_to_slug = function(str, querySelector){
    str = str.replace(/^\s+|\s+$/g, '');
    str = str.toLowerCase();
    var from = "áàäâãéèëêíìïîóòöôõúùüûñç·/_,:;";
    var to   = "aaaaaeeeeiiiiooooouuuunc------";
    for (var i = 0, l = from.length; i < l; i++) {
         str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }
    str = str
    .replace(/\s+/g, '-')        // primero espacios por guion
    .replace(/[^a-z0-9\-]/g, '') // luego elimina todo excepto letras, números y guion
    .replace(/-+/g, '-');        // evitar guiones dobles

             // modificar valor por el query transformado
    document.querySelector(querySelector).value = str;
};
