<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <title>Cadastros</title>
    </head>
    <body>

        <!-- Recebendo os contatos do BD-->
        <?php 
            $seguranca = true;//VARIÁVEL DE SEGURANÇA
            include_once("config\connection.php");

            $sql = "SELECT (@row_number:=@row_number + 1) AS row_number, co.nome, co.email, co.ddd, co.telefone, co.informacoes, ci.nome as cidade, ci.uf 
                    FROM contatos co
                    inner join cidades ci on (ci.id = co.id_cidade)
                    inner join (SELECT @row_number:=0) AS t
                    order by ci.nome, co.nome";  

            if ($result=mysqli_query($conn, $sql)) {} 
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        ?>
        <!---->

        <br>
        <div class="container">
            <span class="align-text-top">
                <form action="insere_contato.php" method="POST" style="display:inline-block;">
                <button type="submit" class="btn btn-primary" value="submit" name="btndownload">Download CSV</button>
                </form>
            </span>
            <span class="align-text-top">
                <a href="index.php" class="button btn btn-primary">Add. Contato</a>
            </span>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Cidade / Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_row($result)): ?>
                    <tr>
                        <th scope="row"><?php echo $row[0]; ?></th>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo strtolower($row[2]); ?></td>
                        <td><?php echo "(".$row[3].") ".substr($row[4], 2); ?></td>
                        <td><?php echo $row[6]." / ".$row[7]; ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    </body>
</html>
