<?php
	session_start();
    if (!isset($_SESSION['zalogowany']))
	{
		header('Location: login.php');
		exit();
	}
    $pageTitle = 'Strona glowna'; 
    $pageCss = './css/button.css';
    include 'views/head.php';
    include 'functions.php';


?>

    <body>

        <div class="wrapper">
            <header>
                Witaj w panelu zarządzania - Home Plus
            </header>
            <div class="logo">
                <h1>Home Plus</h1>
            </div>
            <h2>Podstawowe informacje</h2>
            <div class="info">
                <div class="box" tabindex="0">
                    <img src="img/time.svg" class="more" alt="Zegar">
                    <h3>Czas</h3>
                    <div class="show">
                        <div id="time"></div>
                    </div>
                </div>
                <div class="box" id="box-temp" tabindex="0" title="Naciśnij, aby odświeżyć temperaturę">
                    <img src="img/temp.svg" class="more" alt="Termometr" >
                    <h3>Temperatura</h3>
                    <div class="show">
                        <div id="temp">
                            <?php
                            include 'temp.php';         
                            ?>
                        </div>
                    </div>
                </div>
                <div class="box" tabindex="0">
                    <img src="img/date.svg" class="more" alt="Kalendarz">
                    <h3>Data</h3>
                    <div class="show">
                        <div id="date">
                            <?php
                            echo date("d.m.y");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php include 'modules.php'; ?>
            <div class="info">
                <a href="" class="box disabled">
                    <img src="img/add.svg" class="more" alt="Plus">
                    <h2>Dodaj moduł</h2>
                    <div class="show">
                        Dodaj moduł
                    </div>
                </a>
                <a href="" class="box disabled">
                    <img src="img/gear.svg" class="more" alt="Zębatka">
                    <h2>Ustawienia</h2>
                     <div class="show">
                         Ustawienia
                    </div>
                </a>
                <a href="logout.php" class="box" onclick="return wyloguj()">
                    <img src="img/exit.svg" class="more" alt="Wyjście">
                    <h2>Wyloguj</h2>
                    <div class="show">
                          Wyloguj
                    </div>
                </a>
            </div>
           <footer>Home Plus by Krystian Bachorski &copy; 2008-<?php echo date("Y"); ?></footer>
        </div>
        <?php include'popup.php'; ?>
        <script src="js/jquery.min.js"></script>
        <script src="js/time.js"></script>
        <script src="js/button.js"></script>
        <script src="js/temp.js"></script>
        
    </body>

    </html>
