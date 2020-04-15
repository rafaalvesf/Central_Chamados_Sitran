<link rel="stylesheet" href="css/main.css">
<div class="ctexto"> 
    <div class="menuchart">
      <div>
        <h4 class="ctexto1">FILTRAR POR</h4><br>
        <div class="spacemenu">
          <a href="?pagina=gsetor" class="is-white linktitulo"> SETOR</a>
          <a href="?pagina=gresponsavel" class="is-white linktitulo"> RESPONSÁVEL</a>
          <a href="?pagina=gprioridade" class="is-white linktitulo"> PRIORIDADE</a>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],

        <?php

        while($linha = mysqli_fetch_array($consulta_gsetor)){
        $setor = $linha['Setor_Solicitante'];
        $qtd = $linha['Qtd'];

        ?>

        
          ['<?php echo $setor ?>',  <?php echo $qtd ?>],

          <?php } ?>

        ]);

      

        var options = {
          title: 'Chamados por SETOR'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


    <div id="piechart" style="width: 900px; height: 500px;"></div>

</div>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='60'>";
?>