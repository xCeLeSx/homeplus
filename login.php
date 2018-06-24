<?php
	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: index.php');
		exit();
	}
/* if(!isset($_SESSION['lang']))
    {
        $_SESSION['lang'] = "pl";
    }
    require_once "/lang/". $_SESSION['lang'].".php"; */
    $pageTitle = 'Zaloguj się'; 
    $pageCss = './css/login.css';
    include 'views/head.php'; ?>

    <body>
        <form action="login_script.php" method="post" class="<?php if(isset($_SESSION['blad']))echo 'animation'; ?> login">
           <h2>Home Plus</h2>
            <div class="input-container">
                <input type="text" name="login" id="login" required type="text"><label for="login">Login: </label>
            </div>

            <div class="input-container">
                <input type="password" name="password" id="password" required type="password"><label for="password">Hasło: </label>
            </div>
            
            <button type="submit">Zaloguj się</button>
            <?php if(isset($_SESSION['blad']))	echo $_SESSION['blad']; ?>
            
        </form>
    </body>

    </html>
