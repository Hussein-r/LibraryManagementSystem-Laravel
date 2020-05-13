function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "inline-block";
  } else {
    x.style.display = "none";
  }
}
var myTextBox = document.getElementById("myTextBox");
var myPriceTextBox = document.getElementById("myprice");
function checkInput(price) {
  console.log(price);
  var value = myTextBox.value;
  if (isNaN(value)) {
    myTextBox.preventDefault();
  }
  myPriceTextBox.value = value * price + " LE";
}
