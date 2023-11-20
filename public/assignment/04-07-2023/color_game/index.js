// var colors = [
//     "rgb(255, 0, 0)",
//     "rgb(255, 255, 0)",
//     "rgb(0, 255, 255)",
//     "rgb(255, 0, 255)",
//     "rgb(0, 255, 0)",
//     "rgb(0, 0, 255)"
//     // select the elements

// ]
// pickColor=colors[3];
// var correctDisplay = document.querySelector("#correctDisplay")
var numSquare=6;
var colors = pickRandomColor(numSquare);
var display = document.querySelector("#display");
var pickedColor = getChange();
display.textContent = pickedColor;
var msgDisplay = document.querySelector("#msgDisplay");
var h1 = document.querySelector("h1");
var resetButton = document.querySelector("#resetButton");
var Easy = document.querySelector("#Easy");
Easy.addEventListener("click", function () {
    colors = pickRandomColor(3);
    pickedColor = getChange();
    display.textContent = pickedColor;
    for (var i = 0; i < square.length; i++) {
        if (colors[i]) {
            square[i].style.background = colors[i]
        }
        else {
            square[i].style.display = "none";
        }
    }

});
var Hard = document.querySelector("#Hard");
Hard.addEventListener("click", function () {
    numSquare=3;
    colors = pickRandomColor(numSquare);
    pickedColor = getChange();
    display.textContent = pickedColor;
    for (var i = 0; i < square.length; i++) {
        if (colors[i]) {
            square[i].style.background = colors[i]
        }
        else {
            square[i].style.display = "block";
        }
    }



});
resetButton.addEventListener("click", function () {
    colors = pickRandomColor(numSquare);
    pickedColor = getChange();
    display.textContent = pickedColor;
    for (var i = 0; i < square.length; i++) {
        square[i].style.background = colors[i]
    }
    h1.style.background = "black";
});
let square = document.querySelectorAll(".square")
for (var i = 0; i < square.length; i++) {
    square[i].style.background = colors[i]
    square[i].addEventListener("click", function () {
        var clickedColor = this.style.background;
        console.log(clickedColor, pickedColor);

        if (clickedColor === pickedColor) {
            // alert("correct");
            msgDisplay.textContent = "Correct!"
            resetButton.textContent = "Play Again!"
            change(clickedColor);
            h1.style.background = clickedColor;
        }
        else {
            // alert("wrong");
            this.style.background = "black";
            msgDisplay.textContent = "Try Again!"
        }
    });
}
function change(colors) {
    for (i = 0; i < square.length; i++) {
        square[i].style.background = colors;
    }
}
function getChange() {
    var random = Math.floor(Math.random() * colors.length)
    return colors[random];
}
function pickRandomColor(num) {
    //create an empty array
    var arr = []
    //create random color function
    for (i = 0; i < num; i++) {
        arr.push(rgb());
    }
    // return the value
    return arr;
}
function rgb() {
    var r = Math.floor(Math.random() * 256);
    var g = Math.floor(Math.random() * 256);
    var b = Math.floor(Math.random() * 256);
    return "rgb(" + r + "," + " " + g + "," + " " + b + ")";
}