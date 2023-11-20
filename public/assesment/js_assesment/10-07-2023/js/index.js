var generateButton = document.querySelector("#GenBtn"); //Generate button
var head = document.querySelector("h1"); //<h1>tag
var addBtn2 = document.querySelector("#addBtn2"); //Add button
var removeBtn2 = document.querySelector("#removeBtn2"); //remove button
var addBtn1 = document.querySelector(".addBtn1"); //Add button
var removeBtn1 = document.querySelector(".removeBtn1"); //Remove button
var ul = document.querySelector("ul"); //unOrdered list (create a li)
var copyBtn = document.querySelector(".start"); //copy button
var moveBtn = document.querySelector("#move"); //move button
var colorGen = rgb();
var Value = colorGen.textRGB;
// create an embty array
arr = [];
emptyArray = [];
//generate color button
generateButton.addEventListener("click", function () {
  colorGen = rgb();
  color = colorGen.rgb;
  Value = colorGen.text;
  //generate random color
  head.style.background = color;
  var red = colorGen.red;
  var green = colorGen.green;
  var blue = colorGen.blue;
  // console.log(red, green, blue);
  //object
  var object2 = { RED: red, GREEN: green, BLUE: blue };
  emptyArray.push(object2);
  console.log(emptyArray);
});
//functions
function rgb() {
  var r = Math.floor(Math.random() * 256);
  var g = Math.floor(Math.random() * 256);
  var b = Math.floor(Math.random() * 256);
  var object1 = {
    red: r,
    green: g,
    blue: b,
    rgb: "rgb(" + r + "," + g + "," + b + ")",
    text: `red:${r},green:${g},blue:${b}`,
  };
  return object1;
}
  
//shift and unshift

//button click event
addBtn1.addEventListener("click", function () {
  arr.unshift(Value);
  listAdd();
});
//remove btn
removeBtn1.addEventListener("click", function () {
  arr.shift();
  ul.removeChild(ul.firstElementChild);
});
//add btn
addBtn2.addEventListener("click", function () {
  arr.push(Value);
  // listAddbtm( Value);
  listAdd();
});
//remove btn
removeBtn2.addEventListener("click", function () {
  arr.pop();
  ul.removeChild(ul.lastElementChild);
});

//using addEvent function
copyBtn.addEventListener("click", function () {
  //select the elements
  //first input box
  var input1Btn = document.querySelector(".input1").value;
  //second input box
  var input2Btn = document.querySelector(".input2").value;
  //ul
  var list1 = document.querySelector("#list1");
  var copy1 = arr.splice(input1Btn, input2Btn);
  var list = document.createElement("li");
  list.innerHTML = copy1;
  list1.appendChild(list);
});
//button click event
moveBtn.addEventListener("click", function () {
  //select the elements
  //third input box
  var input3 = document.querySelector(".input3").value;
  //fourth input box
  var input4 = document.querySelector(".input4").value;
  //ul
  var list2 = document.querySelector("#list2");
  var lis = document.createElement("li");
  var move1 = arr.splice(input3, input4);
  lis.innerHTML = move1;
  list2.prepend(lis);
  listAdd();
});

//sort function
var redBtn = document.querySelector(".redBtn"); //red sort button
var greenBtn = document.querySelector(".greenBtn"); //green sort button
var blueBtn = document.querySelector(".blueBtn"); //blue sort button
//red button click event(sort)
redBtn.addEventListener("click", function () {
  var red2 = emptyArray.sort(function (a, b) {
    return a.RED - b.RED;
  });
  for (i = 0; i < red2.length; i++) {
    ul.removeChild(ul.lastElementChild);
  }
  red2.forEach((eve) => {
    var list = document.createElement("li");
    list.innerHTML = JSON.stringify(eve);
    ul.appendChild(list);
  });
});

//green button click event(sort)
greenBtn.addEventListener("click", function () {
  var green2 = emptyArray.sort(function (a, b) {
    return a.GREEN - b.GREEN;
  });
  for (i = 0; i < green2.length; i++) {
    ul.removeChild(ul.lastElementChild);
  }
  green2.forEach((eve) => {
    var list = document.createElement("li");
    list.innerHTML = JSON.stringify(eve);
    ul.appendChild(list);
  });
});
//blue button click event(sort)
blueBtn.addEventListener("click", function () {
  var blue2 = emptyArray.sort(function (a, b) {
    return a.BLUE - b.BLUE;
  });
  for (i = 0; i < blue2.length; i++) {
    ul.removeChild(ul.lastElementChild);
  }
  blue2.forEach((eve) => {
    var list = document.createElement("li");
    list.innerHTML = JSON.stringify(eve);
    ul.appendChild(list);
  });
});
