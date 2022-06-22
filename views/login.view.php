<?php include_once 'templates/header.php' ?>


        <!--Main Content-->
        <div class="main-container d-flex flex-column justify-content-center align-items-center">

            <h1 class="py-3">Login</h1>

            <form class="my-3 text-center" action='includes/login.inc.php' method='post'>
                <div class="mb-3 text-start">
                    <label for="loginemail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="loginemail" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 text-start">
                    <label for="loginpwd" class="form-label">Password</label>
                    <input type="password" class="form-control" id="loginpwd">
                </div>
                <div class="mb-3 form-check text-start">
                    <input type="checkbox" class="form-check-input" id="logincheckbox">
                    <label class="form-check-label" for="logincheckbox">Remember Me</label>
                </div>
                <button type="submit" name="submit" class="btn btn-dark">Let's Go!</button>
            </form>
        </div>



<?php include_once 'templates/footer.php' ?>