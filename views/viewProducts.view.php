<?php require('partials/head.php'); ?>

<section class="section">
    <div class="container">
        <h1 class="title">View Products</h1>
        <h2 class="subtitle">

        </h2>
        <div class="field">
            <?php if (isset($errors)): ?>
                <p class="help is-danger"> <?php echo $errors ?></p>
            <?php endif; ?>
            <div class="field">
                <?php if (isset($success)): ?>
                    <p class="help alert-success"> <?php echo $success ?></p>
                <?php endif; ?>
            </div>
        </div>

        <table class="class="form-group"">
            <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
                <th>Region</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($products as $product) { ?>

                <tr>
                    <td> <?php echo $product['id'] ?> </td>
                    <td> <input class="form-control" width="100" type="text" name="code" value="<?php echo $product['code'] ?>"></td>
                    <td><input class="form-control" width="100" type="text" name="name" value="<?php echo $product['name']  ?>"></td>
                    <td><input class="form-control" width="100" type="text" name="price" value="<?php echo $product['price']  ?>"></td>
                    <td><input class="form-control" width="100" type="text" name="region_id" value="<?php echo $product['region_id'] ?>"></td>
                    <td>
                        <form action="updateProducts" method="POST" name="json">
                            <div class="field is-grouped">
                                <div class="control">
                                    <button class="button is-primary">UPDATE</button>
                                </div>
                            </div>
                            <input type="hidden" value="<?php echo $product['id'] ?>" name="productId"/>
                        </form>
                    </td>

                    <td>
                        <form action="deleteProducts" onclick="confirmDelete(event)" method="post" name="deleteProducts">
                            <div class="field is-grouped">
                                <div class="control">
                                    <button delete-id="" class="button is-primary delete-user">DELETE</button>
                                </div>
                            </div>
                            <input type="hidden" value="<?php echo $product['id'] ?>" name="productId"/>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</section>

<?php require('partials/footer.php'); ?>

<script>
    // JavaScript for deleting product
    function confirmDelete(e) {
        if(confirm('Are you sure you want to delete this category ?'))
            alert('Category Deleted !');
        else {
            alert('Cancelled !');
            e.preventDefault();
        }
    }
</script>

