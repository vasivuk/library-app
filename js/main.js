// var script = document.createElement("script");
// script.type = "text/javascript";
// script.async = true;
// script.src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js";
// document.getElementsByTagName("head")[0].appendChild(script);

const cards = $(".card");

for (const card of cards) {
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
