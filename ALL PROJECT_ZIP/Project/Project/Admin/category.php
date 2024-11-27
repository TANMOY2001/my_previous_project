<?php 
    require('header.php');
    require("config.php");
 ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">All Category</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <a href="addCategory.php" class="btn btn-info">Add New Category</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Category
                            </div>
                            <div class="card-body">
                                <?php
                                $src="SELECT * FROM category";
                                $rs=mysqli_query($con, $src)or die(mysqli_error($con));
                                if(mysqli_num_rows($rs)>0){
                                    ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name of Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            while($rec=mysqli_fetch_assoc($rs)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $rec['cat_name'] ?></td>
                                                </tr>
                                                <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }else{
                                    echo '<h4 class="text-center text-danger">No Category Found</h4>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
                <?php require('footer.php') ?>