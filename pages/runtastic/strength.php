<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Styles CSS -->
    <link href="/css/styles.css" rel="stylesheet">

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
                        <a class="nav-link" href="/index.php">TechCrunch</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/hypebeast.php">HYPEBEAST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/news24.php">News24 Top Stories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/thehackernews.php">The Hacker News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/protonmail.php">ProtonMail Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/wired.php">WIRED</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sports
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/pages/sports/espnrpm.php">ESPN - RPM</a></li>
                            <li><a class="dropdown-item" href="/pages/sports/espnsoccer.php">ESPN - SOCCER</a></li>
                            <li><a class="dropdown-item" href="/pages/sports/ufcnews.php">UFC News</a></li>
                            <li><a class="dropdown-item" href="/pages/sports/wrcnews.php">WRC News</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Runtastic
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/pages/runtastic/cardio.php">Cardio</a></li>
                            <li><a class="dropdown-item" href="/pages/runtastic/strength.php">Strength</a></li>
                            <li><a class="dropdown-item" href="/pages/runtastic/nutrition.php">Nutrition</a></li>
                            <li><a class="dropdown-item" href="/pages/runtastic/daily-habits.php">Daily Habits</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Science
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/pages/science/distrowatch.php">DistroWatch.com</a></li>
                            <li><a class="dropdown-item" href="/pages/science/nasa.php">NASA Breaking News</a></li>
                            <li><a class="dropdown-item" href="/pages/science/nasa-day-image.php">NASA Image of the Day</a></li>
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
                    "https://www.runtastic.com/blog/en/category/strength/feed/"
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
                    <h5><a href="<?= $entry->link ?>"><strong><?= $entry->title ?></strong></a></h5>
                    <p><?= $entry->description ?></p>
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