let controller1 = document.querySelector('#formContent')
let controller2 = document.querySelector('#formContent2')
 
const onslick = () =>{
   controller1.classList.remove('d-none')
   controller1.classList.add('d-flex')
}

const closecontent = () =>{
   controller1.classList.remove('d-flex')
   controller1.classList.add('d-none')
    
 }

 const onslick2 = () =>{
   
   controller2.classList.remove('d-none')
   controller2.classList.add('d-flex')
}

const closecontent2 = () =>{
   controller2.classList.remove('d-flex')
   controller2.classList.add('d-none')
    
 }