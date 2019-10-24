<?php
    require('config.php');
    $sql = "INSERT INTO gastos VALUES (DEFAULT, '".$_POST['descricao']."', '".$_POST['valor']."', '".$_POST['dataGasto']."')";
    $query = mysqli_query($conexao, $sql);
    
    if ($query) {
		echo "<script>
				alert('Novo gasto regristrado com sucesso');
				location.href = 'index.php';
			</script>";
	} else {
		echo "<script>
				alert('Erro ao inserir');
				location.href = 'index.php';
			</script>";
	}
?>