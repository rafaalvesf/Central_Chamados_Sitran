<script type="text/javascript">
    function validateEmail() {
        var email = document.forms["gerarsenha"]["emailger"].value;

        if (email == null || email == "") {
            alert("HÁ CAMPOS OBRIGATÓRIOS NÂO PREENCHIDOS");
            return false;
        }
    }
</script>
<script>
    function reapareceDiv() {
        document.getElementById("teste").style.display = "block";
    }
</script>
<div class="ctexto">
    <h3 class="ctexto1">GERADOR DE SENHAS</h3>
</div>

<div class="backformulario">
    <div class="ctexto">
        <h4>Pesquisar Senhas.</h4>
    </div>
    <form name="gerarsenha" method="post" action="?pagina=gsenhasf&filtrogsenhas" class="formulario ctexto" onsubmit="return validateEmail()">
        <br>
        <label>E-mail:</label><br>
        <input type="text" name="emailger" placeholder="E-mail" class="ctexto backformularioinput">
        <br><br>
        <input class="is-white center" type="button" value="Incluir Assinatura" onclick="reapareceDiv()" /><br />
        <br>
        <div class="ocultadiv ctexto" id="teste">
            <input type="text" name="nomepess" placeholder="Nome" class="ctexto backformularioinput"><br><br>
            <input type="text" name="setorpess" placeholder="Setor" class="ctexto backformularioinput"><br><br>
        </div>
        <div class="ctexto">
            <input type="submit" value="Pesquisar" class="button"><br><br>
        </div>
    </form>
</div><br><br>