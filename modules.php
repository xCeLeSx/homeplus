<div class="modules">
<?php
    $modulesList = file ('modules.txt');

    foreach ($modulesList as $module):
        $modulesDetails = explode('|', $module);
        $file = $modulesDetails[4];
        $setting = file($file);
        $setting = str_replace(array("\n","\r"), '', $setting);
?>
    <div class="module <?php echo $modulesDetails[1]; ?>">
                <div class="module-name">
                    <h2><?php echo $modulesDetails[0]; ?></h2>
                    <button data-mode="stan" data-pin="<?php echo $modulesDetails[2]; ?>" onclick="toggle(this)" value="<?php check($modulesDetails[2]); ?>" class="<?php check($modulesDetails[2]); ?>"><?php check($modulesDetails[2]); ?></button>
                </div>
                <div class="module-settings"><img src="img/<?php echo $modulesDetails[3]; ?>" alt="<?php echo $modulesDetails[5]; ?>" class="on">
                <form action="save.php" method="POST" onsubmit="return potwierdz()">
                <?php if($modulesDetails[1] == "light"): ?>
                    <label for="start-time">Czas włączenia: </label>
                    <input id="start-time" type="time" name="start-time" value="<?php echo $setting[0]; ?>" required></br>
                    
                    <label for="end-time">Czas wyłaczenia: </label>
                    <input id="end-time" type="time" name="end-time" value="<?php echo $setting[1]; ?>" required></br>
                <?php endif;?>
                <?php if($modulesDetails[1] == "cooling"): ?>
                    <label for="cooling-temp">Temperatura, powyżej której włączyć klimatyzacje: </label>
                    <input id="cooling-temp" type="number" name="cooling-temp" value="<?php echo $setting[0]; ?>" min="10" max="40" step="0.1" required>
                <?php endif;?>   
                <?php if($modulesDetails[1] == "heating"): ?>
                    <label for="heating-temp">Temperatura, poniżej której włączyć ogrzewanie: </label>
                    <input id="heating-temp" type="number" name="heating-temp" value="<?php echo $setting[0]; ?>" min="-10" max="20" step="0.1" required>
                <?php endif; ?>  
                    <input type="hidden" id="pin" name="pin" value="<?php echo $modulesDetails[2]; ?>">
                    <button type="submit">Zapisz</button>
                </form>
                </div>
</div>
<?php endforeach; ?>
</div>