(function (pWindow) {
  // if(typeof pWindow.CustomList == "function") {
  // 	throw new Error("CustomList function already defined");
  // }

  /*===================== creating default values =============*/
  const mainArray = [];
  let CustomList = function (p,options) {
    if (!(this instanceof CustomList)) {
      return new CustomList(p, options);
    }
    this.domEl = document.getElementById(p);
    if (!this.domEl) {
      throw new Error("dom not found");
    }
    this.options = options || {};
    if (typeof this.options.data == "undefined") {
      this.options.data = [];
    }
    mainArray.push(options.data.students);
    subArray = mainArray.flat();
    
  
    CustomList.prototype.displayList()
    this.displayList();
  };



  /*==================== creating new list ================*/

  CustomList.prototype.displayList = function () {
   valid()
  };
  

  pWindow.CustomList = CustomList;
})(window);

function valid(){
  var ff=''
  var card=document.getElementById("card")
  subArray.forEach((val) => {
    var insert =`<div class="card text-center m-2 card-style shadow" onclick="show(${val.id})" style="width: 18rem;">
    <img src="${val.img}" class="card-img-top rounded-circle ms-4" alt="...">
    <div class="card-body">
      <h5 class="card-title" id="Text">${val.name}</h5>
    </div>
  </div>`
   ff+=insert
   card.innerHTML=ff	   
  });
}

function search(){
  
  var inputVal=$("#search").val()
  if(inputVal ==''){
    valid()
  }else{
  var a = subArray.filter(
          (val) => val.name.toLowerCase() === inputVal.toLowerCase()
        );
      a.forEach((ff)=>{
       var card=$("#card")
       var insertVal =`<div class="card text-center" id="click" onclick="show(${ff.id})" style="width: 18rem;">
       <img src="${ff.img}" class="card-img-top rounded-circle ms-4" alt="...">
       <div class="card-body">
         <h5 class="card-title" id="Text">${ff.name}</h5>
       </div>
     </div>`
       $(card).html(insertVal)
      });
    }
}
function show(ee){
    var a=subArray.filter(val=>Number(val.id) === ee);

  a.forEach((aa)=>{
    $("#input1").val(aa.name)
    $("#input2").val(aa.id)
    $("#input3").val(aa.m1)
    $("#input4").val(aa.m2)
    $("#input5").val(aa.m3)
    $("#input6").val(aa.m4)
    $("#input7").val(aa.m5)
 
  });
  input()
 }
 function input(){
  let mark=document.querySelectorAll(".m")
  mark.forEach((g)=>{
  if(g.value < 35){
  $(g).css({"background":"gray","color":"white"})
  }else if(g.value >35){
  $(g).css({"background":"white","color":"black"})
  }
  })
}

$("#editBtn").click(()=>{
  $("#input1").removeAttr("disabled")
  // $("#input2").removeAttr("disabled")
  $("#input3").removeAttr("disabled")
  $("#input4").removeAttr("disabled")
  $("#input5").removeAttr("disabled")
  $("#input6").removeAttr("disabled")
  $("#input7").removeAttr("disabled")
  
});

function save(){
  var inp1=$("#input1").val()
  var inp2= $("#input2").val()
  var inp3=$("#input3").val()
  var inp4=$("#input4").val()
  var inp5=$("#input5").val()
  var inp6=$("#input6").val()
  var inp7=$("#input7").val()
   subArray.map((value)=>{
     if(value.id == inp2){
      value.name=inp1;
      value.id=inp2;
      value.m1=inp3;
      value.m2=inp4;
      value.m3=inp5;
      value.m4=inp6;
      value.m5=inp7;
     }
    
    }); 
    valid()
  }


 


