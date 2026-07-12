console.log("JS Connected");
//JS Form Validation

let array = ["ABC", "EDF"];
array.forEach((item, index)=>{
    console.log("Index: ", index, "Item:",item);
})

array.map((item,index)=>{
    console.log("Index: ", index, "Item:",item);
})

let a = 10; 
if(a>0)
{
    console.log("Positive");
}
else if(a>=15)
{
    a++;
    console.log("Value of a: ",a);
}
let i;
for(i=0; i<10; i++)
{
    console.log("value of i (for loop): ", i);
}

while(i<16)
{
    i++;
    console.log("Value of i (while loop):",i);
}

do{
    i++;
    console.log("Value of i (do while loop): ",i);
}
while(i<20);

function collect_data()
{
    let IsvalidName=collect_name();
    let IsvalidPhone=collect_phone();
    let IsvalidAddress=collect_address();
    let IsvalidDOB=collect_DOB();

    return false;
}
function collect_name()
{
    let Username=document.getElementById("name").value;
    if(Username=="")
    {        
        document.getElementById("NameError").innerHTML="Name Can not be Emplty";
        return false;
    }
    if(Username.length<5)
    {
        document.getElementById("NameError").innerHTML="Name Can not be less than 5 char";
    }
    console.log(Username);
    return false; 
}
function collect_phone()
{
    let phone=document.getElementById("phone").value;
    if(phone=="")
    {
        document.getElementById("PhoneError").innerHTML="Can Not Be Empty";
        return false;
    }
    if(phone.length!==11)
    {
        document.getElementById("PhoneError").innerHTML="Number Must be 11 Digit";
        return false;
    }
    console.log(phone);
        return false;
}

function collect_address()
{
    let address = document.getElementById("Address").value;
    if(address=="" || address.length<20)
    {
        document.getElementById("AddressError").innerHTML="Not Empty and greter than 20 char";
        return false;
    }
    return false;
}
function collect_DOB()
{
    let DOB = document.getElementById("DOB").value;
    if(DOB=="")
    {
        document.getElementById("DOBError").innerHTML="Not Empty";
        return false;
    }
    return false;
}
 

