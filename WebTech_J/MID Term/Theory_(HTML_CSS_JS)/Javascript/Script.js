console.log("Hello World JS Connected");
let a=0.2; 
var b=0.4; 
let sum = (a*10+b*10)/10;
console.log(sum);
let string="Hello World";
let string2='Hello World';
console.log(string);
console.log(string2);
let text=string.length;
console.log(text);
//alert("Hello World");



function collect_data()
{
    let Username= document.getElementById("name").value;
    console.log(Username);
    let phonenumber=document.getElementById("phone").value;
    console.log(phonenumber);
    let UserDob=collect_DOB();
    
    return false;
}

function collect_DOB(){
    let Dob= document.getElementById("DOB").value;
    console.log(Dob);
    return false;
}
