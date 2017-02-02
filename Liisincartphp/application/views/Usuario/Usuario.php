<div style="display: inline">

    <label class="color3" style="color: white;font-size: 18px;margin-top: 20px" id="user"><?= $this->session->userdata("user") ?></label>

</div>
<button onclick="cerrarSession()" style="margin-top: -10px" type="button" class="btn btn-danger btn-navbar ml1">Cerrar Sesión</button>
<!--<button onclick="cerrarSes('da')" type="button" id="btCerrarSes" class="btn btn-danger btn-navbar ml1">Cerrar Sesión</button>-->
<script type="text/javascript">
    $("#btCerrarSes").button().click(function () {
        cerrarSes();
    });
</script>
