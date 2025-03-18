// Seleciona o botão de menu e o menu de navegação
const menuToggle = document.querySelector('.menu-toggle');
const navMenu = document.querySelector('.nav-links');  // Corrigido: O nome da classe é 'nav-links'

// Adiciona um evento de clique ao botão de menu
menuToggle.addEventListener('click', function () {
    // Alterna a classe 'show' no menu de navegação
    navMenu.classList.toggle('show');  // 'active' foi substituído por 'show', conforme seu código CSS

    // Alterna o ícone do botão de menu (hamburger para X e vice-versa)
    menuToggle.classList.toggle('active');
});

// Fecha o menu ao clicar em um link do menu (opcional)
const navLinks = document.querySelectorAll('.nav-links li a');  // Corrigido: A classe correta é 'nav-links'
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        if (navMenu.classList.contains('show')) {  // 'active' foi substituído por 'show'
            navMenu.classList.remove('show');  // Remove a classe 'show' para esconder o menu
            menuToggle.classList.remove('active');  // Remove o ícone 'X'
        }
    });
});

// Fecha o menu ao clicar fora dele (opcional)
document.addEventListener('click', function (event) {
    const isClickInsideMenu = navMenu.contains(event.target);
    const isClickOnToggle = menuToggle.contains(event.target);

    if (!isClickInsideMenu && !isClickOnToggle && navMenu.classList.contains('show')) {  // 'active' foi substituído por 'show'
        navMenu.classList.remove('show');
        menuToggle.classList.remove('active');
    }
});
