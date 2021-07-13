<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Lista de estados</title>
</head>

<h1 class="text-center">Lista de estados</h1>

<body class="bg-secondary bg-gradient">
    <table class="table table-bordered table-hover bg-light bg-gradient">
        <thead>
            <tr>
                <th class="text-center">Nome</th>
                <th class="text-center">Sigla</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($estados as $estado) {
                echo
                '<tr class="text-center">
                    <td>' . $estado['nome'] . '</td>
                    <td>' . $estado['sigla'] . '</td>
                </tr>';
            }
            ?>
        </tbody>
        <tfoot>
            <td>Nome</td>
            <td>Silga</td>
        </tfoot>
    </table>
</body>

</html>