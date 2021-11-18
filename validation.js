function validate() {
    document.forma.elements['submit'].disabled = !(val());
}

function val() {

    var valid = true;
    let y = this.y.value;
    y = y.replace(/,/, ".");
    const test = /[^\d-,.]/.test(y);
    var txt = "";

    if (test || y === "" || isNaN(y)) {

        txt = "Значение Y введено неверно или отсутствует. Y должен быть числом";
        // alert ( "Значение Y введено неверно. Y должен быть числом" );
        valid = false;

    } else if (y < -5 || y > 5) {

        txt = "Y должен находиться в пределе от -5 до 5";

        // alert ( "Y должен находиться в пределе от -5 до 5" );
        valid = false;
    }
    document.getElementById("demo").innerHTML = txt;
    return valid;
}



