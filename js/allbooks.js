let booksToAdd = [];

const addLibraryBtn = document.querySelector('.add-library-btn');
const closeBtn = document.querySelector('.close');
const addButton = document.querySelector('.add-btn');
addButton.addEventListener('click', () => {
    modal.style.display = 'block';
})

addLibraryBtn.addEventListener('click', () => {
    $.ajax({
        url:'handler/addBooks.php',
        type:'post',
        data: {booksToAdd : JSON.stringify(booksToAdd)},
        success:function(response){
            document.location.reload();
        }
    })
})

closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
})

for (const card of cards) {
    if(!card.classList.contains("faded")) {
        card.addEventListener('click', () => {
            if(!card.classList.contains("selected")) {
                card.classList.add("selected");
                addToList(card);
            } else {
                card.classList.remove("selected");
                removeFromList(card);
            }
        })
    }

}

function addToList(book) {
    booksToAdd.push(book.dataset.index);
}

function removeFromList(book) {
    if(booksToAdd.includes(book.dataset.index)) {
        booksToAdd.splice(booksToAdd.indexOf(book.dataset.index), 1);
    }
}
