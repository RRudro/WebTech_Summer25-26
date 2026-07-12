console.log("Connected");
// // alert("Hello");
// let a=0.02;
// var b=0.01;
// //let sum = a+b;
// let sum = (a*100+b*100)/100;
// console.log(sum);
// let string = "Hello World Web Tech";
// let string2 ='Hello World Web Tech';
// var text = string2.length;
// console.log("Length of String:" +text);
// let name = "AIUB";
// name = "BUET";
// console.log(name);

// function collect_data()
// {
//     let Pname = document.getElementById("PatientName").value;
//     console.log(Pname); 

//     let PAge= document.getElementById("PatientAge").value;
//     console.log(PAge);

//     let isvalidDOB= collect_DOB();

//     return false;
// }

// function collect_DOB()
// {
    
//     let DOB = document.getElementById("DOB").value;
//     console.log(DOB);
//     return false; 
// }

let a =10;
if(a>10)
{
    a++;
    console.log("Value of a: ",a);
}
else{
    a--;
    a=11;
    a++;
    console.log(a);
}
let i; 
for(i=0; i<5; i++)
{
    console.log("I (for loop): ",i);
}

i=1;
while(i<5)
{
    
    i++;
    console.log("I (while loop): ",i);
}

do{
    i++;
    console.log("I (do ... while): ",i);
}
while(i<5)

let array=["ABC", "DEF"];
array.forEach((item, index)=>{
    console.log("Index: ",index, "Item: ", item);
})

array.map((item, index)=>{
    console.log("Index: ",index, "Item: ", item);
})

function collect_data()
{
    let IsvalidName= collect_name();
    let IsvalidAge= collect_age();
    // let IsvalidEmail= collect_email();
    return false;
}
function collect_name()
{
    let Username=document.getElementById("PatientName").value;
    if(Username=="")
    {
        document.getElementById("NameError").innerHTML="Name Can Not Be Empty";
        return false;
    }
    if(Username.length<5)
    {
        document.getElementById("NameError").innerHTML="Name at least 5 char";
        return false;
    }
    console.log(Username);
    return false;
}
function collect_age()
{
    let age= document.getElementById("PatientAge").value;
    if(age>0)
    {
         if(age=="")
    {
        document.getElementById("AgeError").innerHTML="Age Can Not Be Empty";
        return false;
    }
    if(age<18)
    {
        document.getElementById("AgeError").innerHTML="You are Minor";
        return false;
    }
    }
    else{
        document.getElementById("AgeError").innerHTML="Age Can Not Be Negative";
    }
   
    console.log(age);
    return false;
}