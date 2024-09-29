require('dotenv').config();
const express = require('express');
const app = express();
 
//require the route
const  sendrouter  = require ('./Routes/routes');

//setting middleware
app.use(express.json());

app.use('/main',sendrouter);

const port =4000;

app.listen(port,()=>{

    console.log(`Server is listening on port ${port}`)
})