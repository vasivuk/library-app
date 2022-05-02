const container = document.querySelector('.card-container');
let myLibrary = [];

const addBtn = document.querySelector('.add-btn');
const submit = document.querySelector('.submit');
const closeBtn = document.querySelector('.close');

const title = document.querySelector('#title');
const author = document.querySelector('#author');
const pages = document.querySelector('#pages');

const modal = document.getElementById('new-book-modal');
const addButton = document.querySelector('.add-btn');
addButton.addEventListener('click', () => {
    modal.style.display = 'block';
})

const cards = document.querySelectorAll('.card');
console.log(cards);
for (const card of cards) {
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


closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
    console.log("!!!");
})

// submit.addEventListener('click', () => {
//     let book = new Book(title.value, author.value, pages.value, false);
//     book.addBookToLibrary();
//     modal.style.display = 'none';
//     updateLibrary();

// })
// addBtn.addEventListener('click', addNewBook);

// function Book(title, author, pages, isRead){
//     this.title = title;
//     this.author = author;
//     this.pages = pages;
//     this.isRead = isRead;
//     this.info = function() {
//         let string =  `${title} by ${author}, ${pages} pages, `;
//         if(isRead === true) {
//             return string.concat("read.");
//         }
//         return string.concat("not read yet.");
//     }
// }

// Book.prototype.addBookToLibrary = function(){
//     myLibrary.push(this);
// }

// Book.prototype.toggleRead = function() {
//     return (this.isRead) ? false : true;
// }

// const addNewBook = function() {
//     console.log("yes");
// }

// function viewBooks(){
//     for (const book of myLibrary) {
//         const card = document.createElement('div');
//         card.classList.add('card');
//         randomColor(card);
//         if(book.isRead === true) {
//             card.classList.add('read');
//         }
//         card.dataset.index = myLibrary.indexOf(book);
//         const title = document.createElement('h1');
//         const author = document.createElement('p');
//         const pages = document.createElement('p');
//         author.innerText = book.author;
//         author.classList.add('author');
//         title.innerText = book.title;
//         pages.innerText = book.pages + " pages";
//         pages.classList.add('pages');
//         const removeBtn = document.createElement('button');
//         removeBtn.classList.add('remove-btn');
//         removeBtn.innerText = "x";

//         removeBtn.addEventListener('click', () => {
//             removeFromLibrary(card.dataset.index);
//             updateLibrary();
//         })

//         card.addEventListener('click', () => {
//             book.isRead = book.toggleRead();
//             if(book.isRead === true) {
//                 card.classList.add('read');
//             } else {
//                 card.classList.remove('read');
//             }
//         })

//         card.appendChild(removeBtn);
//         card.appendChild(author);
//         card.appendChild(title);
//         card.appendChild(pages);

//         container.appendChild(card);
//     }
// }

// viewBooks();

// function updateLibrary(){
//     container.innerHTML = "";
//     viewBooks();
// }

// function removeFromLibrary(index) {
//     myLibrary.splice(index, index+1);
// }

function randomColor(card) {
    let number = Math.floor(Math.random()*3)+1;
    switch(number) {
        case 1:
            card.classList.add('red');
            break;
        case 2:
            card.classList.add('green');
            break;
        case 3:
            card.classList.add('blue');
            break;
    }
}

function setBookColors(books) {

}