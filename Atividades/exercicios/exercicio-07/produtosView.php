<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <table class="table table-bordered table-hover bg-light bg-gradient">
        <thead>
            <tr>
                <th class="text-center">Nome</th>
                <th class="text-center">Unidade de media</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($produtos->fetchAll() as $produto) {
                echo
                '<tr class="text-center">
                    <td>' . $produto['nome'] . '</td>
                    <td>' . $produto['um'] . '</td>
                </tr>';
            }
            ?>
        </tbody>
        <tfoot>
            <td class="text-center">Nome</td>
            <td class="text-center">Unidade de medida</td>
        </tfoot>
    </table>
    <a href="form.php">Cadastrar</a>
</body>

</html>