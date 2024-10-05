const form = document.getElementById('form');
const emailerror = document.querySelector('.Emailerror');
const passworderror =document.querySelector('.Passworderror');
const usernameerror =document.querySelector('.Usernameerror');
const firstnameerror =document.querySelector('.Firstnameerror');
const lastnameerror =document.querySelector('.lastnameerror')
// 
form.addEventListener('submit',async(event)=>{
     //clear input fields
     emailerror.innerHTML='';
   firstnameerror.innerHTML='';
   lastnameerror.innerHTML='';
   usernameerror.innerHTML='';
   passworderror.innerHTML='';
    //prevent default submission
  event.preventDefault();

  const form = event.target;
  const formdata =new FormData(form);
  
  const formdataarray =Array.from(formdata.entries())
  formdataarray.forEach((key)=>{
   console.log(`${key}`);
   
  })
  try {
   const {data} =  await axios.post(form.action,formdata)
   
   
   console.log(data);
   
   console.log(form.action);
   
  
     
     
      
     Object.keys(data).forEach((key)=>{
     
      if(data[key].Status==='failed'){
      
      if(key==='email'){
       
        emailerror.innerHTML= `${data[key].msg}`
        
      

      
      }
      if(key ==='firstname'){
      
        firstnameerror.innerHTML =`${data[key].msg}`
        
      }
      if(key ==='lastname'){
       
        lastnameerror.innerHTML =`${data[key].msg}`
        
      }
      if(key ==='username'){
       
        usernameerror.innerHTML =`${data[key].msg}`
        
      }
      if(key ==='password'){
       
        passworderror.innerHTML =`${data[key].msg}`
        
      }
    }
    
     })
     
     

    
     
   if(data.Status==="pending"){
    Swal.fire({
      title: '🔒 Verify Your Email!',
       text: `${data.msg}`,
      showConfirmButton: false,
      timer: 2000
  }).then(()=>{
    window.location.href="Verification.php";
  })}
   if( data.Status ==='failedSend'){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: `${data.message}`,
      confirmButtonText: 'OK'
  });

  }  ;

  
    
  } catch (error) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: `Oops the issue  is indicated : ${error.message}`,
      confirmButtonText: 'OK'
  });
  } 
 
  
  });