<?php
include('config.php');
include('jdf.php');
 function cot_blog($content){
    $text = explode("\n",$content);
    $count = count($text);
    for($i=0;$i<$count;$i++){
        echo $text[$i]."<br>" ;
    }
}

function redirect($url)
{
    if (!headers_sent()){
        header("Location: $url");
    }else{
        echo "<script type='text/javascript'>window.location.href='$url'</script>";
        echo "<noscript><meta http-equiv='refresh' content='0;url=$url'/></noscript>";
    }
    exit;
}

// convert date to jalali(shamsi)
function convert_date($date){
     $date = explode("-",$date);
     $Y = $date[0];
     $M = $date[1];
     $D = $date[2];
  $v = gregorian_to_jalali($Y,$M,$D,"/");
 return $v;
}

function get_excerpt($content,$count =350){
    return substr($content,0,$count)."...";
}
function get_excerpt2($content,$count =50){
    return substr($content,0,$count)."...";
}
function get_excerpt_comment($content,$count =100){
    return substr($content,0,$count)."...";
}

function convert_price($price){
     $price = strrev($price);
  $array  = str_split($price,3);
  $new_str = $array[0];
  $count = count($array);
  for($i=1;$i<$count;$i++){
      $new_str = $new_str . "," . $array[$i];
  }
  $new_str = strrev($new_str);
return $new_str;

}


function getIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
            //check ip from share internet

        elseif (!empty($_SERVER['HTTP_X_1FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
            //to check ip is pass from proxy

        else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

function get_ip()
{
    //creating or using cookie
    if (isset($_COOKIE["ipUserEcommerce"])) {
        $ip = $_COOKIE["ipUserEcommerce"];
    } else {
        $ip = getIp();
        setcookie('ipUserEcommerce', $ip, time() + 1206900);
    }
    return $ip;
}
function send_email($to,$subject,$message,$headers){
     mail($to,$subject,$message,$headers);
}

class cart{

    public function count_product($conn){
        $ip = get_ip();
        $sql = "SELECT id FROM cart_tbl WHERE ip_add='$ip'";
        $res= mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        return $count ;
    }
public function get_product_prices($conn){
    $total = 0;
    $ip = get_ip();
    $sql = "SELECT * FROM cart_tbl WHERE ip_add='$ip'";
    $res=mysqli_query($conn,$sql);

    if($res){
        while($row = mysqli_fetch_array($res)){
            $pro_id = $row['p_id'];
            $pro_category = $row['p_category'];
            $pro_qty = $row['qty'];
            if($pro_category == "گوشی هوشمند"){
                $pro_price = "SELECT price FROM products_tbl WHERE id='$pro_id'";
            }
            if($pro_category == "لپ تاپ"){
                $pro_price = "select price from product_lab where id='$pro_id'";
            }
            if($pro_category == "لوازم جانبی"){
                $pro_price = "select price from product_janeb where id='$pro_id'";
            }
            if($pro_category == "قاب و گلس"){
                $pro_price = "select price from product_ghab where id='$pro_id'";
            }
            if(isset($pro_price)){
                $res2 = mysqli_query($conn,$pro_price);
                if($res2){
                    while($pp_price = mysqli_fetch_array($res2)){
                        $product_price = array($pp_price['price']*$pro_qty);
                        $values = array_sum($product_price);
                        $total += $values;
                    }
                }
            }
        }
        return $total;
    }
}
}

function paste_number($n1,$n2,$n3,$n4,$n5){
     $paste = $n1.$n2.$n3.$n4.$n5;
     return $paste;
}

function cut_color($color_code){
     $cut = explode(",",$color_code);
     $count = count($cut);
     return $cut;
}
function get_color_name($conn,$color_code){
     $color_code = $color_code;
     $sql_color_name = "select color_name from color_tbl where color_code='$color_code'";
     if(isset($conn)){
         $res= mysqli_query($conn,$sql_color_name);
         if($res){
             $color = mysqli_fetch_assoc($res);
             return $color['color_name'];
         }
     }
}
function get_color_code($conn,$color_name){
    $color_name = $color_name;
    $sql_color_name = "select color_code from color_tbl where color_name='$color_name'";
    if(isset($conn)){
        $res= mysqli_query($conn,$sql_color_name);
        if($res){
            $color = mysqli_fetch_assoc($res);
           if(!empty($color['color_code'])){
               return $color['color_code'];
           }
        }
    }
}

class  product{


     public function get_product_properties($conn,$category,$post_id){

         if($category == "گوشی هوشمند"){
             $sql = "SELECT fa_title,image_1 FROM  products_tbl WHERE id='$post_id'";
             if(isset($conn)){
                 $res = mysqli_query($conn,$sql);
                 if($res){
                     $count = mysqli_num_rows($res);
                     if($count == 1){
                         $rows = mysqli_fetch_assoc($res);
                         return $rows;

                     }
                 }
             }
         }
         if($category == "لپ تاپ"){
             $sql = "SELECT fa_title,image_1 FROM  product_lab WHERE id='$post_id'";
             if(isset($conn)){
                 $res = mysqli_query($conn,$sql);
                 if($res){
                     $count = mysqli_num_rows($res);
                     if($count == 1){
                         $rows = mysqli_fetch_assoc($res);
                         return $rows;

                     }
                 }
             }
         }
         if($category == "قاب و گلس"){
             $sql = "SELECT fa_title,image_1 FROM  product_ghab WHERE id='$post_id'";
             if(isset($conn)){
                 $res = mysqli_query($conn,$sql);
                 if($res){
                     $count = mysqli_num_rows($res);
                     if($count == 1){
                         $rows = mysqli_fetch_assoc($res);
                         return $rows;

                     }
                 }
             }
         }
         if($category == "لوازم جانبی"){
             //        $tbl_name = "products_tbl";
             $sql = "SELECT fa_title,image_1 FROM  product_janeb WHERE id='$post_id'";
             if(isset($conn)){
                 $res = mysqli_query($conn,$sql);
                 if($res){
                     $count = mysqli_num_rows($res);
                     if($count == 1){
                         $rows = mysqli_fetch_assoc($res);
                         return $rows;
                     }
                 }
             }
         }
     }
}