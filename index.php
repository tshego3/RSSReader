<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Styles CSS -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <title>RSS Reader</title>
</head>
<body>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/index.php"><strong>RSS Reader</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">TechCrunch</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/hypebeast.php">HYPEBEAST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News24 Top Stories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">The Hacker News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ProtonMail Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">WIRED</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sports
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">ESPN - RPM</a></li>
                            <li><a class="dropdown-item" href="#">ESPN - SOCCER</a></li>
                            <li><a class="dropdown-item" href="#">UFC News</a></li>
                            <li><a class="dropdown-item" href="#">WRC News</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Science
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">DistroWatch.com</a></li>
                            <li><a class="dropdown-item" href="#">NASA Breaking News</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="space"></div>

    <div class="container">
        <div class="row">
            <?php
                //Feed URLs
                $feeds = array(
                    "https://techcrunch.com/feed/"
                );
                
                //Read each feed's items
                $entries = array();
                foreach($feeds as $feed) {
                    $xml = simplexml_load_file($feed);
                    $entries = array_merge($entries, $xml->xpath("//item"));
                }
                
                //Sort feed entries by pubDate
                usort($entries, function ($feed1, $feed2) {
                    return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
                });
                
            ?>
            
            <?php
                //Print all the entries
                foreach($entries as $entry){
            ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= $entry->image ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $entry->title ?></h5>
                            <p class="card-text"><?= $entry->description ?></p>
                            <a href="<?= $entry->link ?>" class="btn btn-primary">View Article</a>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</body>
</html>