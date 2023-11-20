
document.addEventListener('DOMContentLoaded', function () {
    var messageElement = document.querySelector('.update-message');
    if (messageElement) {
        setTimeout(function () {
            messageElement.style.display = 'none';
        }, 3000);
    }

    document.getElementById('close-message').addEventListener('click', function () {
        messageElement.style.display = 'none';
    });
});
