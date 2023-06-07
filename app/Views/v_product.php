<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <form action="" method="post">
            <div class="input-group mb-3 w-50">
                <input type="text" class="form-control form-control-sm" placeholder="Search" name="keyword">
                <button type="submit" class="btn btn-sm btn-primary">Search</button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Product name</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1 + ($pageLimit * ($currentPage - 1));
                    foreach ($products as $product) { ?>
                        <tr>
                            <td>
                                <?= $no ?>
                            </td>
                            <td>
                                <?= $product['product_id'] ?>
                            </td>
                            <td>
                                <?= $product['product_name'] ?>
                            </td>
                            <td>
                                <?= $product['price'] ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-flat btn-warning">Edit</button>
                                <button type="button" class="btn btn-sm btn-flat btn-danger">Delete</button>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    } ?>
                </tbody>
            </table>
            <?= $pager->links('tb_product', 'product_pagination') ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>