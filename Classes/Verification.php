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
                        <form method="POST">
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
        </body>
        </html>
        <?php
    }
}
?>