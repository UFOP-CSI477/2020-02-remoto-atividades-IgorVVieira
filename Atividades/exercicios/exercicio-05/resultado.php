<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Resultado</title>
</head>

<body class="bg-secondary">
    <div class="container">
        <div class="col-lg-6">
            <h1 class="text-dark text-center">Resultado do cadastro</h1>
            <div class="p-2 bg-light bg-gradient rounded">
                <?php
                echo
                '<ol class="list-unstyled">
                    <li class="list-group-item">' . $user->nome . '</li>
                    <li class="list-group-item">' . $user->idade . '</li>
                    <li class="list-group-item">' . $user->cpf . '</li>
                    <li class="list-group-item">' . $user->genero . '</li>
                    <li class="list-group-item">' . $user->estado . '</li>
                    <li class="list-group-item">' . $user->cidade . '</li>
                    <li class="list-group-item">' . $user->email . '</li>
                </ol>';
                ?>
            </div>
        </div>
    </div>
</body>

</html>