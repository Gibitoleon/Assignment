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
   console.log(form.action);
    if(data.status==="error"){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: `${data.msg}`,
        confirmButtonText: 'OK'
    });

    }
    else if (data.status==="success"){
  
    Swal.fire({
      icon: 'success',
      title:'Success',
      text: data.msg,
      showConfirmButton: false,
      timer: 2000
  }).then(()=>{
     window.location.href="index.php";
  }
  )
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