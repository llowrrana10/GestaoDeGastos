<?php
    require 'config.php';

    if (isset($_GET['metodo']) AND isset($_GET['id'])) {
        if ($_GET['metodo'] == "deleta") {
            # code...
            $sql = "DELETE FROM gastos WHERE id=".$_GET['id'];
            $query = mysqli_query($conexao, $sql);
            if ($query) {
            echo "<script>
            alert('Removido com sucesso');
                    location.href = 'index.php';
                    </script>";
                } else {
                    echo "<script>
                    alert('Erro ao remove');
                    location.href = 'index.php';
                    </script>";
                }
        }
    }

    if (isset($_GET['metodo']) AND isset($_GET['id'])) {
        if ($_GET['metodo'] == "editar") {
            # code...
            $sql = "SELECT * FROM gastos WHERE id = '".$_GET['id']."'";
            $query = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($query)) { 
                $id = $dados['id'];
                $descricao = $dados['descricao'];
                $valor = $dados['valor'];
                $dataGasto = $dados['dataGasto'];
            }
        }
    }
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestão de Gastos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="alert alert-success" role="alert">
                    Gestão De Gastos
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <span>Novo Gasto</span>
                <form method="POST" action="<?php echo isset($_GET['metodo']) ? "update.php" : "insert.php" ?>">
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input id="id" type="number" readonly class="form-control" name="id" value="<?php echo isset($_GET['metodo']) ? $id : "" ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea id="descricao" class="form-control" name="descricao" placeholder="Descrição"><?php echo isset($_GET['metodo']) ? $descricao : "" ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input id="valor" type="number" class="form-control" name="valor" value="<?php echo isset($_GET['metodo']) ? $valor : "" ?>" placeholder="Valor">
                    </div>
                    <div class="form-group">
                        <label for="data">Data</label>
                        <input id="data" type="text" class="form-control" name="dataGasto" value="<?php echo isset($_GET['metodo']) ? $dataGasto : "" ?>" placeholder="dd/mm/aaaa">
                    </div>
                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>
            </div>
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Data</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM gastos ORDER BY dataGasto asc";
                            $query = mysqli_query($conexao, $sql);
                            while ($dados = mysqli_fetch_assoc($query)) {  
                                echo '<tr>
                                        <th>'.$dados['id'].'</th>
                                        <td>'.$dados['descricao'].'</td>
                                        <td>R$ '.$dados['valor'].'</td>
                                        <td>'.$dados['dataGasto'].'</td>
                                        <td>
                                            <a href="?metodo=editar&id='.$dados['id'].'"<button type="button" class="btn btn-primary">Editar</button></a>
                                            <a href="?metodo=deleta&id='.$dados['id'].'"><button type="button" class="btn btn-danger">Deleta</button></a>
                                        </td>
                                    </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>