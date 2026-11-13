<?php
    require_once __DIR__ . '/init.php';
    
?>

<html>
<head>
    <link rel="stylesheet" href="./css/styleAnaliseE_Compara.css">
    <link rel="stylesheet" href="./css/styleMenu.css">
    <title>Análise e Comparativos</title>
</head>

<body>
    <div class="menu-conf"><?php require_once __DIR__ . "/menuLateral.php" ?>

        <div class="conteudo">
            <h2>Análise Histórica e Comparativos</h2>

                <div class="card">
                    <form action="" method="post">
                        <select name="ambiente" id="ambiente">
                            <option value="lab_quimica_01">Lab. de Química 01</option>
                            <option value="lab_quimica_02">Lab. de Química 02</option>
                            <option value="refeitorio">Refeitório</option>
                            <option value="administracao">Administração</option>
                        </select>
                        <button type="submit">Filtrar</button>
                    </form>
                </div>

                <center><div><p>Gráfico: Tendência de Consumo Diário</p></div></center>

            <center>
                <div class="comparativo">
                    <div class="quimica01">
                        <center><h3>Lab. Química 01</h3></center>
                        <p>Consumo Médio:  150KWh</p>
                        <br>
                        <p>Área Total: 48m²</p>
                        <br>
                        <p>Indicador: 3.0 kwh/m²</p>
                        <br>
                        <p><b>Eficiente 🟢 </b></p>
                    </div>
                    
                    <div class="quimica02">
                        <center><h3>Lab. Química 02</h3></center>
                        <p>Consumo Médio:  350KWh</p>
                        <br>
                        <p>Área Total: 48m²</p>
                        <br>
                        <p>Indicador: 6.4 kwh/m²</p>
                        <br>
                        <p><b>Desperdício 🔴</b></p>
                    </div>
                    
                    <div class="relatorio">
                        <center><h3>Relatório Automático</h3></center>
                        <p>O Lab-02 esta tendo um certo disperdicio de energia, enquanto o Lab-01 esta tendo muita eficiencia assim mantendo um bom gasto de enrgia sem prejudicar a empresa com gastos</p>
                    </div>
                </div>
            </center>
                
        </div>

</body>