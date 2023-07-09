
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Erro</title>
</head>
<body>
		<nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Gustavo Zaia e Moisés</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars" id="hamb"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="index.php">Consulta</a>
                <a class="nav-link" href="../cadastro/cadAnimais.php">Cadastro</a>
                <!-- <a class="nav-link" href="#">Pricing</a> -->
            </div>
            </div>
        </div>
	</nav> 




    <div class="alert alert-danger erro-alert" role="alert">
		<i class="fa-solid fa-xmark icon-err"></i> Erro de cadastro!
	</div>


    <a href="../cadastro/cadAnimais.php"><button class="btn btn-warning btn-err">Voltar ao cadastro</button></a>

    <script src="https://kit.fontawesome.com/5dfb4ac132.js" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>