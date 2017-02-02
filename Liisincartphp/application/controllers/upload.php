<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('upload_model');
    }

    function index() {
        //CARGAMOS LA VISTA DEL FORMULARIO
        $this->load->view('upload_view');
    }
    

    function upload_image() {
        $name_array = $_FILES['userfile']['name'];
        $tmpName_array = $_FILES['userfile']['tmp_name'];
        $type_array = $_FILES['userfile']['type'];
        $ruta = "";
//        $getImagenes = file_get_contents("Imagenes.json");
//        $imagenes = json_decode($getImagenes);
        $ruta = "UploadedImages/" . $name_array;
        move_uploaded_file($tmpName_array, $ruta);
//        array_push($imagenes, $ruta);
//        $imgJson = json_encode($imagenes);
//        file_put_contents("Imagenes.json", $imgJson);
    }

    //FUNCIÓN PARA SUBIR LA IMAGEN Y VALIDAR EL TÍTULO
    function do_upload() {
        $file_element_name = 'userfile';
        $config['upload_path'] = './UploadedImages/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';        
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $ruta = "";
        //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
        if (!$this->upload->do_upload($file_element_name)) {
            $error = array('error' => $this->upload->display_errors());
            $datos['error'] = true;
            $datos['mensaje'] = $this->upload->display_errors();
        } else {
            //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
            //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
            $file_info = $this->upload->data();
            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
            //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
            $this->_create_thumbnail($file_info['file_name']);
            $data = array('upload_data' => $this->upload->data());
            $imagen = $file_info['file_name'];
//            $subir = $this->upload_model->subir($titulo,$imagen);  
            $datos['imagen'] = $imagen;
            $datos['error'] = false;
            $datos['datos'] = $data;
        }
        echo json_encode($datos);
    }
    
    function do_upload2() {
        $id_prod = $this->input->post("id_prod");
        $file_element_name = 'userfile';
        $config['upload_path'] = './ImagenesProductos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';        
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $ruta = "";
        //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
        if (!$this->upload->do_upload($file_element_name)) {
            $error = array('error' => $this->upload->display_errors());
            $datos['error'] = true;
            $datos['mensaje'] = $this->upload->display_errors();
        } else {
            //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
            //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
            $file_info = $this->upload->data();
            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
            //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
            $this->_create_thumbnail($file_info['file_name']);
            $data = array('upload_data' => $this->upload->data());
            
            $imagen = $file_info['file_name'];
            $img = array(
                "ruta" => "ImagenesProductos/".$imagen,
                "id_producto" => $id_prod
            );
            $this->db->insert("imagen",$img);
//            $subir = $this->upload_model->subir($titulo,$imagen);  
            $datos['imagen'] = $imagen;
            $datos["id_imagen"] = $this->db->insert_id();
            $datos['error'] = false;
            $datos['datos'] = $data;
        }
        echo json_encode($datos);
    }

    //FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    function _create_thumbnail($filename) {
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = 'UploadedImages/' . $filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image'] = 'UploadedImages/thumbs/';
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

}
