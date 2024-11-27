<?php require('header.php'); ?>
<?php require("config.php") ?>
<?php
$src="SELECT * FROM category";
$rs=mysqli_query($con, $src)or die(mysqli_error($con));
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">Add New Item</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="items.php">Item</a></li>
                            <li class="breadcrumb-item active">Add New Item</li>
                        </ol>

                        <div class="card mb-4 border-0">
                            <form name="cat-frm" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="i_name" name="i_name" type="text" placeholder="Enter name of Item" />
                                            <label for="i_name">Name of Item</label>
                                        </div>
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="i_price" name="i_price" type="text" placeholder="Enter price of Item" />
                                            <label for="i_price">Item Price</label>
                                        </div>
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="i_desc" name="i_desc" type="text" placeholder="Enter description of Item" />
                                            <label for="i_desc">Item Description</label>
                                        </div>
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="ff" name="ff" type="file" placeholder="Enter name of category" />
                                            <label for="cat_name">Select Item Image</label>
                                        </div>
                                        <div class="form-floating mb-3 mb-md-0">
                                            <select class="form-control" id="cat_id" name="cat_id" placeholder="Enter name of category">
                                                <option value="" selected>-Select-</option>
                                                <?php
                                                while($rec=mysqli_fetch_assoc($rs)){
                                                    ?>
                                                    <option value="<?php echo $rec['cat_id'] ?>"><?php echo $rec['cat_name'] ?></option>                
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="cat_id">Name of Category</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-3">
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <input type="submit" name="ok" value="Add New Items" class="btn btn-primary btn-block">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if(isset($_POST['ok'])){
                                $i_name=$_POST['i_name'];
                                $i_price=$_POST['i_price'];
                                $i_desc=$_POST['i_desc'];
                                $cat_id=$_POST['cat_id'];
                                $fname=$_FILES['ff']['name'];
                                $i_path="item_img/".rand(00000000,99999999)."_".$fname;
                                // echo "<pre>";
                                // print_r($_FILES['ff']);
                                $img_type=array('jpg','jpeg','png','webp', 'JPG','JPEG','PNG','WEBP');
                                $farr=explode(".", $fname); //convert a string to array
                                $fext=end($farr);
                                // echo $fext;
                                if(in_array($fext, $img_type)){
                                    if(move_uploaded_file($_FILES['ff']['tmp_name'], "../".$i_path)){
                                        $sql="INSERT INTO item (i_name,i_price, i_desc, cat_id, i_path) VALUES ('$i_name','$i_price', '$i_desc', '$cat_id', '$i_path')";
                                        $res=mysqli_query($con, $sql);
                                        if($res==1){
                                            ?>
                                            <div class="alert alert-success col-6">
                                                New Item add successfully
                                            </div>
                                        <?php
                                        }else{
                                            ?>
                                            <div class="alert alert-success col-6">
                                                New Item Not add successfully
                                            </div>
                                            <?php
                                        }
                                        
                                    }else{
                                        echo "Not Upload";
                                    }
                                }else{
                                    ?>
                                    <div class="alert alert-danger col-6">
                                        Please select .jpg, jpeg or png image file
                                    </div>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </main>
                <?php require('footer.php') ?>