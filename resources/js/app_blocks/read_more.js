
var dots = document.querySelectorAll(".dots");
var moreText = document.querySelectorAll(".more");
var btnText = document.querySelectorAll(".myBtn");

for (var i = 0; i < dots.length; i++) {
    btnText[i].addEventListener('click', function(e) {
        var parentBlock = e.target.closest('.summary');

        if (parentBlock.querySelector('.dots').style.display === "none") {
            parentBlock.querySelector('.dots').style.display = "inline";
            parentBlock.querySelector('.myBtn').innerHTML = "Read more";
            parentBlock.querySelector('.more').style.display = "none";
        } else {
            parentBlock.querySelector('.dots').style.display = "none";
            parentBlock.querySelector('.myBtn').innerHTML = "Read less";
            parentBlock.querySelector('.more').style.display = "inline";
        }
    });
};
