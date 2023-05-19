<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Index</title>
    <link type="text/css" rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <style>
        .galeria{
            width: 80%;
            margin: 5px 10%;
            display: flex;
            flex-wrap: wrap;
        }
        .galeria .card{
            width: 23%;
            margin: 1%;
            height: 350px;
            box-shadow: 5px 5px 5px #8e8e8e;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            background-color: #f2f2f2;
        }

        .galeria .card img{
            width: 90%;
            height: 200px;


        }
        .galeria .card:hover{
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="row">
            <?php
            include_once "includes/menuext.php";
            // incluimos el menu
            ?>
        <main class="col-12 col-s-12 principal">
            <div class="col-12 col-s-12">
                <h1>P&Aacute;GINA PRINCIPAL</h1>

                <h2>Nuestro personal medico</h2>
                <section class="galeria">
                    <?php include_once "includes/card.php"; ?>
                </section>

            </div>
        </main>
    </div>
</body>

</html>