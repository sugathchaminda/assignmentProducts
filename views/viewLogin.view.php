<?php require('partials/head.php'); ?>

    <section class="section">
        <div class="container">
            <h1 class="title">Login</h1>
            <h2 class="subtitle">
            </h2>
            <div class="field">
                <?php if (isset($errors)): ?>
                    <p class="help is-danger"> <?php echo $errors ?></p>
                <?php endif; ?>
            </div>

            <form action="login" method="POST" name="userLogin">

                <div class="container">
                    <label><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="name" required>

                    <label><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button type="submit">Login</button>
                    <input type="checkbox" checked="checked"> Remember me
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>
    </section>

<?php require('partials/footer.php'); ?>