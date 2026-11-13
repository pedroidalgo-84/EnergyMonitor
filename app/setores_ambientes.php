<?php 

require_once __DIR__ . '/init.php';

$setores = readAll(database(), "setor");
$ambientes = readAll(database(), "ambientes");
$leituras = readAll(database(), "leituras");
$metas = readAll(database(), "metas");

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['setor_id'])) {
    exit;
}

$setor_existe = false;

?>

<html>
    <head>
        <title>Setores e Ambientes</title>
        <link rel="stylesheet" href="./css/styleMenu.css">
        <link rel="stylesheet" href="./css/styleAmbientes.css">
    </head>
    <body>
        <div class="menu-conf">
            <?php require_once __DIR__ . '/menuLateral.php'; ?>
            <div class="conteudo"> <! Todo o conteúdo da página vai aqui >

            <?php foreach ($setores as $setor){

                $area_total = 0;
                foreach ($ambientes as $ambiente) {
                    if ($ambiente['setor_id'] == $setor['id']) {
                        $area_total += $ambiente['area_m2'];
                    }
                }

                if($setor['id'] == $_GET['id']){
                    $setor_existe = true;
                    echo "

                    <div class='info'>

                    <h1>Setor 0" . $setor['id'] . "</h1>

                    <h2>" . $setor['nome'] . "</h2>

                    <h2>Área total monitorada: " . $area_total . " m²</h2>
                    
                    </div>

                    ";
                }
            }

            if($setor_existe): ?> 
                
                <div class="andar">
                    <?php  
                    $area_andar = 0;
                    $qtd_equipamentos = 0;
                    foreach($ambientes as $ambiente){
                        if($ambiente['setor_id'] == $_GET['id'] && $ambiente['andar'] == "Térreo"){
                            $area_andar += $ambiente['area_m2'];
                            $qtd_equipamentos += $ambiente['qtd_equipamentos'];
                        } 
                    }
                    
                    ?>
                        <div class="titulo_andar"><h2>Térreo</h2> <p class="area">Área total monitorada: <span class="dados"><?php echo $area_andar; ?> m²</span></p> <p class="area">Quantidade de equipamentos:  <span class="dados"><?php echo $qtd_equipamentos ?></span></p> </div>
                            <br>


                        <div class="info_andar">
                            <div class="ambientes">
                                <h4>Ambientes: </h4>

                                <table>
                                    <?php  
                                    foreach($ambientes as $ambiente): 
                                        if($ambiente['setor_id'] == $_GET['id'] && $ambiente['andar'] == "Térreo"): ?>
                                                
                                            
                                                <tr class="ambiente">
                                                    <td class="nome"><?= $ambiente['nome'] ?></td>
                                                    <td>Medidor: <span class="dados">[<?= $ambiente['codigo_medidor'] ?>]</span></td>
                                                    <td>Área total monitorada: <span class="dados"><?= $ambiente['area_m2'] ?></span></td>
                                                    <td>Quantidade de equipamentos: <span class="dados"><?= $ambiente['qtd_equipamentos'] ?></span></td>
                                                    <td>Tempo de uso diário: <span class="dados"><?= $ambiente['tempo_uso_medio_diario'] ?></span></td>
                                                    <td><span class="status"><?= $ambiente['estado_medidor'] ?></span></td>
                                                </tr>
                                            

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        
                        </div>
                            
                </div> 

                <div class="andar">
                    <?php  
                    $area_andar = 0;
                    $qtd_equipamentos = 0;
                    foreach($ambientes as $ambiente){
                        if($ambiente['setor_id'] == $_GET['id'] && $ambiente['andar'] == 1){
                            $area_andar += $ambiente['area_m2'];
                            $qtd_equipamentos += $ambiente['qtd_equipamentos'];
                        } 
                    }
                    
                    ?>
                        <div class="titulo_andar"><h2>Andar 1</h2> <p class="area">Área total monitorada: <span class="dados"><?php echo $area_andar; ?> m²</span></p> <p class="area">Quantidade de equipamentos:  <span class="dados"><?php echo $qtd_equipamentos ?></span></p> </div>
                            <br>


                        <div class="info_andar">
                            <div class="ambientes">
                                <h4>Ambientes: </h4>

                                <table>
                                    <?php  
                                    foreach($ambientes as $ambiente): 
                                        if($ambiente['setor_id'] == $_GET['id'] && $ambiente['andar'] == 1): ?>
                                            
                                            <tr>
                                                <td class="nome"><?= $ambiente['nome'] ?></td>
                                                <td>Medidor: <span class="dados">[<?= $ambiente['codigo_medidor'] ?>]</span></td>
                                                <td>Área total monitorada: <span class="dados"><?= $ambiente['area_m2'] ?></span></td>
                                                <td>Quantidade de equipamentos: <span class="dados"><?= $ambiente['qtd_equipamentos'] ?></span></td>
                                                <td>Tempo de uso diário: <span class="dados"><?= $ambiente['tempo_uso_medio_diario'] ?></span></td>
                                                <td><span class="status"><?= $ambiente['estado_medidor'] ?></span></td>
                                            </tr>                            

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </table>

                            </div>
                        
                        </div>
                            
                </div> 

            

            <?php endif; ?>

            </div>
        </div>
    </body>
</html>
