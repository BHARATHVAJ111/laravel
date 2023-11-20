
fetch('assets/students.json')
.then((value) => value.json())
.then((value1) =>OnLoaded(value1))
.catch((error)=>console.log(error));
				/*---------------onload func--------------*/
var OnLoaded = function(data) {
    console.log(data);
    sample = CustomList('card', {data : data});
};
