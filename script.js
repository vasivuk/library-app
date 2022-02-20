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

closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
})

submit.addEventListener('click', () => {
    let book = new Book(title.value, author.value, pages.value, false);
    book.addBookToLibrary();
    modal.style.display = 'none';
    updateLibrary();

})
// addBtn.addEventListener('click', addNewBook);

function Book(title, author, pages, isRead){
    this.title = title;
    this.author = author;
    this.pages = pages;
    this.isRead = isRead;
    this.info = function() {
        let string =  `${title} by ${author}, ${pages} pages, `;
        if(isRead === true) {
            return string.concat("read.");
        }
        return string.concat("not read yet.");
    }
}

Book.prototype.addBookToLibrary = function(){
    myLibrary.push(this);
}

const addNewBook = function() {
    console.log("yes");
}

const book1 = new Book('Harry Potter', 'J. K. Rowlings', 500, false)
const book2 = new Book('Dune', 'Frank Herbert', 412, false);
const book3 = new Book('Eragon', 'Christopher Paolini', 544, true);

book1.addBookToLibrary();
book2.addBookToLibrary();
book3.addBookToLibrary();

function viewBooks(){
    for (const book of myLibrary) {
        const card = document.createElement('div');
        card.classList.add('card');
        card.dataset.index = myLibrary.indexOf(book);
        const title = document.createElement('h1');
        const author = document.createElement('p');
        const pages = document.createElement('p');
        author.innerText = book.author;
        author.classList.add('author');
        title.innerText = book.title;
        pages.innerText = book.pages + " pages";
        pages.classList.add('pages');
        const removeBtn = document.createElement('button');
        removeBtn.classList.add('remove-btn');
        removeBtn.innerText = "x";

        removeBtn.addEventListener('click', () => {
            removeFromLibrary(card.dataset.index);
            updateLibrary();
        })

        card.appendChild(removeBtn);
        card.appendChild(author);
        card.appendChild(title);
        card.appendChild(pages);

        container.appendChild(card);
    }
}

viewBooks();

function updateLibrary(){
    container.innerHTML = "";
    viewBooks();
}

function removeFromLibrary(index) {
    myLibrary.splice(index, index+1);
}