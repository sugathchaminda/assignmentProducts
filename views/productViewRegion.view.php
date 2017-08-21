<?php require('partials/head.php'); ?>
    <section class="section">
        <div class="container">
            <h1 class="title">Wecome Regional Admin</h1>
            <h2 class="subtitle">

            </h2>
            <form action="create" method="GET" name="json">
                <div class="field">
                    <?php if (isset($errors)): ?>
                        <p class="help is-danger"> <?php echo $errors ?></p>
                    <?php endif; ?>
                </div>
            </form>
            <form action="viewProductsRegion" method="GET" name="json">
                <div class="field">
                    <?php if (isset($errors)): ?>
                        <p class="help is-danger"> <?php echo $errors ?></p>
                    <?php endif; ?>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary">View Products</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?php require('partials/footer.php'); ?>