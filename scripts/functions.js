const menuButton = document.querySelector('.js-menu-button');
const menu = document.querySelector('.js-menu')


menuButton.addEventListener('click', function(){
    if (menu.classList.contains('hidden')){
        menu.classList.remove('hidden');
    }else{
        menu.classList.add('hidden');
    }
});