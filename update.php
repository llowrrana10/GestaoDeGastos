<?php 
	require 'config.php';
	$sql = "UPDATE gastos SET descricao='".$_POST['descricao']."', valor ='".$_POST['valor']."', dataGasto='".$_POST['dataGasto']."' WHERE id = 8";
    $query = mysqli_query($conexao, $sql);
    
	if ($query) {
		echo "<script>
				alert('Atualizado com sucesso');
				location.href = 'index.php';
			</script>";
	} else {
		echo "<script>
				alert('Erro ao atualizar');
				location.href = 'index.php';
			</script>";
	}
?>