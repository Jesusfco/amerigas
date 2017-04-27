function showProducto(producto, descripcion,  img) {

    swal({
        title: "<small>" + producto + "</small>",
        text: "<img src='images/productos/"+img+"'><div>" + descripcion + "</div>",
        html: true,
        allowOutsideClick: true,
        confirmButtonColor: "#0574ba"
    });

}