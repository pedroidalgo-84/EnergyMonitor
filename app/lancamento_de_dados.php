<?php

    require_once __DIR__ . '/init.php';
   $ambientes = readAll(database(), "ambientes");
   $leituras = readAll(database(), "leituras");
?>
<html>
    <head>
        <link rel="stylesheet" href="./css/styleDados.css">
        <link rel="stylesheet" href="./css/styleMenu.css">
        <title>Lançamento de Dados</title>
    </head>
    <body>
        <div class="menu-conf">
            <?php require_once __DIR__ . '/menuLateral.php'; ?>
        
        <div class="conteudo">
            <h1>Central de Lançamento de Dados</h1>

            <div class=" form-manual">
                <h2>Lançamento Manual</h2>
            <form action="" method="post">
                <label for="ambiente">Selecione o Ambiente / Medidor:</label>
                <select id="ambiente" name="ambiente" required>
                    <?php foreach ($ambientes as $ambiente): ?>
                        <option value="<?= $ambiente['id'] ?>"><?= $ambiente['nome'] ?></option>
                    <?php endforeach; ?>
                </select><br><br>

                <label for="data_hora">Data e Hora do Registro:</label>
                <input type="datetime-local" id="data_hora" name="data_hora" required><br><br>

                <label for="valor_relogio">Valor Atual do Relogio em (kWh):</label>
                <input type="number" id="valor_relogio" name="valor_relogio" required><br><br>

                <label for="responsavel">Responsável pelo Registro:</label>
                <input type="text" id="responsavel" name="responsavel" required><br><br>

                <label for="setor">Setor:</label>
                <input type="text" id="setor" name="setor" required><br><br>

                <label for="status_bloco">Status do Bloco:</label>
                <select id="status_bloco" name="status_bloco" required>
                    <option value="ativo">Ativo🟢</option>
                    <option value="interferencia">Em Interferência🟡</option>
                    <option value="inativo">Inativo🔴</option>
                </select><br><br>

                <button>Salvar Registro no Banco de Dados</button>
            </form>
            </div>


            <div class="form-registro">
                <h2>Ultimos Registros Gravados</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Data e Hora</th>
                            <th>Medidor Sala</th>
                            <th>Valor do Relógio</th>
                            <th>Origem</th>
                            <th>Area m2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($leituras as $leitura): ?>
                            <tr>
                                <td><?= $leitura['data_hora'] ?></td>
                                <td><?= $leitura['id'] ?></td>
                                <td><?= $leitura['leitura_acumulada_kwh'] ?></td>
                                <td><?= $leitura['origem'] ?></td>
                                <td><?= $leitura['ambiente_id'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
=======
require_once __DIR__ . '/init.php';
$ambientes = readAll(database(), "ambientes");
$leituras = readAll(database(), "leituras");
$setores = readAll(database(), "setor");

$databaseStatus = 'Conectado';

try {
    require_once __DIR__ . '/init.php';
    $pdo->query('SELECT 1');
} catch (Throwable $exception) {
    $databaseStatus = 'Indisponível';
}
?>
<html>

<head>
    <link rel="stylesheet" href="./css/styleDados.css">
    <link rel="stylesheet" href="./css/styleMenu.css">
    <title>Lançamento de Dados</title>
</head>

<body>
    <div class="menu-conf">
        <?php require_once __DIR__ . '/menuLateral.php'; ?>

        <div class="conteudo">
            <h1>Central de Lançamento de Dados</h1>
            
            <div class="status">
                <p>Banco de dados <strong><?= htmlspecialchars($databaseStatus, ENT_QUOTES, 'UTF-8') ?></strong></p>
            </div>
            
            <div class="form-container">
                <div class=" form-manual">
                    <h2>Lançamento Manual</h2>
                    <form action="" method="post">
                        <label for="ambiente"><b>Selecione o Ambiente / Medidor:</b></label>
                        <br>
                        <select id="ambiente" name="ambiente" required>
                            <?php foreach ($ambientes as $ambiente): ?>
                                <option value="<?= $ambiente['id'] ?>"><?= $ambiente['nome'] ?></option>
                            <?php endforeach; ?>
                        </select><br><br>

                        <label for="data_hora"><b>Data e Hora do Registro:</b></label>
                        <br>
                        <input type="datetime-local" id="data_hora" name="data_hora" required><br><br>

                        <label for="valor_relogio"><b>Valor Atual do Relogio em (kWh): </b></label>
                        <br>
                        <input type="number" id="valor_relogio" name="valor_relogio" required><br><br>

                        <label for="responsavel"><b>Responsável pelo Registro:</b></label>
                        <br>
                        <input type="text" id="responsavel" name="responsavel" required><br><br>

                        <label for="setor"><b>Setor:</b></label>
                        <br>
                        <select id="setor" name="setor" required>
                            <?php foreach ($setores as $s): ?>
                                <option value="<?= $s['id'] ?>"><?= $s['nome'] ?></option>
                            <?php endforeach; ?>
                        </select><br><br>

                        <label for="status_bloco"><b>Status do Bloco:</b></label>
                        <br>
                        <select id="status_bloco" name="status_bloco" required>
                            <option value="ATIVO">Ativo🟢</option>
                            <option value="INTERFERÊNCIA">Em Interferência🟡</option>
                            <option value="INATIVO">Inativo🔴</option>
                        </select><br><br>

                        <button type="submit"><b>Salvar Registro no Banco de Dados</b></button>
                    </form>
                </div>



                <div class="form-registro">
                    <h2><b>Ultimos Registros Gravados</b></h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Data e Hora</th>
                                <th>Medidor Sala</th>
                                <th>Valor do Relógio</th>
                                <th>Origem</th>
                                <th>Area m2</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($leituras as $leitura): ?>
                                <tr>
                                    <td><?= $leitura['data_hora'] ?></td>
                                    <td><?= $leitura['codigo_medidor'] ?></td>
                                    <td><?= $leitura['leitura_acumulada_kwh'] ?></td>
                                    <td><?= $leitura['origem'] ?></td>
                                    <td><?= $leitura['area_m2_leitura'] ?></td>
                                    <td><?= $leitura['estado_medidor_leituras'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

>>>>>>> 022cd25a3069eec90b03f1d96890f140d7598ebf
</html>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ambienteDado = $_POST['ambiente'];
$ambienteBanco = read(database(), "ambientes", "id = $ambienteDado");
$datahoraDado = $_POST['data_hora'];
$valorRelogioDado = $_POST['valor_relogio'];
$responsavelDado = $_POST['responsavel'];
$setorDado = $_POST['setor'];
$statusDado = $_POST['status_bloco'];
$dados = [
    'id' => null,
    'ambiente_id' => $ambienteBanco['id'],
    'usuario_id' => 1,
    'data_hora' => $datahoraDado,
    'leitura_acumulada_kwh' => $valorRelogioDado,
    'origem' => 'Manual',
    'area_m2_leitura' => $ambienteBanco['area_m2'],
    'codigo_medidor' => $ambienteBanco['codigo_medidor'],
    'estado_medidor_leituras' => $statusDado,
];
create(database(), "leituras", $dados);
}
?>