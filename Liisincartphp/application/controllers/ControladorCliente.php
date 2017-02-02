<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorCliente extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('catalogo_model');
        $this->load->library("facebooksdk");
        $this->fb = $this->facebooksdk;
    }

    public function index() {
        $user = $this->session->userdata("user");
        $rol = $this->session->userdata("rol");
        $login = $this->session->userdata("login");
        $catalogo = $this->session->flashdata("catalogo");
        $data['title'] = 'Catálogo Productos';
        $pages = 9; //Número de registros mostrados por páginas
        $this->load->library('pagination'); //Cargamos la librería de paginación
        $config['base_url'] = base_url() . 'catalogo/pagina/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->catalogo_model->filas();
        $config['per_page'] = $pages;
        $config['num_links'] = 20; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera';
        $config['last_link'] = 'Última';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div id="paginacion">';
        $config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $data["productos"] = $this->catalogo_model->total_productos_paginados($config['per_page'], $this->uri->segment(3));
        $data["estados"] = $this->db->query("select * from state")->result();

        if ($login != false) {
            if ($rol == "admin") {
                $this->load->view('Admin/indexAdmin', $data);
            } else if ($rol == "cliente") {
                if ($catalogo == true) {
                    $this->load->view('Usuario/products', $data);
                } else {
                    $this->load->view('Usuario/index', $data);
                }
            }
        } else {
            if ($catalogo == true) {
                $this->load->view('Usuario/products', $data);
            } else {
                $this->load->view('Usuario/indexPublic', $data);
            }
        }
    }

    public function redireccionar() {
        $pag = $_GET['pag'];
        $this->load->view($pag);
    }

    public function cargarDivs() {
        $data['user'] = $this->session->userdata("user");
        $data['rol'] = $this->session->userdata("rol");
        echo json_encode($data);
    }

    public function cargarPagina() {
        $pagina = $this->input->post("pag");
        $this->load->view($pagina);
    }

    public function cargarPaginaData() {
        $pagina = $this->input->post("pag");
        $tabla = $this->input->post("tabla");
        $datos = $this->db->query("select * from " . $tabla);
        $data['datos'] = $datos->result();
        $this->load->view($pagina, $data);
    }

    public function cargarLoginMensaje() {
        $usuario = $this->session->userdata('user');
        $data['mensaje'] = "Bienvenido usuario: " . $usuario;
        $data['login'] = $this->session->userdata('user');
        if ($data['login'] != "") {
            $this->load->view("Usuario/Usuario", $data);
        } else {
            $this->load->view("Usuario/IniciarSesion");
        }
    }

    public function cargarPagina2() {
        $pagina = $this->input->post("pag");
        redirect(base_url() . "/" . $pagina);
    }

    public function iniciarSesion() {
        $form = $_POST;
        $user = $form['mail'];
        $pass = $form['pass'];
        if (filter_var($user, FILTER_VALIDATE_EMAIL)) {
            $consulta = "select * from usuario where correo = '" . $user . "' && pass = '" . md5($pass) . "'";
            $result = $this->db->query($consulta);
            $estado = "";
            $nombre = "";
            $id_user = 0;
            $rol = "";

            if ($result->num_rows() == 1) {
                foreach ($result->result() as $value) {
                    $nombre = $value->Nombre;
                    $id_user = $value->id_usuario;
                    $rol = $value->rol;
                    $estado = $value->estado;
                }
                if ($estado == "activo") {
                    $data = array(
                        "user" => $nombre,
                        "id_user" => $id_user,
                        "rol" => $rol,
                        "login" => true
                    );
                    $data2['error'] = false;
                    $data2['mensaje'] = "Correcto";
                    $this->session->set_userdata($data);
                } else {
                    $data2['error'] = true;
                    $data2['mensaje'] = "Cuenta Deshabilitada, favor de activar cuenta <br/>"
                            . "¿no ha recibido mail para activar su cuenta? <br/> <a onclick=''>Reenviar Correo</a>";
                    $data = array(
                        "user" => null,
                        "id_user" => null,
                        "rol" => "",
                        "login" => true
                    );
                    $this->session->set_userdata($data);
                }
            } else {
                $data2['error'] = true;
                $data2['mensaje'] = "Datos incorrectos";
                $data = array(
                    "user" => null,
                    "id_user" => null,
                    "rol" => "",
                    "login" => true
                );
                $this->session->set_userdata($data);
            }
        } else {
            $data2['error'] = true;
            $data2['mensaje'] = "Correo Electrónico mal ingresado";
            $data = array(
                "user" => null,
                "id_user" => null,
                "rol" => "",
                "login" => true
            );
            $this->session->set_userdata($data);
        }
        echo json_encode($data2);
    }

    function loginFacebook() {
        $act = $this->fb->getAccessToken();
        $data = $this->fb->getUserData($act);
        $login = $this->fb->getLoginUrl($act);

        $this->db->where("correo", $data['email']);
        $res = $this->db->get("usuario");
        if ($res->num_rows() == 1) {
            $id_user = "";
            foreach ($res->result() as $value) {
                $id_user = $value->correo;
            }
            $data = array(
                "user" => $data['email'],
                "id_user" => $id_user,
                "rol" => "cliente",
                "login" => true
            );
            $data2['error'] = false;
            $data2['mensaje'] = "Correcto";
            $this->session->set_userdata($data);
            $this->index();
        } else {
            $usuario = array(
                "Nombre" => $data['name'],
                "correo" => $data['email'],
                "pass" => "",
                "telefono" => "",
                "rol" => "cliente",
                "estado" => "activo"
            );
            $datos['usuario'] = $usuario;
            $this->load->view("Usuario/RegistroRedes", $datos);
        }
    }

    function RegistroRedes() {
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $pass = $_POST["pass"];

        $usuario = array(
            "Nombre" => $nombre,
            "correo" => $correo,
            "pass" => md5($pass),
            "telefono" => $telefono,
            "rol" => "cliente",
            "estado" => "activo"
        );
        $this->db->insert("usuario", $usuario);
        $data = array(
            "user" => $nombre,
            "id_user" => $this->db->insert_id(),
            "rol" => "cliente",
            "login" => true
        );
        $this->session->set_userdata($data);
        echo json_encode("ok");
    }

    public function cerrarSesion() {
        $this->session->sess_destroy();
        redirect(base_url() . "ControladorCliente/index");
    }

    public function registrar1() {
        $form = $_POST;
        $nombre = $form['Nombre'];
        $telefono = $form['telefono'];
        $mail = $form['mail'];
        $pass = $form['pass'];

        if ($nombre != "" && $telefono != "" && $mail != "" && $pass != "") {
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $consulta = $this->db->query("select * from usuario where correo = '" . $mail . "'");
                if ($consulta->num_rows() == 0) {
                    $usuario = array(
                        "nombre" => $nombre,
                        "telefono" => $telefono,
                        "correo" => $mail,
                        "pass" => md5($pass),
                        "rol" => "cliente",
                        "estado" => "inactivo"
                    );
                    $this->db->insert("usuario", $usuario);
                    $id = $this->db->insert_id();
                    $datosEnviar = $this->enviarMailConfimacion($mail, $id);
                    if ($datosEnviar != "") {
                        $error['error'] = true;
                        $error['mensaje'] = $datosEnviar;
                    } else {
                        $error['error'] = false;
                        $error['mensaje'] = "";
                    }
                } else {
                    $error['error'] = true;
                    $error['mensaje'] = "Correo electrónico ya registrado";
                }
            } else {
                $error['error'] = true;
                $error['mensaje'] = "Correo electrónico ingresado incorrectamente.";
            }
        } else {
            $error['error'] = true;
            $error['mensaje'] = "Ingrese todos los datos";
        }
        echo json_encode($error);
    }

    public function activarCuenta() {
        $id = $_GET;
        $this->db->where("estado", "activo");
        $this->db->where("id_usuario", $id['id_user']);
        $resultado1 = $this->db->get("usuario");
        if (count($resultado1->result()) == 0) {
            $consulta = "update usuario set estado = 'activo' where id_usuario = '" . $id['id_user'] . "' && estado = 'inactivo';";
            $result = $this->db->query($consulta);
            if ($result == 1) {
                echo "cuenta activada satisfactoriamente!";
            } else {
                echo "error al activar cuenta.";
            }
        } else {
            echo "cuenta ya activada";
        }
    }

    public function enviarMailConfimacion($correo, $id_user) {
        require 'phpMailer/PHPMailerAutoload.php';
        $mailadmin = "";
        $passMailAdmin = "";
        $consulta = "select * from mail where id_mail = 1";
        $result = $this->db->query($consulta)->result();

        foreach ($result as $val) {
            $mailadmin = $val->mail;
            $passMailAdmin = $val->pass;
        }
        $mailer = new PHPMailer();

        $mailer->IsSMTP(); // telling the class to use SMTP
        $mailer->Host = "smtp.gmail.com"; // SMTP server
        $mailer->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
        $mailer->SMTPAuth = true;                  // enable SMTP authentication
        $mailer->SMTPSecure = "tls";
        $mailer->Host = "smtp.gmail.com";      // SMTP server
        $mailer->Port = 587;                   // SMTP port
        $mailer->Username = $mailadmin;  // username
        $mailer->Password = $passMailAdmin;
        $mailer->IsHTML(true);          // password

        $mailer->SetFrom($mailadmin, 'Liis');

        $mailer->Subject = 'Confirmacion Cuenta Liisin';
        $mailer->Body = "Buenas, se ha registrado satisfactoriamente en Liisin, para activar la cuenta favor de entrar al siguiente link: <br/>"
                . "<a href='" . base_url() . "ControladorCliente/activarCuenta?id_user=" . $id_user . "'>Click aquí para activar Cuenta</a> <br/> <p>Saludos Cordiales...</p>";
        $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $address = $correo;
        $mailer->AddAddress($address, "Test");

        $error = "";
        if (!$mailer->send()) {
            $error = "Error al enviar mail: " . $mailer->ErrorInfo;
        } else {
            $error = "";
        }

        return $error;
    }

    public function buscarProducto() {
        $estado = $_POST['cbEstadoBuscar'];
        if ($estado == "0") {
            $estado = "";
        }
        $data = array(
            "user" => $this->session->userdata("user"),
            "id_user" => $this->session->userdata("id_user"),
            "rol" => $this->session->userdata("rol"),
            "state" => $estado,
            "texto" => $this->session->userdata("texto")
        );
        $this->session->set_userdata($data);
        $this->session->set_flashdata('catalogo', true);
        $this->index();
    }

    public function enviarCarrito() {
        require 'phpMailer/PHPMailerAutoload.php';
        $carrito = $this->cart->contents();
        $id_user = $this->session->userdata("id_user");
        $consulta = "select * from usuario where id_usuario = " . $id_user;

        $Direccion = $_POST['txtDireccion'];
        $Fecha = $_POST['txtFecha'];
        print_r($Fecha);
        $detalles = $_POST['txtDetallesCarro'];

        if ($Direccion != "" && $detalles != "") {
//mail del usuario
            foreach ($this->db->query($consulta)->result() as $value) {
                $mailUser = $value->correo;
            }
//mail del admin
            $consulta2 = "select * from usuario where rol = 'admin'";
            foreach ($this->db->query($consulta2)->result() as $val) {
                $mailAdmin = $val->correo;
            }

            $consulta3 = "select * from proveedor limit 1";
            foreach ($this->db->query($consulta3)->result() as $val2) {
                $mailProveedor = $val2->Mail;
                $proveedor = $val2;
            }

//mail sender
            $consulta = "select * from mail where id_mail = 1";
            $result = $this->db->query($consulta)->result();

            foreach ($result as $val) {
                $mailadmin = $val->mail;
                $passMailAdmin = $val->pass;
            }

//configurar mail
            $mailer = new PHPMailer();

            $mailer->IsSMTP(); // telling the class to use SMTP
            $mailer->Host = "smtp.gmail.com"; // SMTP server
            $mailer->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
            $mailer->SMTPAuth = true;                  // enable SMTP authentication
            $mailer->SMTPSecure = "tls";
            $mailer->Host = "smtp.gmail.com";      // SMTP server
            $mailer->Port = 587;                   // SMTP port
            $mailer->Username = $mailadmin;  // username
            $mailer->Password = $passMailAdmin;            // password

            $mailer->SetFrom($mailadmin, 'Liisin');

            $mailer->Subject = 'Resumen de productos Compra Liisin';
            $body = "Productos en orden de compra <!DOCTYPE html><html><header><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'/></header><body><div><table class='table table-bordered'><tr><th>Item</th><th>Precio</th><th>Cantidad </th><th>Subtotal</th></tr>";
            $body2 = " ITEM       PRECIO       CANTIDAD      SUBTOTAL \r";
            $total = 0;
            $id_usuarioCARRO = "";
            foreach ($carrito as $prodCarrito) {
                $id_usuarioCARRO = $prodCarrito['userid'];
                $prd = $this->catalogo_model->porId($prodCarrito['id']);
                $imgs = $this->db->query("select * from imagen where id_producto = " . $prodCarrito['id'] . " Limit 1");
                $body = $body . "<tr><td><div><h5><a>" . $prd->Descripcion . "</a></h5><p>" . $prd->Detalles . " </p></div>"
                        . "</td><td>$" . $prd->precio . "</td><td>" . $prodCarrito['qty'] . "</td>"
                        . "<td>$" . $prodCarrito['subtotal'] . "</td></tr>";
                $total = $total + ($prodCarrito['qty'] * $prd->precio);
            }

            $usuarios = $this->db->query("select * from usuario where id_usuario = " . $id_usuarioCARRO)->result();

            foreach ($usuarios as $v) {
                $user = $v;
            }
            print_r($user);
            $body = $body . "<tr><td></td><td></td><td></td><td>Total: " . $total . "</td></tr></table></div><br/>";
            $body = $body . "<p>Proveedor designado: " . $proveedor->Nombre . ". Correo de contacto: " . $proveedor->Mail . "</p></body>";
            $body = $body . "<br/><br/><p>Usuario responsable: " . $user->Nombre . ". Correo de contacto Usuario: " . $user->correo . ". Numero de telefono: " . $user->telefono . "</p></body>";
            $body = $body . "<br/><br/><p>Direccion: " . $Direccion . ". Fecha deseada: " . $Fecha . ". Detalles especificados: " . $detalles . "</p></body>";
            $mailer->Body = $body;
            $mailer->IsHTML(true);
            $mailer->AltBody = '';

            $mailer->AddAddress($mailUser, "Carro Liisin");
            $mailer->AddAddress($mailAdmin, "Carro Liisin");
            $mailer->AddAddress($mailProveedor, "Carro Liisin");

            $error1 = "";
            if (!$mailer->send()) {
                $error1 = "Error al enviar mail: " . $mailer->ErrorInfo;
            } else {
                $error1 = "";
            }
            $this->cart->destroy();
            $data['error1'] = $error1;
            redirect(base_url() . "ControladorCliente/redireccionar?pag=Usuario/DoneCarrito");
            redirect(base_url() . "ControladorCliente/redireccionar?pag=Usuario/DoneCarrito");
        } else {
            echo json_encode($dat["error"] = "Complete los campos");
        }
    }

    public function buscarProducto1() {
        $texto = $this->input->post("text");
        $data = array(
            "user" => $this->session->userdata("user"),
            "id_user" => $this->session->userdata("id_user"),
            "rol" => $this->session->userdata("rol"),
            "state" => $this->session->userdata("estado"),
            "texto" => $texto
        );
        $this->session->set_userdata($data);
        echo json_encode($data['text'] = $texto);
    }

    public function contactar() {
        require 'phpMailer/PHPMailerAutoload.php';
        $mailadmin = "";
        $passMailAdmin = "";
        $consulta = "select * from mail where id_mail = 1";
        $result = $this->db->query($consulta)->result();

        $mail = $_POST['txtMail'];
        $nombre = $_POST['txtNombre'];
        $asunto = $_POST['txtAsunto'];
        $mensaje = $_POST['txtMensaje'];

        foreach ($result as $val) {
            $mailadmin = $val->mail;
            $passMailAdmin = $val->pass;
        }

        $body = $mensaje;
        $body = $body . "<br/><p>Usuario: " . $nombre . ". </p>";
        $error = "";
//        
//        $this->load->library('email');
//        $this->email->set_mailtype("html");
//        $this->email->from($mail, $nombre);
//        $this->email->to($mailadmin);
//        $this->email->subject($asunto);
//        $this->email->message($body);
//        $this->email->send();

        ini_set("SMTP", "aspmx.l.google.com");
        ini_set("sendmail_from", $mail);


        mail($mailadmin, "Testing", $mensaje, $asunto);

        print_r($error);
        redirect(base_url() . "ControladorCliente/redireccionar?pag=Usuario/index");
    }

}
