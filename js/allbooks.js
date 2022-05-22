let booksToAdd = [];

const addLibraryBtn = document.querySelector(".add-library-btn");
const closeBtn = document.querySelector(".close");
const addButton = document.querySelector(".add-btn");
const modal = document.querySelector(".new-book-modal");

const search = document.querySelector(".search");

const cardContainer = document.querySelector(".card-container");

search.addEventListener("keyup", () => {
  $.get("handler/getBooksFiltered.php", { filter: search.value }, (data) => {
    cardContainer.innerHTML = data;
    for (const card of cardContainer.children) {
      if (card.dataset.user == 1) {
        card.classList.add("faded");
      }
      switch (card.dataset.index % 5) {
        case 0:
          card.classList.add("red");
          break;
        case 1:
          card.classList.add("blue");
          break;
        case 2:
          card.classList.add("green");
          break;
        case 3:
          card.classList.add("brown");
          break;
        case 4:
          card.classList.add("black");
          break;
      }
    }
    for (const card of cardContainer.children) {
      if (!card.classList.contains("faded")) {
        card.addEventListener("click", () => {
          if (!card.classList.contains("selected")) {
            card.classList.add("selected");
            console.log(card);
            addToList(card);
          } else {
            card.classList.remove("selected");
            removeFromList(card);
          }
        });
      }
    }
  });
});

$(".add-btn").on("click", () => {
  modal.style.display = "block";
});

addLibraryBtn.addEventListener("click", () => {
  $.ajax({
    url: "handler/addBooks.php",
    type: "post",
    data: { booksToAdd: JSON.stringify(booksToAdd) },
    success: function (response) {
      document.location.reload();
    },
  });
});

closeBtn.addEventListener("click", () => {
  modal.style.display = "none";
});

for (const card of cards) {
  if (!card.classList.contains("faded")) {
    card.addEventListener("click", () => {
      if (!card.classList.contains("selected")) {
        card.classList.add("selected");
        addToList(card);
      } else {
        card.classList.remove("selected");
        removeFromList(card);
      }
    });
  }
}

function addToList(book) {
  booksToAdd.push(book.dataset.index);
}

function removeFromList(book) {
  if (booksToAdd.includes(book.dataset.index)) {
    booksToAdd.splice(booksToAdd.indexOf(book.dataset.index), 1);
  }
}
