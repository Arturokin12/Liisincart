<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorAdmin extends CI_Controller {

    public function cargarImagenes() {
        $imgJson = file_get_contents("Imagenes.json");
        $imagenes = json_decode($imgJson);
        $data['imagenes'] = $imagenes;
        $this->load->view("Admin/imagenesAdmin", $data);
    }

    public function cargarImagenesEditar() {
        $id_producto = $this->input->post("id_prod");
        $imagenes = $this->db->query("select * from imagen where id_producto = " . $id_producto)->result();
        $data['imagenes'] = $imagenes;
        $this->load->view("Admin/imagenesAdmin2", $data);
    }

    public function addProducto() {
        $f = $_POST;
        $des = $f['descripcion'];
        $det = $f['detalles'];
        $precio = $f['precio'];
        $tipo = $f['tipo'];
        $imagenes = $f['imagenes'];
        $estado = $f['state'];
        $video = $f['video'];
        $imagenesdecode = json_decode($imagenes);
        if ($des != "" && $precio != "") {
            if (count($imagenesdecode) >= 1) {
                $producto = array(
                    "descripcion" => $des,
                    "detalles" => $det,
                    "precio" => $precio,
                    "tipo" => $tipo,
                    "state" => $estado,
                    "video" => $video
                );
//                $consulta = "insert into producto values(null, '" . $des . "', '" . $precio . "')";
                $this->db->insert("producto", $producto);
                $id_producto = $this->db->insert_id();
                foreach ($imagenesdecode as $val) {
                    $imagen = array(
                        "ruta" => "ImagenesProductos/" . $id_producto . "_" . $val,
                        "id_producto" => $id_producto
                    );
                    rename("UploadedImages/" . $val, "ImagenesProductos/" . $id_producto . "_" . $val);
                    $this->db->insert("imagen", $imagen);
                }
                $data['error'] = false;
            } else {
                $data['error'] = true;
                $data['mensaje'] = "Seleccione al menos una imagen";
            }
        } else {
            $data['error'] = true;
            $data['mensaje'] = "Ingrese todos los datos";
        }
        echo json_encode($data);
    }

    public function cargarProductos() {
        $pagina = $this->input->post("pag");
        $datos = $this->db->query("select * from producto");
        $number = 1;
        $data['number'] = $number;
        $count = count($datos->result());
        $paginas = 1;
        if ($count > 9) {
            $paginas = $count / 9;
        }

        $data['datos'] = $datos->result();
        $data['paginas'] = $paginas;
        $this->load->view($pagina, $data);
    }

    public function ModalEditarProducto() {
        $id_producto = $this->input->post("id_prod");

        $productos = $this->db->query("select * from producto where id_producto = " . $id_producto)->result();
        foreach ($productos as $val) {
            $producto = $val;
        }

        $data['id_producto'] = $id_producto;
        $data['Descripcion'] = $producto->Descripcion;
        $data['precio'] = $producto->precio;
        $data['tipo'] = $producto->tipo;
        $data['state'] = $producto->state;
        $data['detalles'] = $producto->Detalles;
        $imagenes = $this->db->query("select * from imagen where id_producto = " . $id_producto)->result();
        $data['imagenes'] = $imagenes;
        $data['video'] = $producto->video;
        $data["states"] = $this->db->get("state")->result();

        $this->load->view("Admin/EditarProducto", $data);
    }

    public function datosProd() {
        $des = $this->input->post("descripcion");
        $precio = $this->input->post("precio");
        $tipo = $this->input->post("tipo");

        $datos = array(
            "descripcion" => $des,
            "precio" => $precio,
            "tipo" => $tipo
        );

        $enconde = json_encode($datos);
        file_put_contents("datos_prod.json", $enconde);
    }

    function verProducto() {
        $id_producto = $this->input->post("id");
        $productos = $this->db->query("select * from producto where id_producto = " . $id_producto)->result();
        $imagenes = $this->db->query("select * from imagen where id_producto = " . $id_producto)->result();

        foreach ($productos as $val) {
            $producto = $val;
        }

        $data['producto'] = $producto;
        $data['imagenes'] = $imagenes;
        $this->load->view("Usuario/seeProduct", $data);
    }

    function editarProducto() {
        $id = $this->input->post("id");
        $des = $this->input->post("descripcion");
        $det = $this->input->post("detalles");
        $tipo = $this->input->post("tipo");
        $precio = $this->input->post("precio");
        $estado = $this->input->post("estado");
        $imagenes = $this->input->post("imagenes");
        $video = $this->input->post("videoYou");
        var_dump($video);
        if ($des != "" && $det != "" && $precio != "") {
            if (Count($imagenes) > 0) {
                $consulta = "update producto set descripcion = '" . $des . "', detalles = '" . $det . "', tipo = '" . $tipo . "', " .
                        "precio = " . $precio . ", state = '" . $estado . "', video = '".$video."' where id_producto = " . $id . "";
                
                $this->db->query($consulta);
                $data["error"] = false;
                $data["mensaje"] = "";
            } else {
                $data["error"] = true;
                $data["mensaje"] = "Ingrese al menos una imagen.";
            }
        } else {
            $data["error"] = true;
            $data["mensaje"] = "Ingrese todos los valores";
        }
        echo json_encode($data);
    }

    function eliminarFotoEditar() {
        $id_foto = $this->input->post("id");
        $result = $this->db->query("delete from imagen where id_imagen = " . $id_foto);
        print_r("res: " . $result);
        if ($result > 0) {
            $data['error'] = false;
        } else {
            $data['error'] = true;
        }
        echo json_encode($data);
    }

    function EditarAdmin() {
        $nombre = $_POST['txtNombre'];
        $correo = $_POST['txtCorreo'];
        $pass1 = $_POST['txtPass1'];
        $pass2 = $_POST['txtPass2'];
        $telefono = $_POST['txtTelefono'];
        if ($nombre != "" && $correo != "" && $pass1 != "" && $pass2 != "" && $telefono != "") {
            if ($pass1 == $pass2) {
                $usuario = array(
                    "id_usuario" => 1,
                    "Nombre" => $nombre,
                    "correo" => $correo,
                    "pass" => md5($pass2),
                    "telefono" => $telefono
                );
                $this->db->where("rol", "admin");
                $count = $this->db->update("usuario", $usuario);
                if ($count > 0) {
                    $data['Error'] = false;
                    $data['Mensaje'] = "Cuenta de administrador editada!";
                } else {
                    $data['Error'] = true;
                    $data['Mensaje'] = "Error al editar cuenta de administrador";
                }
            } else {
                $data['Error'] = true;
                $data['Mensaje'] = "Las contraseñas no coinciden";
            }
        } else {
            $data['Error'] = true;
            $data['Mensaje'] = "Ingrese todos los valores";
        }
        echo json_encode($data);
    }

    function editarCorreo() {
        $correo = $_POST['txtCorreo'];
        $pass1 = $_POST['txtPass1'];
        $pass2 = $_POST['txtPass2'];
        if ($correo != "" && $pass1 != "" && $pass2 != "") {
            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                if ($pass1 == $pass2) {
                    $correo = array(
                        "Mail" => $correo,
                        "pass" => $pass2
                    );
                    $this->db->where("id_mail", 1);
                    $count = $this->db->update("Mail", $correo);
                    if ($count > 0) {
                        $data["Error"] = false;
                        $data["Mensaje"] = "Correo guardado satisfactoriamente";
                    } else {
                        $data["Error"] = true;
                        $data["Mensaje"] = "Error al editar Correo";
                    }
                } else {
                    $data["Error"] = true;
                    $data["Mensaje"] = "Las contraseñas no coinciden";
                }
            } else {
                $data["Error"] = true;
                $data["Mensaje"] = "Correo ingresado incorrectamente.";
            }
            echo json_encode($data);
        }
    }

    function eliminarProducto() {
        $id = $this->input->post("id_prod");
        if ($id != "") {
            $imagenes = $this->db->query("select * from imagen where id_producto = " . $id);
            foreach ($imagenes->result() as $value) {
                $this->db->query("delete from imagen where id_imagen = ".$value->id_imagen);
            }
            $count = $this->db->query("delete from producto where id_producto = " . $id);
            if ($count > 0) {
                $data["error"] = false;
            } else {
                $data["error"] = true;
                $data["mensaje"] = "Error al eliminar producto!";
            }
        } else {
            $data["error"] = true;
            $data["mensaje"] = "Error al eliminar producto!";
        }
        echo json_encode($data);
    }

}
