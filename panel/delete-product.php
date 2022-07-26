<?php
include('../inc/config.php');
if(isset($_GET['category'])){
    $category = $_GET['category'];
    if($category == "گوشی هوشمند"){
        if (isset($_GET['id']) & !empty($_GET['id'])){
            $id = $_GET['id'];
            $sql_image = "SELECT image_1,image_2,image_3,image_4  FROM products_tbl WHERE id='$id'";
            if (isset($conn)) {
                $res = mysqli_query($conn, $sql_image);
                if($res) {
                    $array_image = mysqli_fetch_array($res);
                    $image1 = $array_image['image_1'];
                    $image2 = $array_image['image_2'];
                    $image3 = $array_image['image_3'];
                    $image4 = $array_image['image_4'];

                    if(!empty($image1) || !empty($image2) || !empty($image3) || !empty($image4)){
                        if(!empty($image1)){
                            $image_path = "../images/products/".$image1;
                            $remove = unlink($image_path);
                            if(!$remove){
                                $_SESSION['delete-product-error'] = "<div class='error'> حدف عکس با مشکل مواجه شد لطفا دوباره تلاش کنید</div>";
                                redirect(asset('manage-products.php'));
                            }
                        }
                        if(!empty($image2)){
                            $image_path = "../images/products/".$image2;
                            $remove = unlink($image_path);
                            if(!$remove){
                                $_SESSION['delete-product-error'] = "<div class='error'> حدف عکس با مشکل مواجه شد لطفا دوباره تلاش کنید</div>";
                                redirect(asset('manage-products.php'));
                            }
                        }
                        if(!empty($image3)){
                            $image_path = "../images/products/".$image3;
                            $remove = unlink($image_path);
                            if(!$remove){
                                $_SESSION['delete-product-error'] = "<div class='error'> حدف عکس با مشکل مواجه شد لطفا دوباره تلاش کنید</div>";
                                redirect(asset('manage-products.php'));
                            }
                        }
                        if(!empty($image4)){
                            $image_path = "../images/products/".$image4;
                            $remove = unlink($image_path);
                            if(!$remove){
                                $_SESSION['delete-product-error'] = "<div class='error'> حدف عکس با مشکل مواجه شد لطفا دوباره تلاش کنید</div>";
                                redirect(asset('manage-products.php'));
                            }
                        }
                    }
                }
                $sql = "DELETE FROM products_tbl WHERE id='$id'";
                $res = mysqli_query($conn, $sql);
                if($res){
                    $_SESSION['delete-product-success'] = "<div class='error'> پست با موفقیت حذف شد </div>";
                    redirect(asset('manage-products.php?category=گوشی هوشمند'));
                    mysqli_close($conn);
                }
            }




        }else{
            $_SESSION['delete-product-error'] = "<div class='error'> حذف پست با انجام نشد لطفا دوباره تلاش کنید  </div>";
            redirect(asset('manage-products.php'));
        }

    }
    if($category == "لپ تاپ"){
        if (isset($_GET['id']) & !empty($_GET['id'])){
            $id = $_GET['id'];
            $sql_image = "SELECT image_1,image_2,image_3,image_4  FROM product_lab WHERE id='$id'";
            if (isset($conn)) {
                $res = mysqli_query($conn, $sql_image);
                if($res) {
                    $array_image = mysqli_fetch_array($res);
                    $image1 = $array_image['image_1'];
                    $image2 = $array_image['image_2'];
                    $image3 = $array_image['image_3'];
                    $image4 = $array_image['image_4'];

                    if(!empty($image1) || !empty($image2) || !empty($image3) || !empty($image4)){
                        if(!empty($image1)){
                            $image_path = "../images/products/".$image1;
                            $remove = unlink($image_path);
                            if(!$remove){
                                $_SESSION['delete-product-error'] = "<div class='error'> حدف عکس با مشکل مواجه شد لطفا دوباره تلاش کنید</div>";
                                redirect(asset('manage-product-lab.php'));
                            }
                        }
                        if(!empty($image2)){
                            $image_path = "../images/products/".$image2;
                            $remove = unlink($image_path);
                            if(!$remove){
                                $_SESSION['delete-product-error'] = "<div class='error'> حدف عکس با مشکل مواجه شد لطفا دوباره تلاش کنید</div>";
                                redirect(asset('manage-product-lab.php'));
                            }
                        }
                        if(!empty($image3)){
                            $image_path = "../images/products/".$image3;
                            $remove = unlink($image_path);
                            if(!$remove){
                                $_SESSION['delete-product-error'] = "<div class='error'> حدف عکس با مشکل مواجه شد لطفا دوباره تلاش کنید</div>";
                                redirect(asset('manage-product-lab.php'));
                            }
                        }
                        if(!empty($image4)){
                            $image_path = "../images/products/".$image4;
                            $remove = unlink($image_path);
                            if(!$remove){
                                $_SESSION['delete-product-error'] = "<div class='error'> حدف عکس با مشکل مواجه شد لطفا دوباره تلاش کنید</div>";
                                redirect(asset('manage-product-lab.php'));
                            }
                        }
                    }
                }
                $sql = "DELETE FROM product_lab WHERE id='$id'";
                $res = mysqli_query($conn, $sql);
                if($res){
                    $_SESSION['delete-product-success'] = "<div class='error'> پست با موفقیت حذف شد </div>";
                    redirect(asset('manage-product-lab.php?لپ تاپ'));
                    mysqli_close($conn);
                }
            }




        }else{
            $_SESSION['delete-product-error'] = "<div class='error'> حذف پست با انجام نشد لطفا دوباره تلاش کنید  </div>";
            redirect(asset('manage-product-lab.php'));
        }

    }
}