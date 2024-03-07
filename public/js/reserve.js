document.addEventListener('DOMContentLoaded', () => {
    const btns = document.querySelectorAll('[id^="btn"]');
    const forms = document.querySelectorAll('[id^="form"]');
    const closeForms = document.querySelectorAll('[id^="closeForm"]');

    btns.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            forms[index].classList.add("scale-100");
            forms[index].classList.remove("scale-0");
        });

        closeForms[index].addEventListener('click', () => {
            forms[index].classList.remove("scale-100");
            forms[index].classList.add("scale-0");
        });
    });
});
