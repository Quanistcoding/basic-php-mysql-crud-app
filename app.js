//check if all inputs of type number are filled
let inputsOfTypeNumber = document.querySelectorAll("input[type='number']");
if(inputsOfTypeNumber.length > 0)submitBtn.disabled = true;

function checkIntInput(){
    inputsOfTypeNumber.forEach(x=>{
        console.log(x.value);
        if(x.value != ""){
            submitBtn.disabled = false;    
        }else{
            submitBtn.disabled = true;   
        }
    });

};