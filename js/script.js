// toggle class active
const navbarNav = document.querySelector(".sidebar");

// ketika hamburger menu di klik
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

function incrementValue() {
  var value = parseInt(document.getElementById("number").value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById("number").value = value;
  document.getElementById("minusButton").disabled = false;
  document.getElementById("plusButton").disabled = true;
}

function decrementValue() {
  var value = parseInt(document.getElementById("number").value, 10);
  value = isNaN(value) ? 0 : value;
  value--;
  document.getElementById("number").value = value;
  document.getElementById("minusButton").disabled = true;
  document.getElementById("plusButton").disabled = false;
}

// function Print
function printPage() {
  window.print();
}

// // toggle class active
// const content = document.querySelector(".content");

// // ketika hamburger menu di klik
// document.querySelector("#hamburger-menu").onclick = () => {
//   content.classList.toggle("activ");
// };
