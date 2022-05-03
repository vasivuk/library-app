var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.6.0.min.js';
document.getElementsByTagName('head')[0].appendChild(script);

const cards = document.querySelectorAll('.card');
for (const card of cards) {
    if(card.dataset.user == 1) {
        card.classList.add('faded')
    }
    switch(card.dataset.index%5) {
        case 0:
            card.classList.add('red');
            break;
        case 1:
            card.classList.add('blue');
            break;
        case 2:
            card.classList.add('green');
            break;
        case 3:
            card.classList.add('brown')
            break;
        case 4:
            card.classList.add('black');
            break;
    }
}