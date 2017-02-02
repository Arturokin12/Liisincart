<?php

function upload_image() {
    if (isset($_FILES['file_array'])) {
        $name_array = $_FILES['file_array']['name'];
        $tmpName_array = $_FILES['file_array']['tmp_name'];
        $type_array = $_FILES['file_array']['type'];
        $ruta = "";
        $getImagenes = file_get_contents("Imagenes.json");
        $imagenes = json_decode($getImagenes);
        for ($i = 0; $i < count($tmpName_array); $i++) {
            $ruta = "ImagenesProductos/" . $name_array;
            move_uploaded_file($tmpName_array, $ruta);
            print_r($ruta);
            array_push($imagenes, $ruta);
        }
        $imgJson = json_encode($imagenes);
        file_put_contents("Imagenes.json", $imgJson);
    }
}
?>
<script>
    window.location.replace("http://localhost:81/Liisincartphp/index.php");
</script>