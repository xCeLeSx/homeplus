<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Home Plus
        <?php if (isset($pageTitle))
        {
            echo ' - '.$pageTitle;
        }
        ?>
    </title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <?php if (isset($pageCss))
	{
		echo '<link rel="stylesheet" href="'.$pageCss.'">';
	} 
   ?>
    <meta name="viewport" content="width=device-width">
</head>
