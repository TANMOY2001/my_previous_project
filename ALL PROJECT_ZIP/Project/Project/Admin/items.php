<?php 
    require('header.php');
    require("config.php");
 ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">All Items</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Items</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <a href="addItem.php" class="btn btn-info">Add New Item</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Items
                            </div>
                            <div class="card-body">
                                <?php
                                $src="SELECT i.*, c.cat_name FROM item i INNER JOIN category c ON i.cat_id=c.cat_id";
                                $rs=mysqli_query($con, $src)or die(mysqli_error($con));
                                if(mysqli_num_rows($rs)>0){
                                    ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name of Item</th>
                                                <th>Name of Category</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($rec=mysqli_fetch_assoc($rs)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $rec['i_name'] ?></td>
                                                    <td><?php echo $rec['cat_name'] ?></td>
                                                    <td><img src="<?php echo "../".$rec['i_path'] ?>" width="75" height="50"></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }else{
                                    echo "Items not found";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
                <?php require('footer.php') ?>