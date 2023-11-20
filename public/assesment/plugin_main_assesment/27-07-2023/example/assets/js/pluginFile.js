



(function(pWindow) {
	if(typeof pWindow.CustomList == "function") {
		throw new Error("CustomList function already defined");
	}

	/*===================== creating default values =============*/
    var mainArray=[];
	let CustomList= function(pId, options) {
		
		if(!(this instanceof CustomList)) {
			return new CustomList(pId, options);
		}
		this.domEl = document.getElementById(pId);
		if(!this.domEl) {
			throw new Error("dom not found");
		}
		this.options=options||{};
		if(typeof this.options.data == "undefined") {
			this.options.data = [];
		}
		mainArray.push(options.data.ProductCollection);
		subArray=mainArray.flat()
		
		// console.log(subArray[0].Name);
		this.displayList();
	};

	/*==================== creating new list ================*/

	CustomList.prototype.displayList = function(){
 	}
	pWindow.CustomList = CustomList;
})(window);
   
function search(){
	var inputval=$("#input").val()
    list(inputval)
    $(".display-none").css({"display":"block"})
}


function list(eval){
	var insertval=document.getElementById("insertVal")

	var nextDiv=document.createElement("div")
	nextDiv.classList.add("list-style")
	$(nextDiv).attr("id","listId")

	var nextDiv1=document.createElement("div")
    
	var show=`  
		<input type="text" oninput="valid($(this).val(),this)" class="ms-5 mt-4 text-center w-25 border rounded border-3" id="input">
		<h3 class="ms-5"> Welcome  <span id="spany">${eval}</span></h3>
	  `	
	  $(insertval).append(show)
	subArray.forEach((val,i)=>{
		var emp=""
    var insert=`
	<table>   
	<tr>
	  <td><input type="checkbox" onclick="check(${i})" ></td>
	  <td ><img src="${val.ProductPicUrl}" alt="" id="img" class="ms-3"></td>
	  <td class="">${val.Name}</td>
	</tr>
	</table>`
	 var button=`<div class="pt-4">
	 <button onclick="okBtn()" class="border rounded">Ok</button>
	 <button onclick="cancelBtn()"  class="border rounded">cancel</button>
	 </div>`
	 emp+=insert
	 nextDiv.innerHTML+=emp
	 nextDiv1.innerHTML=button
	$(insertval).append(nextDiv)
	$(insertval).append(nextDiv1)
	});

}
function cancelBtn(){
	$(".hide").hide(200)
}
function valid(v,ee){
	$(ee).parents("#insertVal").find("#listId").html('')
	var a = subArray.filter((e)=>{
		return e.Name.trim().toLowerCase().includes(v.trim().toLowerCase())
	})
	a.forEach((hh)=>{
		var app=`<table>   
		<tr>
		  <td><input type="checkbox"  ></td>
		  <td ><img src="${hh.ProductPicUrl}" alt="" id="img" class="ms-3"></td>
		  <td class="">${hh.Name}</td>
		</tr>
		</table>`
		$(ee).parents("#insertVal").find("#listId").append(app)
	})




}

var update=[]
function check(i){
	var bb=subArray.find((e,eb)=>{
		return i==eb
	})
	 update.push(bb)
	
}
function okBtn(){
	$(".hide").show(200)
	update.forEach((gg)=>{
		let cart=`<div ><img src="${gg.ProductPicUrl}" alt="" id="img" class="ms-3">
		<h3>${gg.Name}</h3></div>`
		$("#cart").append(cart)
	})
    update.splice(0,update.length)
}
