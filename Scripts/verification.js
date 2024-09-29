const form = document.getElementById('form');


form.addEventListener('submit',async(event)=>{
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
    console.log('Data from server:', data.msg);
    console.log('Status from server:', data.Status);
    console.log(form.action);
    if(data.Status==="failed"){
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: `${data.msg}`,
          confirmButtonText: 'OK'
      });
  
      }
      else if (data.Status==="Success"){
    
      Swal.fire({
         icon: 'success',
        title: 'Successful Registration!',
         text: `${data.msg}`,
        showConfirmButton: false,
        timer: 2000
    }).then(()=>{
      window.location.href="login.php";
    });
  }
      
      
    } catch (error) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: `Could not execute: ${error.message}`,
        confirmButtonText: 'OK'
    });
    } 
   
 
})