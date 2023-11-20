var input1 = document.querySelector(".input1");
var input2 = document.querySelector(".input2");
var plus = document.querySelector("#plus");
var refresh = document.querySelector("#refresh");
var search = document.querySelector("#search");
var check = document.querySelector("#check");
var erase = document.querySelector("#erase");
var ul = document.querySelector("ul");
var deleteBtn = document.querySelector("#deleteBtn");
var none = document.querySelector("#none");
var block = document.querySelector("#block");
var array = [];
plus.addEventListener("click", function () {
  input1.focus();
});
refresh.addEventListener("click", function () {
  location.reload();
});
search.addEventListener("click", function () {
  block.style.width = "700px";
  none.style.display = "none";
  block.style.display = "block";
});

check.addEventListener("click", function () {
  if (input1.value == "" || input2.value == "") {
    alert("you are not enter task or date");
  } else {
    array.push({ value1: input1.value, value2: input2.value });
    listAdd();
    filter();
  } 
});
function listAdd() {
  var Empty = "";
  array.forEach((e, i) => {
   
    var lis = `<div class="style" onclick="clickFunction(${i})"> <li >${e.value1}</li><li>${e.value2}</li> 

    <svg onclick="myFunction(this)" xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
      <path onclick="editfunction(${i})" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
      </svg>
   
      <svg onclick="deleteFunction(${i})" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
       <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
       <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
       </svg>
      
    </div>
    <br>`;
    Empty += lis;
    ul.innerHTML = Empty;
    return Empty;
  });
}
emptyArray = [];
function clickFunction(id) {
  console.log(id);
  var greeting1 = array[id].value1;
  var greeting2 = array[id].value2;
  var greeting = greeting1 + '\xa0\xa0\xa0\xa0\xa0\xa0\xa0' + greeting2;
  emptyArray.push(greeting);

  const para = document.createElement("li");
  para.innerText = greeting;
  var complete=document.getElementById("completed").appendChild(para);
  complete.classList.add("mystyle");

  console.log(emptyArray.length);
  console.log(emptyArray);
  var length = emptyArray.length;
  if (length <= 2) {
    score = "25%";
  

  } else if (length <= 5) {
    score = "50%";
   

  } else if(length <=7) {
    score = "75%";
   
  }else{
    score = "100%";
   
  }
  document.getElementById("progress").innerText = score;
}

var Emp1
var Emp2
function filter() {
  Emp1 = document.querySelector("#old");
  // Emp1.classList.add("mystyle");
  Emp1.classList.add("mystyle");
  Emp2 = array.filter((data) => {
    return (data.value2 !== '2023-07-13');
  })
  compare()
}
function compare() {
  var Emp3 = "";
  Emp2.forEach((arg) => {
    var lis = `<li>${arg.value1},${arg.value2}</li>`
    Emp3 += lis
    Emp1.innerHTML = Emp3
  });
}

function deleteFunction(i) {
  array.splice(i, 1);
  listAdd();
}



function myFunction() {
  var text = prompt("Enter new text:");
  var Date = prompt("Enter new text:");
  input1.innerHTML = text;
  input2.innerHTML = Date;
}



