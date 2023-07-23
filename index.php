<?php
include "./config/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Application</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./assets/plugins/bootstrap/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Manage Employee
            </div>
            <div class="card-body">

                <form action="">
                    <div class="row g-3">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="col">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>


                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="manage_employee" </tbody></tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/plugins/jquery/jquery.min.js"></script>
    <script src="./assets/js/employee.js"></script>
</body>

</html>