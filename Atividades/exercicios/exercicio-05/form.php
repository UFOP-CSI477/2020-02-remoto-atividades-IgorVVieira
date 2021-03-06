<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cadastro</title>
</head>

<body class="bg-secondary bg-gradient">
    <div class="container">
        <div class="col-lg-6">
            <h1 class="text-dark text-center">Cadastro de pessoa</h1>
            <div class="p-2 bg-light bg-gradient rounded">
                <form method="POST" action="validar.php">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input class="form-control" type="text" name="nome" id="nome" required>
                    </div>

                    <div class="form-group">
                        <label for="idadade">Idade</label>
                        <input class="form-control" type="number" name="idade" id="idade" required min="0" max="115">
                    </div>

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input class="form-control" type="text" name="cpf" id="cpf" min="11" max="11" required>
                    </div>

                    <div class="form-group form-ckeck">
                        <label>Gênero:</label>
                        <div>
                            <input class="form-check-input" value="Masculino" type="radio" name="genero" id="masculino" required>
                            <label class="form-check-label" for="masculino">Masculino</label>
                        </div>
                        <div>
                            <input class="form-check-input" value="Feminino" type="radio" name="genero" id="feminino" required>
                            <label class="form-check-label" for="feminino">Feminino</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input class="form-control" type="text" name="estado" id="estado" required>
                    </div>

                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input class="form-control" type="text" name="cidade" id="cidade" required>
                    </div>

                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <input class="form-control" type="text" name="celular" id="celular" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>
                    <div class="p-2">
                        <button class="btn btn-success" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>