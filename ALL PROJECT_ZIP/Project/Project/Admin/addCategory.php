<?php require('header.php'); ?>
<?php require("config.php") ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">Add New Category</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="category.php">Category</a></li>
                            <li class="breadcrumb-item active">Add New Category</li>
                        </ol>

                        <div class="card mb-4 border-0">
                            <form name="cat-frm" method="post">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="cat_name" name="cat_name" type="text" placeholder="Enter name of category" />
                                            <label for="cat_name">Name of Category</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-3">
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <input type="submit" name="ok" value="Add New Category" class="btn btn-primary btn-block">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if(isset($_POST['ok'])){
                                $cat_name=$_POST['cat_name'];
                                $sql="INSERT INTO category (cat_name) VALUES ('$cat_name')";
                                $res=mysqli_query($con, $sql)or die(mysqli_error($con));
                                if($res==1){
                                    ?>
                                    <div class="alert alert-success col-6">
                                        New category add successfully
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="alert alert-danger col-6">
                                        New category not add successfully
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </main>
                <?php require('footer.php') ?>