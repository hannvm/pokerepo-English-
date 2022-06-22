<?php include_once 'templates/header.php' ?>


        <!--Main Content-->
        <div class="main-container d-flex flex-column justify-content-center align-items-center">

            <h1 class="py-3">Sign Up</h1>

            <form class="my-3 text-center" action="includes/signup.inc.php" method="post">
                <div class="mb-3 text-start">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="usernameHelp">
                </div>
                <div class="mb-3 text-start">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fname" aria-describedby="fnameHelp">
                </div>
                <div class="mb-3 text-start">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" aria-describedby="lnameHelp">
                </div>
                <div class="mb-3 text-start">
                    <label for="signupemail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="signupemail" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 text-start">
                    <label for="signuppwd" class="form-label">Password</label>
                    <input type="password" class="form-control" id="signuppwd">
                </div>
                <div class="mb-3 text-start">
                    <label for="signuppwdrep" class="form-label">Repeat Password</label>
                    <input type="password" class="form-control" id="signuppwdrep">
                </div>
                <button type="submit" name="submit" class="btn btn-dark">Let's Go!</button>
            </form>
        </div>



<?php include_once 'templates/footer.php' ?>