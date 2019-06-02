<?php 

$seguranca = true; //VÁRIAVEL DE SEGURANÇA PARA CONEXÃO
include_once("config\connection.php");

$btnSubmit = filter_input(INPUT_POST, 'btnsubmit', FILTER_SANITIZE_STRING);//SUBMIT CONTATO
$btnDownload = filter_input(INPUT_POST, 'btndownload', FILTER_SANITIZE_STRING);//SUBMIT CSV


if ($btnSubmit) { //VERIFICA SE FORM FOI ENVIADO
	
	//RECEBENDO DADOS DAS INPUTs

	$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$telefone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
	$cidade = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
	$ddd = substr($telefone, 0, 2);
	$informacoes = filter_input(INPUT_POST, 'informations', FILTER_SANITIZE_STRING);

	if (!empty($nome) and !empty($email) and !empty($telefone) and !empty($cidade)) { //VERIFICA DADOS OBRIGATÓRIOS
		//INSERÇÃO DE DADOS
		$insert_contato = "INSERT INTO contatos (nome, email, ddd, telefone, id_cidade, informacoes) values (upper('$nome'), upper('$email'), '$ddd', '$telefone', '$cidade' , '$informacoes')";

		if (mysqli_query($conn, $insert_contato)) {
		    echo "<script>alert('Dados inseridos com sucesso!');
		    			  window.location.href = 'list.php';
		    	  </script>";
		} else {
		    echo "Error: " . $insert_contato . "<br>" . mysqli_error($conn);
		}
	}
	else{//REDIRECIONA SE FALTAR CAMPOS OBRIGATÓRIOS
		echo "<script>alert('Entre com os campos obrigatórios');
					  window.location.href = 'index.php';
			  </script>";
	}
}
else if ($btnDownload){//VERIFICA E CRIA ARQUIVO CSV
	
	$query = "SELECT co.nome, co.email, co.ddd, substr(co.telefone, 3) as telefone, ci.nome as cidade, ci.uf, co.informacoes 
	          FROM contatos co
	          inner join cidades ci on (ci.id = co.id_cidade)
	          order by ci.nome, co.nome";

    if ($result=mysqli_query($conn, $query)) {

	    $filename = "contatos_" . date('d.m.Y') . ".csv";
	    
	    //criar um ponteiro de arquivo
	    $f = fopen('php://memory', 'w');
		fputs( $f, "\xEF\xBB\xBF" ); // Resolve problema de caracteres especiais para Excel

	    
	    //define as colunas do cabeçalho
	    $fields = array('NOME', 'EMAIL', 'DDD', 'TELEFONE', 'CIDADE', 'UF', 'INFORMACOES');
	    fputcsv($f, $fields,';','"');
	    
	    //define cada linha de dados do arquivo csv
	    while($row = mysqli_fetch_row($result)){
	        $lineData = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
	        fputcsv($f, $lineData,';','"');
	    }
	    
	    //volta para o começo do arquivo
	    fseek($f, 0);
	    
	    //Define para baixar o arquivo e insere o nome
	    header('Content-Type: text/csv; charset=UTF-8');
	    header('Content-Disposition: attachment; filename="' . $filename . '";');
	    
	    //Saída de todos os dados restantes
	    fpassthru($f);
	    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else{ //ENVIA PARA O FORM CASO NÃO HOUVE SOLICITAÇÃO DE FORMULÁRIO
	header("Location: index.php");
}
?>

