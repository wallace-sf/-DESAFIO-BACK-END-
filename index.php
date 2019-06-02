<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <title>Contato</title>
    </head>
    <body>
        <?php 
            $seguranca = true;
            include_once("config\connection.php");

            $sql = "SELECT * FROM cidades";

            if ($result=mysqli_query($conn, $sql)) {} 
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        ?>
        <div class="container">
            <form action="insere_contato.php" method="POST">
                <div class="form-group">
                    <label for="name">Nome Completo <font color="red">*</font></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome e Sobrenome" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="email">Endereço de E-mail <font color="red">*</font></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="phone">Telefone <font color="red">*</font></label>
                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" id="phone" name="phone" placeholder="(XX) XXXXX-XXXX" minlength=10 maxlength="11">
                </div>
                <div class="form-group">
                    <label for="city">Cidade <font color="red">*</font></label>
                    <select class="form-control" id="city" name="city">
                        <option value="">Selecione a cidade</option>
                        <?php while($row=mysqli_fetch_row($result)): ?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]." (".$row[2].")"; ?></option>
                        <?php endwhile;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="informations">Informações</label>
                    <textarea class="form-control" id="informations" name="informations" rows="3" placeholder="máx: 400 caracteres."></textarea>
                </div>
                <button type="submit" class="btn btn-primary" value="submit" name="btnsubmit">Enviar</button>
                <font color="red">(*) Campos obrigatórios</font>
            </form>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    </body>
</html>
