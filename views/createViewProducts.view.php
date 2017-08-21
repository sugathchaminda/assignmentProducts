<?php require('partials/head.php'); ?>

    <section class="section">
        <div class="container">
            <h1 class="title">Create Products</h1>
            <h2 class="subtitle"></h2>
            <form action="createProducts" method="POST" name="productcreate">
                <div class="field">
                    <?php if (isset($errors)): ?>
                        <p class="help is-danger"> <?php echo $errors ?></p>
                    <?php endif; ?>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Region</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" name="code"/></td>
                        <td><input type="text" name="name"/></td>
                        <td><input type="text" name="price"/></td>
                        <td><input type="text" name="region"/></td>
                    </tr>
                    </tbody>
                </table>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary">Create</button>
                    </div>
                </div>
            </form>
            <br>
            <form action="viewProducts" method="GET" name="viewproducts">
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary">Back</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

<?php require('partials/footer.php'); ?>