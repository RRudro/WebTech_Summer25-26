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