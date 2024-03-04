const button = document.getElementById('dropdown-button');
const drop = document.getElementById('dropdown');
button.addEventListener('click', function (){
    drop.classList.toggle('hidden');
    drop.classList.toggle('block')
});
