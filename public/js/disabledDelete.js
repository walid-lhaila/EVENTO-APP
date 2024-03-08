const deleteBtn = document.getElementById('deleteBtn');
const deleteMessage = document.getElementById('deleteMessage');

deleteBtn.addEventListener('click', function() {
    deleteMessage.classList.remove('hidden');

    // Hide the message after 2 seconds (2000 milliseconds)
    setTimeout(function() {
        deleteMessage.classList.add('hidden');
    }, 2000);
});
