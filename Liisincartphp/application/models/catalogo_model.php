<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Catalogo_model extends CI_Model {

    public function construct() {
        parent::__construct();
    }

    //obtenemos la cantidad de filas de los productos
    //para realizar la paginación
    function filas() {
        $consulta = $this->db->get('producto');
        return $consulta->num_rows();
    }

    function filasBuscar($estado, $texto) {
        if ($estado == "0") {
            $est = "";
        }else{
            $est = $estado;
        }
        if ($est != "") {
             $this->db->like("state", $est);
        }
        
        $this->db->or_like("descripcion", $texto);
        $consulta = $this->db->get('producto');
        return $consulta->num_rows();
    }

    //obtenemos todos los productos para paginarlos
    function total_productos_paginados($por_pagina, $segmento) {
        $consulta = $this->db->get('producto', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        } else {
            $consulta = $this->db->get('producto', $por_pagina, $segmento);
            if ($consulta->num_rows() > 0) {
                foreach ($consulta->result() as $fila) {
                    $data[] = $fila;
                }
                return $data;
            }
        }
    }

    function total_productos_paginadosBuscar($por_pagina, $segmento, $estado, $texto) {
        if ($estado == "0") {
            $est = "";
        }else{
            $est = $estado;
        }
        if ($est != "") {
             $this->db->like("state", $est);
        }
        $this->db->like("descripcion", $texto);
        $consulta = $this->db->get('producto', $por_pagina, $segmento);
//        $consulta = $this->db->query($consulta);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        } else {
            $consulta = $this->db->get('producto', $por_pagina, $segmento);
            if ($consulta->num_rows() > 0) {
                foreach ($consulta->result() as $fila) {
                    $data[] = $fila;
                }
                return $data;
            }
        }
    }

    //cuando pulsemos en añadir al carrito esta función será la encargada
    //de saber que producto hemos seleccionado por su id, que la envíamos desde
    //la vista al controlador, y desde el controlador aquí, el modelo.
    function porId($id) {
        $this->db->where('id_producto', $id);
        $productos = $this->db->get('producto');
        foreach ($productos->result() as $producto) {
            $productoFound = $producto;
        }
        return $productoFound;
    }

}

/* application/models/catalogo_model.php
     * el modelo
     */    