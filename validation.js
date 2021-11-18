
function validation_form ( )
{
    let valid = true;

    if ( document.forma.R.selectedIndex === 0 )
    {
        alert ( "Пожалуйста, выберите R." );
        valid = false;
    }

    let y = this.y.value;
    y = y.replace(/,/, ".");
    const test = /[^\d-,.]/.test(y);

    if (test || y ==="" || isNaN(y)) {
        alert ( "Значение Y введено неверно. Y должен быть числом" );
        valid = false;
    }
    else if (y<-5 || y>5){
        alert ( "Y должен находиться в пределе от -5 до 5" );
        valid = false;
    }
    return valid;
}