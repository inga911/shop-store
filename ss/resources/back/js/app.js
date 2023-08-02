import 'bootstrap';
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

if (document.querySelector('.--add--gallery')) {
    let galleryInput = 0;
    document.querySelector('.--add--gallery')
        .addEventListener('click', _ => {
            const input = document.querySelector('[data-gallery="0"]').cloneNode(true);
            galleryInput++;
            input.dataset.gallery = galleryInput;
            input.querySelector('input').setAttribute('name', 'gallery[]');
            input.querySelector('span')
                .addEventListener('click', e => {
                    e.target.closest('.mb-3').remove();
                });
            document.querySelector('.gallery-inputs').append(input);
        });
}