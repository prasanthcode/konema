// function toggleMenu() {
//   const subMenu = document.getElementById("subMenu");
//   subMenu.classList.toggle("openmenu");
// }

// function toggleMenu(event) {

// }

// const bar = document.getElementById("bar");
// const close = document.getElementById("close");
// const nav = document.getElementById("navbar");

// if (bar) {
//   bar.addEventListener("click", () => {
//     nav.classList.add("active");
//   });
// }

// if (close) {
//   close.addEventListener("click", () => {
//     nav.classList.remove("active");
//   });
// }
document.addEventListener('DOMContentLoaded', function() {
  var toggleButton = document.getElementById('bar');
  var menu = document.getElementById('navbar');

  toggleButton.addEventListener('click', function(event) {
      event.stopPropagation(); // Prevents the event from bubbling up to the document

      menu.classList.toggle('active');
  });

  document.addEventListener('click', function() {
      menu.classList.remove('active');
  });

  menu.addEventListener('click', function(event) {
      event.stopPropagation(); // Prevents the event from bubbling up to the document
  });
});
