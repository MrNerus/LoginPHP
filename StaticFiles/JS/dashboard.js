// cards = ["Ace", 2, 3, 4, 5, 6, 7, 8, 9, 10, "Jack", "Queen", "King"];
// suits = ["Spades", "Hearts", "Diamonds", "Clubs"];
// // Ask_For_Card();

// function Ask_For_Card(){
//     ran_card = cards[Math.floor(Math.random() * cards.length)];
//     ran_suit = suits[Math.floor(Math.random() * suits.length)];
//     document.getElementById("Generated").innerHTML = `${ran_card} of ${ran_suit}`;
// }


function linearSearch() {
    // Declare variables
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    table = document.getElementById("productTable");
    rows = table.getElementsByTagName('tr');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 1; i < rows.length; i++) {
        row = rows[i].getElementsByTagName("td")[1];
        rowContent = row.textContent || as.innerText;
        if (rowContent.toUpperCase().indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}