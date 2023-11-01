const form = document.getElementById('form');
const accept = document.getElementById('accept');
const accept_div = document.getElementById('accept-section');
const error_element = document.getElementById('error');


form.addEventListener('submit', (e) => {
    let message = [];

    form.querySelectorAll('input').forEach(input => {
        const label = input.getAttribute('data-label');
        if (input.value === '' || input.value == null) {
            input.classList.add('border-2', 'border-red-500');
            message.push(label);
        } else {
            input.classList.remove('border-2', 'border-red-500');
        }
    });

    form.querySelectorAll('select').forEach(select => {
        const label = select.getAttribute('data-label');
        if (select.value === '' || select.value == null) {
            select.classList.add('border-2', 'border-red-500');
            message.push(label);
        } else {
            select.classList.remove('border-2', 'border-red-500');
        }
    });

    // accept
    if (accept.checked == false) {
        accept_div.classList.add('border-2', 'border-red-500', 'bg-red-300');
        message.push('\nกรุณายอมรับเงื่อนไข');
    } else {
        accept_div.classList.remove('border-2', 'border-red-500', 'bg-red-300');
    }

    if (message.length > 0) {
        e.preventDefault();
        window.scrollTo(0, 0);
        error_element.classList.remove('hidden');
        error_element.innerText = 'กรุณากรอก ' + message.join(', ');
    }
});