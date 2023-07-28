document.addEventListener('DOMContentLoaded', function() {
  var toggleButton = document.getElementById('togbtn');
  var menu = document.getElementById('subMenu');

  toggleButton.addEventListener('click', function(event) {
      event.stopPropagation(); // Prevents the event from bubbling up to the document

      menu.classList.toggle('openmenu');
  });

  document.addEventListener('click', function() {
      menu.classList.remove('openmenu');
  });

  menu.addEventListener('click', function(event) {
      event.stopPropagation(); // Prevents the event from bubbling up to the document
  });
});