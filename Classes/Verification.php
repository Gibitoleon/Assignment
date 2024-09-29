<?php
class Verification {
    public function verificationForm() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Verify Your Email</title>
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body {
                    background-color: #f8f9fa;
                }
                .card {
                    border: none;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                .container {
                    min-height: 100vh;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="card p-4">
                    <h1 class="text-center mb-4">Verify Your Email</h1>
                    <div class="card-body">
                        <p class="text-center">Enter the verification code sent to your email.</p>
                        <form id='form' method="POST"action ="Validation/verification_validate.php">
                            <div class="form-group">
                                <label for="verification_code">Verification Code:</label>
                                <input type="text" class="form-control" name="verification_code" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Verify</button>
                        </form>
                        <div class="mt-3 text-center">
                            <small class="text-muted">This verification link expires in 15 minutes.</small>
                        </div>
                        <div id="message" class="mt-3"></div> <!-- Placeholder for messages -->
                    </div>
                </div>
            </div>
            <script
      src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
      integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    
    <script src="Scripts/verification.js"></script>
        </body>
        </html>
        <?php
    }
}
?>