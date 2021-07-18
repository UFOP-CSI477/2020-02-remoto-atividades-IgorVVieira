<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="text-dark text-center">Cadastro de produtos</h1>
                <div class="p-2 bg-light bg-gradient rounded">
                    <form method="POST" action="cadastrar.php">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input class="form-control" type="text" name="nome" id="nome" required>
                        </div>

                        <div class="form-group">
                            <label for="um">Unidade de media</label>
                            <input class="form-control" type="text" name="um" id="um" required>
                        </div>
                        <div class="p-2">
                            <button class="btn btn-success" type="submit">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="produtosView.php">Listagem dos produtos</a>
</body>

</html>