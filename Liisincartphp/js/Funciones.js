$(document).ready(function () {
//    cargarDivs();
    $("#modal").dialog({
        autoOpen: false,
        modal: true,
        buttons: {
            Ok: function () {
                $(this).dialog("close");
                //location.reload();
            }
        }
    }
    );
});
function cargarDivs() {
    $.post(
            base_url + "ControladorCliente/cargarDivs", {},
            function (vector) {
                if (vector.login != true) {
                    if (vector.rol == "admin") {
                        
                    } else if (vector.rol == "cliente") {
                        
                    }
                } else {
                    
                }
            }, 'json'
            );
}

function redireccionar(pagina) {
    $.post(
            base_url + "ControladorCliente/redireccionar", {
                pag: pagina
            },
            function (pagina) {
                window.location.replace(pagina);
            }
    );
}

function cargarLoginMensaje() {
    $.post(
            base_url + "ControladorCliente/cargarLoginMensaje", {},
            function (pagina) {
                $("#divSesion").html(pagina);
                $("#btCerrarSes").button().click(function () {
                    cerrarSes();
                });
            }
    );
}

function cargarPagina(pagina, div, efecto) {
    $.post(
            base_url + "ControladorCliente/cargarPagina",
            {
                pag: pagina
            },
            function (pagi) {
                $("#" + div).html(pagi);
                $("#" + div).hide();
                $("#" + div).show("fade");
                $("#btCerrarSes").button().click(function () {
                    cerrarSes();
                });
            }
    );
}

function cargarPaginaData(pagina, div, efecto, table) {
    $.post(
            base_url + "ControladorCliente/cargarPaginaData",
            {
                pag: pagina,
                tabla: table
            },
            function (pagi) {
                $("#" + div).html(pagi);
                $("#" + div).hide();
                $("#" + div).show("" + efecto);
            }
    );
}

function cargarProductos(pagina, div, efecto) {
    $.post(
            base_url + "catalogo/verProductos",
            {
                pag: pagina
            },
            function (pagi) {
                $("#" + div).html(pagi);
                $("#" + div).hide();
                $("#" + div).show("" + efecto);
            }
    );
}

function cerrarSession() {
    var form = document.createElement("form");
    form.method = 'post';
    form.action = base_url+'controladorCliente/cerrarSesion';
    form.submit();
}

function modalEditarProducto(id_producto) {
    $.post(
            base_url + "ControladorAdmin/ModalEditarProducto",
            {
                id_prod: id_producto
            },
            function (pagina) {
                $("#modal2").html(pagina);
                $("#modal2").dialog("open");
                document.getElementById("modal2").title = "Editar Producto";
            }
    );
}


function verProducto(id_prod, div, efecto) {
    $.post(
            base_url + "ControladorAdmin/verProducto",
            {
                id: id_prod
            },
            function (pagina) {
                $("#" + div).html(pagina);
                $("#" + div).hide();
                $("#" + div).show("" + efecto);
            }
    );
}

function registrar1() {
    $.post(
            base_url + "ControladorCliente/registrar1",
            {
                nombre: $("#txtNombre").val(),
                telefono: $("#txtTelefono").val(),
                mail: $("#txtMail").val(),
                pass: $("#txtPass").val()
            },
            function (vector) {
                if (vector.error == true) {
                    $("#modalRegister").html(vector.mensaje);
                    $("#modalRegister").dialog("open");
                } else {

                }
            }
    );
}

function eliminarDelCarrito(id) {
    $.post(
            base_url + "catalogo/eliminarProducto",
            {
                id: id
            },
            function (vector) {
                if (vector.error == true) {

                } else {
                    cargarPagina('Usuario/checkout', 'divIndex', 'fade')
                }
            }, 'json'
            );
}











