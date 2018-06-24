<?php

function on($pin) 
{
   shell_exec("/usr/local/bin/gpio -g write ".$pin." 1");
}

function off($pin)
{
   shell_exec("/usr/local/bin/gpio -g write ".$pin." 0");
}

function set($pin)
{
    shell_exec("/usr/local/bin/gpio -g mode ".$pin." out");
}

function pwm_set($pin)
{
    shell_exec("/usr/local/bin/gpio -g mode ".$pin." pwm");
}

function pwm_on($pin, $wartosc)
{
    shell_exec("/usr/local/bin/gpio -g pwm ".$pin." ".$wartosc);
}

function pwm_off($pin, $wartosc)
{
    shell_exec("/usr/local/bin/gpio -g pwm ".$pin." ".$wartosc);
}

function motor($pin, $delay)
{
    shell_exec("python motor.py ".$pin." ".$delay." > /dev/null 2>&1 &");
}

function pwm_bright($pin, $bright) 
{
    shell_exec("/usr/local/bin/gpio -g pwm ".$pin." ".$bright);
}

function temp($jednostka)
{
    $temp = shell_exec("python temp.py ".$jednostka);
    return $temp;
}

function blink()
{
    shell_exec("python blink.py > /dev/null 2>&1 &");
}

function kill_blink()
{
    shell_exec("pkill -f blink.py");
}

function check($pin)
{
    $status = shell_exec("/usr/local/bin/gpio -g read ".$pin);
    if ($status == 1)
    {
        echo "ON";
    }
    else if ($status == 0)
    {
        echo "OFF";
    }
}


?>