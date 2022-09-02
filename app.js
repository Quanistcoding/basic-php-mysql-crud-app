//check if all inputs of type number are filled
let inputsOfTypeNumber = document.querySelectorAll("input[type='number']");
if(inputsOfTypeNumber.length > 0)submitBtn.disabled = true;

function checkIntInput(){
    submitBtn.disabled = false;  
    inputsOfTypeNumber.forEach(x=>{
        if(x.value == "")submitBtn.disabled = true; 
    });

};