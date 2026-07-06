console.log("HTML Connected");
// let a=10.50;
// var b=20;
// sum=a+b;
// sub=a-b
// x=a+b;
// console.log(sum);
// console.log(sub);
// console.log(x);

// let name="AIUB";
// name='BUET';
// console.log(name);

// a="ASDFGHJKLWERTYUIO";
// var text=a.length;
// console.log(text);
function collect_data()
{
    let pname=document.getElementById("name").value;
    console.log(pname);
    let collectDOB = collect_DOB();
    return false;
}
function collect_DOB()
{
    let dob=document.getElementById("DOB").value;
    console.log(dob);
    return false;
}