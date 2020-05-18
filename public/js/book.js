

function updateFavorite(book,love) {
    
    $.ajax({
        type: "GEt",
        url: "/fav",
        data: {
            book: book
        },
        success: function(response) {
            console.log(response);
            if (response.like == "yes") {
                console.log(love);
                love.style.color = "red";
            } else {
                console.log(love.className);
                love.style.color = "black";
            }
        },
        error: function(response) {
           
            alert(response);
        }
    });
}

