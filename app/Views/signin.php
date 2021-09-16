<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin SignIn </title>
    <meta name="author" content="Codeconvey" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Stylish Login Page CSS -->
    <link rel="stylesheet" href="/login-page.css">

</head>

<body>

    <section style="margin-top: 10%;">
        <div class="rt-container">
            <div class="col-rt-12">
                <div class="Scriptcontent">

                    <!-- Stylish Login Page Start -->
                    <form class="codehim-form" action="/home/signin_submit" method="POST">
                        <div class="form-title">
                            <div class="user-icon gr-bg">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <h2> Admin Login</h2>
                        </div>

                        <?php if (isset($signin_error) && ($signin_error != '')) : ?>
                        <div class="alert alert-warning" role="alert">
                            <?= $signin_error ?>
                        </div>
                        <?php endif; ?>

                        <label for="email"><i class="bi bi-envelope-fill"></i> Email:</label>
                        <input type="email" id="email" class="cm-input" name="email" placeholder="Enter your email adress">

                        <label for="pass"><i class="bi bi-shield-lock-fill"></i> Password:</label>
                        <input id="pass" type="password" class="cm-input" name="password" placeholder="Enter your password">
                        <button style="margin-top:10%;" type="submit" class="btn-login  gr-bg" name="login">Login</button>
                    </form>
                    <!-- Stylish Login Page End -->

                </div>
            </div>
        </div>
    </section>

</body>

</html>