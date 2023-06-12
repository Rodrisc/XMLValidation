<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar XML</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.verificar').click(function(){
                $.ajax({
                    url:'XMLValidator.php',
                    method:'POST',
                    success: function(response){
                        $('.resultado').html(response);
                    }
                })
            })
        })

        $
    </script>

    <!-- <div class="head"> -->
        <h1>Validar XML com XSD</h1>
        <button class='verificar'>Verificar</button>
    <!-- </div> -->
    <div class="resultado"></div>

    
</body>

</html>