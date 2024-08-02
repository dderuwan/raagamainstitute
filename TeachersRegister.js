function toggleFormFields(showSecondForm) {
    var formFirst = document.getElementById('formFirst');
    var formSecond = document.getElementById('formSecond');

    if (showSecondForm) {
        formFirst.style.display = 'none';
        formSecond.style.display = 'block';
    } else {
        formFirst.style.display = 'block';
        formSecond.style.display = 'none';
    }
}
document.addEventListener('DOMContentLoaded', function() {
    var backButton = document.getElementById('backButton');
    if (backButton) {
        backButton.addEventListener('click', function() {
            toggleFormFields(false);
        });
    }
});
