
const notify = document.getElementById('notify');
const btnNotify = document.getElementById('btnNotify');

btnNotify.addEventListener('click', function(){
    notify.classList.toggle('scale-100');
    notify.classList.toggle('scale-0');
});
