<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Catalogo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('catalogo_model');
    }

    function verProductos() {
        $page = $this->input->post("pag");
        if ($page == "") {
            $page = $_POST['pag'];
        }

        $data['title'] = 'Catálogo Productos';
        $pages = 9;
        $this->load->library('pagination');
        $config['base_url'] = base_url() . '../catalogo/pagina/';
        $config['total_rows'] = $this->catalogo_model->filas();
        $config['per_page'] = $pages;
        $config['num_links'] = 20;
        $config['first_link'] = 'Primera';
        $config['last_link'] = 'Última';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div id="paginacion">';
        $config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $data["productos"] = $this->catalogo_model->total_productos_paginados($config['per_page'], $this->uri->segment(3));
        $this->load->view($page, $data);
    }

    function agregarProducto() {
        $id = $_POST['id_prod'];
        $producto = $this->catalogo_model->porId($id);
        $cantidad = 1;
        $carrito = $this->cart->contents();
        foreach ($carrito as $item) {
            if ($item['id'] == $id) {
                $cantidad = 1 + $item['qty'];
            }
        }

        $id_user = $this->session->userdata("id_user");

        $insert = array(
            'id' => $id,
            'qty' => $cantidad,
            'price' => $producto->precio,
            'name' => $producto->Descripcion,
            'userid' => $id_user
        );
        $this->cart->insert($insert);

        $this->session->set_flashdata('catalogo', true);
        redirect(base_url() . "controladorCliente/index");
    }

    function eliminarProducto() {
        $rowid = $this->input->post("id");
        $producto = array(
            'rowid' => $rowid,
            'qty' => 0
        );

        $this->cart->update($producto);

        $this->session->set_flashdata('productoEliminado', 'El producto fue eliminado correctamente');
        echo json_encode($data['error'] = false);
    }

    function eliminarCarrito() {
        $this->cart->destroy();
        $this->session->set_flashdata('destruido', 'El carrito fue eliminado correctamente');
        redirect(base_url() . "controladorCliente/index");
    }

    function cargarProductos() {
        
        $data['title'] = 'Catálogo Productos';
        $pages = 9; //Número de registros mostrados por páginas
        $this->load->library('pagination'); //Cargamos la librería de paginación
        $config['base_url'] = base_url() . 'catalogo/pagina2/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
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
        $this->load->view('Usuario/products', $data);
    }

    function buscarProductos1() {   
        if (count($_POST) == 0) {
            $pr = true;
            $texto = "";
            $estado = "";
        } else {
            $pr = $_GET['pr'];
            $estado = $_POST['cbEstadoBuscar'];
            $texto = $_POST['texto'];
        }
        $data['title'] = 'Catálogo Productos';
        $pages = 9; //Número de registros mostrados por páginas
        $this->load->library('pagination'); //Cargamos la librería de paginación
        $config['base_url'] = base_url() . 'catalogo/paginaBuscar/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->catalogo_model->filasBuscar($estado, $texto);
        $config['per_page'] = $pages;
        $config['num_links'] = 20; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera';
        $config['last_link'] = 'Última';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div id="paginacion">';
        $config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $data["productos"] = $this->catalogo_model->total_productos_paginadosBuscar($config['per_page'], $this->uri->segment(3), $estado, $texto);
        $data["estados"] = $this->db->query("select * from state")->result();
        if ($pr == true) {
            $this->load->view('Usuario/products', $data);
        } else {
            $this->load->view('Usuario/index', $data);
        }
    }
    
    function buscarProductosAdmin() {   
        if (count($_POST) == 0) {
            $pr = true;
            $texto = "";
            $estado = "";
        } else {
            $pr = $_GET['pr'];
            $estado = $_POST['cbEstadoBuscar'];
            $texto = $_POST['texto'];
        }
        $data['title'] = 'Catálogo Productos';
        $pages = 9; //Número de registros mostrados por páginas
        $this->load->library('pagination'); //Cargamos la librería de paginación
        $config['base_url'] = base_url() . 'catalogo/paginaBuscarAdmin/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->catalogo_model->filasBuscar($estado, $texto);
        $config['per_page'] = $pages;
        $config['num_links'] = 20; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera';
        $config['last_link'] = 'Última';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div id="paginacion">';
        $config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $data["productos"] = $this->catalogo_model->total_productos_paginadosBuscar($config['per_page'], $this->uri->segment(3), $estado, $texto);
        $data["estados"] = $this->db->query("select * from state")->result();
        if ($pr == true) {
            $this->load->view('Admin/indexAdmin', $data);
        } else {
            $this->load->view('Admin/indexAdmin', $data);
        }
    }

}
