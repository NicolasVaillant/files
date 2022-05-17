<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/anim.css">
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/author.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script src="js/script.js" defer></script>

    <title>files</title>
</head>

<body>
<?php
    if (isset($_GET["token"])) {
        echo "<div class='token-added'></div>";
    }
?>
<script type="text/javascript">
    const tokenFromUrl = "<?php echo $_GET["token"]; ?>";
</script>
<main>
    <header>
        <div class="line">
            <div class="logo">
                <img src="resources/img/Np.png" alt="Logo nicolasvaillant.net">
            </div>
            <div class="home">
                <a href="https://nicolasvaillant.net"><i class="fas fa-home"></i></a>
            </div>
        </div>
        <hr>
    </header>
    <div class="explication">
        <p class="explication--txt">
            Ce site vous permet de récupérer des fichiers à télécharger.
            Veuillez rentrer le token qui vous a été transmis.
        </p>
    </div>
    <div class="token-container">
        <input type="text" placeholder="Token" id="token">
        <button class="submit-token button-to-author">Valider</button>
    </div>
    <div class="wrapper init">
        <div class="background">
            <i class="fas fa-file-alt"></i>
            <i class="fas fa-arrow-alt-circle-down"></i>
        </div>
        <div class="elements">
            <div class="card-dl" data-status="hidden">
                <div class="visual-element">
                    <i class="fas fa-file-alt file-icon"></i>
                </div>
                <div class="description-line">
                    <div class="text-element">
                        <p class="name-element">default.xx</p>
                        <p class="size-element"></p>
                    </div>
                    <a href="" id="dl-icon" download>
                        <i class="fas fa-arrow-alt-circle-down"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="noFile" data-status="hidden">
            <i class="fas fa-exclamation-triangle"></i>
            <p>
                Aucun fichier n'a été trouvé.
                Votre token est peut-être erroné ou inexistant.
                Contactez moi pour plus d'information.
            </p>
            <a href="mailto:contact@nicolasvaillant.net">contact@nicolasvaillant.net</a>
        </div>
    </div>
</main>
</body>

</html>