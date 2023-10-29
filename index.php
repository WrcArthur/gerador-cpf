<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerador CPF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script>
        function copyToClipboard() {
            var copyText = document.getElementById("copy_result");

            var range = document.createRange();
            range.selectNode(copyText);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);

            document.execCommand("copy");

            window.getSelection().removeAllRanges();
        }
    </script>
</head>
<body>
    <div class="grid text-center" style="margin-top: 40vh">
        <?php
        include 'Gerador.php';

        $teste = new Gerador();

        if (isset($_POST['copy_cpf'])) {
            $cpf = $teste->geraCpf();
            echo '<div id="copy_result" class="fw-medium">'.$cpf.'</div>';
        }
        ?>

        <form method="post">
            <button type="submit" class="btn btn-outline-success" name="copy_cpf" style="margin-top: 10px">Gerar CPF</button>
        </form>

        <button class="btn btn-outline-primary" style="margin-top: 10px" onclick="copyToClipboard()">Copiar CPF</button>
    </div>
</body>
</html>