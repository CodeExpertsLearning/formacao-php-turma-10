//TO-DO: selecionar o elemento link com a classe navbar-link...
let linkNavbar = document.querySelectorAll('a.navbar-link');


//TO-DO: adicionar evento de click...
linkNavbar.forEach(function(link){

    link.addEventListener('click', function () {
        alert('OK');
    });
});

