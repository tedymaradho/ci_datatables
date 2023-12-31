<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

</head>

<body>
    <div class="container mt-3">
        <form action="" method="post">
            <div class="input-group mb-3 w-50">
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm" id="datepicker" />
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-sm table-striped" id="productTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Options</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#productTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?= site_url('home/getproducts') ?>",
                columnDefs: [
                    {
                        orderable: false, targets: 0
                    },
                    {
                        orderable: false, targets: 4
                    },
                ],
                order: [[1, 'asc']],
            });

            $(function () {
                $("#datepicker").datepicker({
                    dateFormat: 'dd-mm-yy'
                });
            });
        });
    </script>
</body>

</html>