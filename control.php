<?php
include 'functions.php';
    if(isset($_GET['pin']))
    {
        
    }

    if(isset($_GET['mode']))
    {
        if($_GET['mode']==='stan_off')
        {
		      off($_GET['pin']);
        }
             
	        else if($_GET['mode']==='stan_on')
            {
                set($_GET['pin']);
                on($_GET['pin']);
            }  
            else if($_GET['mode']==='pwm_on')
            {
                pwm_set($_GET['pin']);
                for($x = 0;$x<=64;$x++)
                {
                    pwm_on($_GET['pin'], $x*16);

                }
            }
            else if($_GET['mode']==='pwm_off')
            {
                for($x = 64;$x>=0;$x--)
                {
                    pwm_off($_GET['pin'], $x*16);

                }
            }
    }
?>