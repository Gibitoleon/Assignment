<?php
class Login
{

  public function showloginForm()
  { 
    
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="Styles/Registration.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

      <title>Document</title>
    </head>

    <body>
      <div class="container">
        <div class="registration-form">
          <h2>Login Form</h2>
          <form id="form" action="loginvalidation.php">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">

            </div>


            <!-- Password Field -->
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Enter password"
                name="Password" required>
            </div>
            <P>Dont have an account <a href="Registration.php">SignUp</a></P>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
        </div>
      </div>
      <script
        src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
      <script src="Scripts/login.js"></script>
    </body>

    </html>
<?php
  }
}
