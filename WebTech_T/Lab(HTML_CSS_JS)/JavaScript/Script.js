console.log("HTML Connected");

let a =10;
let b=20;
if(a>0)
{
    console.log("Positive Number");
}
else{
    console.log("Negative Number");
}

let i=0;
for(i=0; i<5; i++)
{
    console.log("Value: ",i);
}

let j=0;
while(j<5)
{
    j++;
    console.log("Value From While Loop:",j);    
}

let jj=1
do{
    jj++;
    console.log("Value from Do While: ",jj);
}
while(jj<5)

let array = ["ABC", "CDF"];
array.forEach((item, index)=>{
    console.log("Index:", index, "Item:", item);
})
array.map((item, index)=>{
    console.log("Index:", index, "Item:", item);
})

function collect_data()
{
   let isNameValid=collect_name(); 
   let isDOBValid=collect_DOB();
   let isvalidPhone=collect_phone();
   let isvalidemail=collect_email();
   let isvalidcitizen=collect_citizenship();
   let isprofesstion=collect_professtion();
   return false;
}
function collect_name()
{
    let UserName = document.getElementById("name").value;
    if(UserName === "")
    {
        document.getElementById("NameError").innerHTML="Name Can Not Be Empty";
        return false;
    }
    else if (UserName.length<5)
    {
        document.getElementById("NameError").innerHTML="Name Must Be At Least 5 Charecter";
        return false;
    }
    console.log(UserName);
    return false;
}

function collect_DOB()
{
    let DOB= document.getElementById("DOB").value;
     if(DOB==="")
        {
            document.getElementById("DOBError").innerHTML="DOB Can Not Be Empty";
            return false;
        } 
        console.log(DOB);
        return false;
}

function collect_phone()
{
    let phone = document.getElementById("Phone").value;
    if(phone=="")
    {
        document.getElementById("PhoneError").innerHTML="Phone Is Required";
        return false;
    }
    if(phone.length!=11)
    {
        document.getElementById("PhoneError").innerHTML="Phone Must Be 11 Digits";
        return false;
    }
    return false; 
}

function collect_email()
{
    let email = document.getElementById("Email").value;
    let pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(email=="")
    {
        document.getElementById("EmailError").innerHTML="Email Can Not Be Empty";
        return false;
    }
    if(!pattern.test(email))
    {
        document.getElementById("EmailError").innerHTML="Invalid Email Format";
        return false;
    }
    return false;
}
function collect_citizenship()
{
    let country = document.getElementById("Citizen").value;
    if(country=="")
    {
        document.getElementById("CitizenError").innerHTML="Select Specific Country";
        return false;
    }
    if(country=="Select Country")
    {
        document.getElementById("CitizenError").innerHTML="Select Specific Country";
        return false;
    }
    return false;
}
function collect_professtion()
{
    let student=document.getElementById("Student").checked;
    let faculty=document.getElementById("Faculty").checked;
    let privatejob=document.getElementById("PrivateJob").checked;
    if(!student && !faculty && !privatejob)
    {
        document.getElementById("ProfesstionError").innerHTML="Select At least One";
        return false;
    }
    return false; 
}



