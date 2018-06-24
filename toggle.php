<link rel="stylesheet" href="./css/style.css"><link rel="stylesheet" href="./css/button.css">  
   
    
<script src="js/jquery.min.js"></script>
            
             <div class="module cooling">
                <div class="module-name">
                    <h2>Klimatyzacja</h2>
                    <button data-mode="pwm" data-pin="18" onclick="toggle(this)" value="OFF" class="OFF">OFF</button>
                </div>
                <div class="module-settings"><img src="img/fan.jpg" alt="Wentylator" class="off"></div>
            </div>
            <div class="module heating">
                <div class="module-name">
                    <h2>Ogrzewanie</h2>
                    
                </div>
                <div class="module-settings"><img src="img/heating.jpg" alt="Płonące drzewo" class="on"><button data-mode="stan" data-pin="21" onclick="toggle(this)" value="OFF" class="OFF">OFF</button></div>
            </div>
            
<script src="js/button.js"></script>