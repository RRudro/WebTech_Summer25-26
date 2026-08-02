console.log("Connected");
// alert("Hello");
let a=0.02;
var b=0.01;
//let sum = a+b;
let sum = (a*100+b*100)/100;
console.log(sum);
let string = "Hello World Web Tech";
let string2 ='Hello World Web Tech';
var text = string2.length;
console.log("Length of String:" +text);
let name = "AIUB";
name = "BUET";
console.log(name);

function collect_data()
{
    let Pname = document.getElementById("PatientName").value;
    console.log(Pname); 

    let PAge= document.getElementById("PatientAge").value;
    console.log(PAge);

    let isvalidDOB= collect_DOB();

    return false;
}

function collect_DOB()
{
    
    let DOB = document.getElementById("DOB").value;
    console.log(DOB);
    return false; 
}