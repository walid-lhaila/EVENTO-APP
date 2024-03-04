const clientForm = document.getElementById('clientForm');
const organisateurForm = document.getElementById('organisateurForm');

document.getElementById('client-btn').addEventListener('click', function () {
    clientForm.classList.remove('hidden');
    organisateurForm.classList.add('hidden');
});

document.getElementById('organisateur-btn').addEventListener('click', function () {
    clientForm.classList.add('hidden');
    organisateurForm.classList.remove('hidden');
});


