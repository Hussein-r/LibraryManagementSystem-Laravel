function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "inline-block";
    } else {
        x.style.display = "none";
    }
}
var myTextBox = document.getElementById("myTextBox");
var myPriceTextBox = document.getElementsByClassName("myprice");
function checkInput(price) {
    console.log(price);
    var value = myTextBox.value;
    if (isNaN(value)) {
        myTextBox.preventDefault();
    }
    myPriceTextBox[0].value = value * price;
    myPriceTextBox[1].value = value * price;
}
var myRateBox = document.getElementById("myRateBox");
function checkRate() {
    var value = myRateBox.value;
    if (!(value >= 1 && x <= 10)) {
        myRateBox.preventDefault();
    }
}
