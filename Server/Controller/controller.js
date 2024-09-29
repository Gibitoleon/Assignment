 // Controllers/emailController.js
const nodemailer = require('nodemailer');
const useremail =process.env.EMAIL_USERNAME;
const password =process.env.EMAIL_PASSWORD;

// Create a transporter object using your email service configuration
const transporter = nodemailer.createTransport({
    service: 'Gmail', // Change to your email service
    auth: {
        user: useremail, // Your email address
        pass: password, // Your email password or app-specific password
    },
});
 
 const sendemail = async(req,res)=>{

    const{email,firstname,code} =req.body;

    const mailOptions = {
        from: useremail, // Sender's email
        to: email, // Recipient's email
        subject: 'Verification Code', // Subject of the email
        text: `Hello ${firstname},\nYour verification code is: ${code}`, // Email body
    };

    try {
        console.log('Preparing to send email to:', email); 
        await transporter.sendMail(mailOptions);
        res.status(200).json({ status: 'success', message: 'Email sent successfully!' });
        console.log('Email sent successfully to:', email); //
    } catch (error) {
        console.error('Error sending email:', error);
        res.status(500).json({ status: 'failed', message: 'Error sending email.' });
    }


 }
  module.exports =sendemail;