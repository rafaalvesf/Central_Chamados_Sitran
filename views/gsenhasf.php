<script>
    function funcao1() {
        var x;
        var r = confirm("Você Realmente deseja EXCLUIR o usuário?");
        if (r == true) {
            x = "você pressionou OK!";
        } else {
            return false;;
        }
        document.getElementById("demo").innerHTML = x;
    }
</script>

<div class="ctexto">
    <h3 class="ctexto1">GERADOR DE SENHAS</h3>
</div>

<div>
    <?php
    $linha1 = mysqli_fetch_array($consulta_senhas1);

    if ($linha1['Email'] == NULL || $linha1['Email'] == "") {
    ?>
        <div class="backformulario"><br>
            <div class="ctexto">
                <h4>O E-mail não possui Senha Registrada.</h4><br>
            </div>
            <form method="post" action="?pagina=pgsenhas" onload="sendForm()">
                <input type="hidden" name="emailger1" value="<?php echo $_POST['emailger']; ?>">
                <div class="ctexto">
                    <input type="submit" value="Gerar" class="button"><br><br>
                </div>
            </form>
        </div><br><br>

    <?php
    } else {
    ?>

        <table border="0.5" class="table table-hover tablesetores">
            <tr class="thead-dark">
                <th>Email</th>
                <th>Senha</th>
                <th></th>

            </tr>

            <?php
            echo '<tr>
                <td class="alicolunas alicolunas1">' . $linha1['Email'] . '</td>';
            echo '<td class="alicolunas alicolunas1">' . $linha1['Senha'] . '</td>';

            ?>
            <td>
                <form method="post" onsubmit="return funcao1()" action="processa_exclui_email.php">
                    <input type="hidden" name="exemail" value="<?php echo $linha1['Email']; ?>">
                    <input type="image" class="logo_edit" src="img/removs.png">
                </form>
            </td>

        </table>
        <br><br><br>
</div>
<?php
        if ($_POST['nomepess'] != NULL || $_POST['nomepess'] != "") {
?>
    <h4 class="ctexto">Assinatura de E-mail</h4>
    <br><br><br>
    <div class="ctexto">
        <div class="assbox">

            <div class="assimg">
                <img src="img/logo.jpg" alt="">
            </div>
            <div>
                <div class="assnome">
                    <h6> <?php echo $_POST['nomepess']; ?> </h6>
                </div>
                <div class="asssetor">
                    <h6> <?php echo $_POST['setorpess']; ?> </h6>
                </div>
                <div class="asstelefone">
                    <h6> Tel: (31)3389-3900 </h6>
                </div>
                <div class="assemail">
                    <h6> <?php echo $linha1['Email']; ?> </h6>
                </div>
                <div class="asssite">
                    <a> www.sitran.com.br </a>
                </div>
            </div>
        </div>
    </div>



<?php }
    }
?>