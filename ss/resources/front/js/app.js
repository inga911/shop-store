import 'bootstrap';
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

//CART
document.querySelectorAll('.--add--to--cart').forEach(section => {
    section.querySelector('button').addEventListener('click', _ => {
        const data = {};
        section.querySelectorAll('input').forEach(input => {
            data[input.getAttribute('name')] = input.value;
        });
console.log(data);
        axios.put(section.dataset.url, data)
            .then(res => {
                document.querySelector('.--count').innerText = res.data.count;
                document.querySelector('.--total').innerText = res.data.total.toFixed(2);
                console.log(res.data);
            });
    });
});

if (document.querySelector('.--top--cart')) {
    window.addEventListener('load', _ => {
        const url = document.querySelector('.--top--cart').dataset.url;
        axios.get(url)
            .then(res => {
                document.querySelector('.--count').innerText = res.data.count;
                document.querySelector('.--total').innerText = res.data.total.toFixed(2);
                document.querySelector('.--cart-info').style.opacity = 1;
            })
    })
}


//VOTE
document.querySelectorAll('.stars input')
    .forEach(i => {
        i.addEventListener('change', _ => {
            const star = i.dataset.star;
            const isChecking = i.checked;

            if (isChecking) {
                i.closest('.stars').querySelectorAll('input')
                    .forEach(s => s.dataset.star <= star ? s.checked = true : s.checked = false);
            } else {
                i.closest('.stars').querySelectorAll('input')
                    .forEach(s => s.dataset.star >= star ? s.checked = false : s.checked = true);
            }
            i.closest('.stars').querySelectorAll('label')
                .forEach(l => l.classList.remove('half'));
        });
    });