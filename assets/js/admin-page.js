

document.querySelector(".grid").addEventListener("click", function () {
  document.querySelector(".list").classList.remove("active");
  document.querySelector(".grid").classList.add("active");
  document.querySelector(".products-area-wrapper").classList.add("gridView");
  document
    .querySelector(".products-area-wrapper")
    .classList.remove("tableView");
});

document.querySelector(".list").addEventListener("click", function () {
  document.querySelector(".list").classList.add("active");
  document.querySelector(".grid").classList.remove("active");
  document.querySelector(".products-area-wrapper").classList.remove("gridView");
  document.querySelector(".products-area-wrapper").classList.add("tableView");
});

var modeSwitch = document.querySelector(".mode-switch");
modeSwitch.addEventListener("click", function () {
  document.documentElement.classList.toggle("light");
  modeSwitch.classList.toggle("active");
});

document.addEventListener("DOMContentLoaded", function () {
    var enlaces = document.querySelectorAll('.sidebar-list-item a');
    var contenidos = document.querySelectorAll('.app-content');

    enlaces.forEach(function (enlace) {
        enlace.addEventListener('click', function (event) {
            console.log(enlace, "enlace")
            event.preventDefault();
            var id = enlace.id + '-content';

            contenidos.forEach(function (contenido) {
                contenido.style.display = (contenido.id == id) ? 'block' : 'none';
            });
        });
    });
});

