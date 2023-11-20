var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider) {
  $routeProvider

    .when("/", {
      templateUrl: "login.html",
      controller:"mylog",
    })
    .when('/signup',{
      templateUrl:"signup.html",
      controller:"myShow",
    })
    .when("/success",{
      templateUrl:"success.html",
    });
   
});

app.service("createservice",function(){
  this.emptyArray = [
        { id: 0, username: "bharath",password:123},
      ];

      this.data=[
      {movie:"vaaranam ayiram",time:"12:00 pm", avilable:2,price:200 },
      {movie:"love today",time:"1:30 pm", avilable:3,price:250 },
      {movie:"good night",time:"10:00 pm", avilable:5,price:200 },
    ]
    this.bevarage=[
    {items:"coke",Rate:70,quantity:0},
    {items:"waterbottle",Rate:25,quantity:0},
    {items:"icecream",Rate:40,quantity:0},]

    this.totalValue;
})
app.controller("mylog",function($scope,createservice,$location){

$scope.log=function(){
  $scope.loginpage=true;
  $scope.signuppage=false;
}
$scope.sign=function(){
  $scope.loginpage=false;
  $scope.signuppage=true;
}

$scope.loginBtn=function(){
  $scope.arr=createservice.emptyArray;
$scope.arr.forEach((val)=>{
if(val.username == $scope.loguser && val.password == $scope.logpwd){
$location.path("/signup")
}
else{
  $scope.error="invalid username or password"
}
})
}

$scope.signupBtn=function(){
$location.path("/signup")
}

})

app.controller("myShow",function($scope,createservice,$location,$timeout){

  $scope.array=createservice.data
  
  $scope.showBtn=function(){
    $scope.showTicket = true;
    $scope.bevargeShow = false;
    $scope.movieShow=true
  }
  $scope.bevargeBtn=function(){
    
  $scope.movieShow=false
   $scope.showTicket=false
    $scope.bevargeShow=true
    $scope.val=createservice.bevarage
  }


  
  $scope.movieShow=false
  $scope.clickLi=function(datas){
 $scope.movieShow=true

 
 $scope.value=datas

 $scope.movie=$scope.value.movie
 $scope.price=$scope.value.price
 

//  $scope.count1=false

// $scope.count=0
 
  }
  
  $scope.inpClick=function(){
    $scope.bever=createservice.bevarage
    var a=0;
    var b=0;
   for(i=0;i<$scope.bever.length;i++){
     a=$scope.bever[i].quantity*$scope.bever[i].Rate
    
     b=b+a
     
   }
   $scope.val1=b
   createservice.totalValue=$scope.val1
   
  }

  $scope.counter=function(a){
    $scope.aa=createservice.data
    var bb=$scope.aa
  
 for(i=0;i<bb.length;i++){
    if($scope.value.movie == bb[i].movie ) {
      if($scope.count < bb[i].avilable){
        $scope.count1=false
        $scope.span=false
      }
      else{
        $scope.span=true
        $scope.count1=true
        $scope.error="Tickets not available"
      }
    }
 }
    
  }
  $scope.payBtn=function(){
    $location.path("/success")
    $timeout(function(){
      $location.path("/signup")
  },2000)
  }
})






