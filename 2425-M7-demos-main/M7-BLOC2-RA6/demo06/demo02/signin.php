<?php
include("includes/header.php");
?>

<form name="form" action="signin.proc.php" method="POST" onSubmit="return validar();">
    <input type="text" name="usu_nom" placeholder="Nom d'usuari"><br/>
    <input type="password" name="usu_paraula_clau" placeholder="Paraula clau" required><br/>
    <input type="password" name="usu_paraula_clau2" placeholder="Paraula clau" required><br/>
    <button type="submit">Entrar</button>
</form>

<?php
include("includes/footer.php");
?>

<script>
    function validar(){
        if(document.form.usu_paraula_clau.value==document.form.usu_paraula_clau2.value){
            return true;
        } else {
            return false;
        }
    }
</script>