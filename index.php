<?php

require_once("../Bookstore/php/component.php");
require_once('../Bookstore/php/operation.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- CSS -->

    <link rel="stylesheet" href="style.css">

    <title>PHP | BookStore</title>
</head>

<div class="form-wrapper">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark light-text">



        <a class="navbar-brand" href="#"><i class="fas fa-swatchbook"></i> AJ's BookStore</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="#">Book Storage</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Users</a>
                </li>

            </ul>
            <!-- <form class="form-inline my-2 my-lg-0" method="POST" action="index.php">
                <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button name="searchBtn" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->



        </div>
    </nav>

    <div class="d-flex justify-content-center ">
        <form action="" method="post" class="w-50">

            <div class="row">

                <div class="col none">
                    <div class="py-2 pt-2 ">
                        <?php inputElement("<i class='fas fa-id-badge'></i>", "Book ID", "book_id", "", "readonly") ?>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="py-2 pt-2">
                        <?php inputElement("<i class='fas fa-user'></i>", "Writer", "book_writer", "", "") ?>
                    </div>
                </div>

            </div>


            <div class="pt-2">
                <?php inputElement("<i class='fas fa-book'></i>", "Book Name", "book_name", "", "") ?>
            </div>

            <div class="row pt-2">
                <div class="col">

                    <div class="pt-2">
                        <?php inputElement("<i class='fas fa-people-carry'></i>", "Publisher", "book_publisher", "", "") ?>
                    </div>

                </div>

                <div class="col">

                    <div class="pt-2">
                        <?php inputElement("<i class='fas fa-dollar-sign'></i>", "Price", "book_price", "", "") ?>
                    </div>

                </div>
            </div>

            <div class="d-flex justify-content-center">

                <?php buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "create", "data-placement='bottom' title='Create'") ?>

                <?php buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-pen-alt'></i>", "update", " data-placement='bottom' title='Update'") ?>

                <?php buttonElement("btn-delete", "btn btn-danger border", "<i class='fas fa-trash-alt'></i>", "delete", "data-placement='bottom' title='Delete'") ?>

                <?php buttonElement("btn-deleteall", "btn btn-danger", "<i class='fas fa-trash'></i> Delete All", "deleteall", "") ?>

            </div>

        </form>
    </div>

</div>



<main>

    <div class="text-center">


        <!-- Bootstrap Table -->
        <div class="d-flex table-data text-wrap justify-content-center">

            <table class=" table table-striped table-dark">

                <thead class="thead-dark">

                    <tr>
                        <th>No.</th>
                        <th>Writer</th>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Book Price</th>
                        <th>Edit</th>
                    </tr>

                </thead>
                <tbody id="tbody">

                    <?php $i = 1; ?>
                        <?php foreach ($query as $row) { ?>
                            <tr>

                                <td class="bookId" data-id="<?php echo $row['id']; ?>"><?php echo $row['id'] ?></td>

                                <td data-id="<?php echo $row['id']; ?>"><?php echo $i ?></td>

                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_writer']; ?></td>

                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name']; ?></td>
                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher']; ?></td>
                                <td data-id="<?php echo $row['id']; ?>"><?php echo "$" . $row['book_price']; ?></td>

                                <td>
                                    <i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i>
                                </td>

                            </tr>
                            <?php $i++ ?>
                    <?php } ?>
            

                </tbody>
            </table>

        </div>


    </div>




    </div>

</main>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="../Bookstore/php/app.js"></script>



<body>





</body>

</html>