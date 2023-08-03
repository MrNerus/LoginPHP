cards = ["Ace", 2, 3, 4, 5, 6, 7, 8, 9, 10, "Jack", "Queen", "King"];
suits = ["Spades", "Hearts", "Diamonds", "Clubs"];
Ask_For_Card();

function Ask_For_Card(){
    ran_card = cards[Math.floor(Math.random() * cards.length)];
    ran_suit = suits[Math.floor(Math.random() * suits.length)];
    document.getElementById("Generated").innerHTML = `${ran_card} of ${ran_suit}`;
}