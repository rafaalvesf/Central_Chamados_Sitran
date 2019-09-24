<?php
        $linha=mysqli_fetch_array($consulta_usuarios);
?>
       <h2 class="ctexto ctexto1">ALTERAR SENHA DE <?php echo $_SESSION['usuario_digitado'] ?></h2>
       <form method="post" action="processa_alterar_senha.php" class="formulario">
            <div style="text-align:center">
            <label>Senha Atual:</label><br>
            <input class="ctexto" type="password" name="senhatual" placeholder="Digite a sua senha atual">
            <br><br>
            <label>Nova Senha:</label><br>
            <input class="ctexto" type="password" name="senhanova" placeholder="Digite a sua senha atual">
            <br><br>
            <label>Confirmar Nova Senha:</label><br>
            <input class="ctexto" type="password" name="confsenhanova" placeholder="Digite a sua senha atual">
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
            