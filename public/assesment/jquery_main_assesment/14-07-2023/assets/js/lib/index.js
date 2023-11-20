var Data=[{
    id:1,
    img:"./assets/images/cd drive.jfif",
   productName:"cd drive",
    price:2000
},
{
    id:2,
    img:"./assets/images/cpu.jfif",
    productName:"cpu",
    price:2000
},
{
    id:3,
    img:"./assets/images/headphone.jfif",
    productName:"Headphone",
    price:2000
},
{
    id:4,
    img:"./assets/images/keyboard1.jfif",
    productName:"Keyboard",
    price:2000
},
{
    id:5,
    img:"./assets/images/mobile images.jfif",
    productName:"Android Mobile",
    price:2000
},
{
    id:6,
    img:"./assets/images/monitor1.jfif",
    productName:"Monitor",
    price:2000
},
{
    id:7,
    img:"./assets/images/mouse1.jfif",
    productName:"Mouse",
    price:2000
},
{
    id:8,
    img:"./assets/images/pendrive.jfif",
    productName:"Pendrive",
    price:2000
},
{
    id:9,
    img:"./assets/images/tab.jfif",
    productName:"Tab",
    price:2000
},
{
    id:10,
    img:"./assets/images/watch.jfif",
    productName:"Watch",
    price:2000
}];

var gotocard=[];
var cardBtn=$(".btn-info");
var balance=100000;
var balanceCard=$(".balance");
var getValue;
var pay=$(".show")



var product;
Data.forEach((ev,i)=>{

    product=$(".productList");
    let cards=`
    <div class="">
    <div class="cards">
    <img class="" src="${ev.img}" alt="card image cap>"
    <div class="">
    <h4 class="">${ev.productName}</h4>
    <h3 class=" priceRS${i}">RS:${ev.price}</h3>
    <input type="number" class="item${i}" onchange="change(${i})">
    <button class="btn btn-secontary" onclick="cards(${ev.id})">Add to card</button>
    </div>
    </div>
    </div>`
    product.append(cards);
})


cardBtn.on("click",()=>{
    pay.show(1000)
    product.hide()
    display()
    balanceCard.html("current amount:"+balance)
})

function cards(i){
    let gp=Data.filter((f)=>{
        return f.id==i
    })
    orders(gp)
}

function orders(gp){
    gp.forEach((rr)=>{
        gotocard.push(rr)
    })
}

function delet(i){
 gotocard.splice(i,1)
 display()
}

function display(){
    let rr=""
    gotocard.forEach((ev,i)=>{
        let orderss=$(".orderss");
        let listCard=`<div class=""><div class="card"><img class="card-img-top${ev.img}">
        <h4 class="card-title">${ev.productName}</h4>
        <h3 class="card-title">RS:${ev.price}</h3>
        <button class="btn btn-danger" onclick="delet(${i})">delete</button>
        <div>
        <div>
        <div>`

        rr+=listCard
        orderss.html(rr)
        
    })
}

function changes(i){
    let rs=$(`.priceRS${i}`)
    getValue=$(`.item${i}`).val()
    let pr=Data[i].price
    let total=pr*getValue
    Data[i].price=total
    rs.html(total)
}

