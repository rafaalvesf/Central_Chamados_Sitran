<?php
        $linha=mysqli_fetch_array($consulta_usuarios);
?>
        <div class="ctexto backformulario">
       <h3 class="ctexto ctexto1">ALTERAR SENHA DE <?php echo $_SESSION['usuario_digitado'] ?></h3>
       <form method="post" action="processa_alterar_senha.php" class="formulario">
            <div style="ctexto">
                <label>Senha Atual:</label><br>
                <input class="ctexto backformularioinput" type="password" name="senhatual" placeholder="Digite a sua senha atual">
                <br><br>
                <label>Nova Senha:</label><br>
                <input class="ctexto backformularioinput" type="password" name="senhanova" placeholder="Digite a sua senha atual">
                <br><br>
                <label>Confirmar Nova Senha:</label><br>
                <input class="ctexto backformularioinput" type="password" name="confsenhanova" placeholder="Digite a sua senha atual">
                <br><br>
                <div class="d-flex">
                    <div class="btn-group">
                        <button type="submit" name="checksenhas" value="ABERTO" class="btn btn-secondary">Alterar Senha</button>
                    </div>
                </div>
            </div>
            <br>
            </div>
        </form>
        </div>
            