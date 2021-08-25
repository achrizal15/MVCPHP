<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="<?= URLPUBLIC ?>/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title><?= $title  ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= URLPUBLIC ?>">SRIWANGI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <?php for ($i = 0; $i < count($menu); $i++) : ?>
                        <?php $jdl = explode(" ", $title);
                        if (in_array($menu[$i], $jdl)) : ?>
                            <a class="nav-link active" aria-current="page" href="<?= URLPUBLIC; ?>/<?= $menu[$i];  ?>"> <?= $menu[$i];  ?></a>
                        <?php else :  ?>
                            <a class="nav-link" aria-current="page" href="<?= URLPUBLIC; ?>/<?= $menu[$i];  ?>"> <?= $menu[$i];  ?></a>
                        <?php endif;  ?>
                    <?php endfor;  ?>
                    <a class="nav-link" aria-current="page" href="<?= URLPUBLIC; ?>/Authentikasi/logout">Logout</a>
                </div>
            </div>
        </div>
    </nav>