function toggle(button) {
    var pin = button.getAttribute("data-pin")
    var mode = button.getAttribute("data-mode")
    if(button.value=="OFF") {
        button.className ="ON"
        button.innerHTML="ON"
        button.value="ON"
        mode = mode+'_on'
        $.get("control.php", { mode: mode, pin: pin } );
    } else if(button.value=="ON") {
        button.className ="OFF"
        button.innerHTML="OFF"
        button.value="OFF"
        mode = mode+'_off'
        $.get("control.php", { mode: mode, pin: pin } );
    }
}
function potwierdz(){
    return confirm('Czy na pewno chcesz zapisać ustawienia?');
}

function wyloguj(){
    return confirm('Czy na pewno chcesz się wylogować?');
}