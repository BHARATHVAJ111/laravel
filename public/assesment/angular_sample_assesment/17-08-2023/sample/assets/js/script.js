
var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider) {
  $routeProvider

    .when("/", {
      templateUrl: "login.html",
      controller: "myLog",
    })
    .when("/signup", {
      templateUrl: "signup.html",
      controller: "mySign",
    })
    .when("/transfer", {
      templateUrl: "transfer.html",
      controller: "myCtrl",
    })
    .when("/success", {
      templateUrl: "success.html",

    });
});



app.service("createService", function () {
  this.emptyArray = [
    { id: 0, username: "Nedu", Accountno: "12121232", upiPwd:"90",Amount:"50000"},
  ];
  this.id=1;
  this.sendname;
  this.values;

});

app.controller("mySign", function ($scope, createService, $route) {
  $scope.create = function () {
    createService.emptyArray.push({
      id:createService.id++,
      username: $scope.userName,
      Accountno: $scope.actNo,
      Amount:$scope.amt,
      upiPwd: $scope.qq,
    });
    $scope.arr = createService.emptyArray;
    console.log($scope.arr);
    $route.reload();
  };
  function generatePassword() {
    var length = 6,
      Number = "01234567",
      returnVal = "";
    for (var i = 0, n = Number.length; i < length; ++i) {
      returnVal += Number.charAt(Math.floor(Math.random() * n));
    }
    return returnVal;
  }

  $scope.qq = generatePassword();
});

app.controller("myLog", function ($scope, createService, $location) {
  $scope.loginBtn = function () {
    console.log(createService.emptyArray);
    $scope.array = createService.emptyArray;
    $scope.array.forEach((val,i) => {
      // console.log(val);
      if (val.username == $scope.loguser && val.upiPwd == $scope.logupi) {
        console.log((createService.sendname = $scope.loguser));
        createService.values=i;
        console.log(createService.values);
        $location.path("/transfer");
      } else {
        $scope.error = "invalid username or upi";
      }
    });
  };
});


app.controller("myCtrl", function ($scope, createService,$timeout,$location) {
  $scope.name = createService.sendname;

  $scope.frndBtn=function(){
   $scope.Emp = createService.emptyArray
  }

var addfrnds=[];
$scope.addBtn=function(id){
  console.log(id);
$scope.get=createService.emptyArray
var aa=$scope.get.filter((value)=>{
 return value.id == id
})

$scope.show=aa
addfrnds.push(aa)
$scope.showFrnds=addfrnds.flat()



}

$scope.display=function(id){
$scope.Tname=id.username
$scope.Taccno=id.Accountno
console.log(id);
$scope.cash=createService.emptyArray
}


  $scope.transfer = function(){
    $location.path("/success")
 $timeout(function(){
  $location.path("/transfer")
 },3000)

  }
});
