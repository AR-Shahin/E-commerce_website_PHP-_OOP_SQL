<?php


namespace App\classes;
use App\classes\Database;

class Wishlist
{
    public static function addCompareProduct($pid,$cusId){
        $sid = session_id();
        if(self::checkDoubleCompareProduct($pid) === false){
            $txt = "<span class='error'>Already Added to Compare!</span> ";
            return $txt;
            die();
        }else {
            $sql = "INSERT INTO `compare`(`cusid`, `proID`, `sid`) VALUES ('$cusId','$pid','$sid')";
            $res = Database::connect($sql);
            if ($res != false) {
                $txt = "<span class='success'>Added to Compare!</span> ";
                return $txt;
            } else {
                $txt = "<span class='error'>Not add!</span> ";
                return $txt;
            }
        }
    }
    public static function checkDoubleCompareProduct($pid){
        $sql = "SELECT * FROM `compare` WHERE `proID` = '$pid'";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $row = mysqli_num_rows($result);
            if( $row == 0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public static function ViewCompareProduct($cusid){
        $sid = session_id();
        $sql = "SELECT products.*,compare.proID FROM compare INNER JOIN products ON products.id = compare.proID WHERE compare.cusid = '$cusid' ORDER BY compare.id DESC ";
        $res = Database::connect($sql);
        if($res != false){
            $row = mysqli_num_rows($res);
            if($row == 0){
                return 0;
                die();
            }else{
                return $res;
            }
        }else{
            return false;
        }
    }
    public static function deleteAllCompare($cusid){
        $sql = "DELETE FROM `compare` WHERE `cusid` = '$cusid'";
        $res = Database::connect($sql);
        if($res != false){
            return ;
        }else{
            return ;
        }
    }
    public static function deleteSingleCompareProduct($pid){
        $cusId =  $cusid = \App\classes\Session::get('CustomerId');
        $sql = "DELETE FROM `compare` WHERE `cusid` = '$cusId' AND `proID` = $pid";
        $res = Database::connect($sql);
        if($res != false){
            return ;
        }else{
            return ;
        }
    }
    
    public static function addWishlistProduct($pid,$cusId){
        if(self::checkDoubleWishProduct($pid) === false){
            $txt = "<span class='error'>Already Added to Wishlist!</span> ";
            return $txt;
            die();
        }else {
            $sql = "INSERT INTO `wishlist`(`cusId`, `proid`) VALUES ('$cusId','$pid')";
            $res = Database::connect($sql);
            if ($res != false) {
                $txt = "<span class='success'>Added to Wishlist!</span> ";
                return $txt;
            } else {
                $txt = "<span class='error'>Not add!</span> ";
                return $txt;
            }
        }
    }
    
    public static function checkDoubleWishProduct($pid){
         $sql = "SELECT * FROM `wishlist` WHERE `proid` = '$pid'";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $row = mysqli_num_rows($result);
            if( $row == 0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    public static function ViewWishProduct($cusid){
        $sql = "SELECT products.*,wishlist.proid FROM wishlist INNER JOIN products ON products.id = wishlist.proid WHERE wishlist.cusid = '$cusid' ORDER BY wishlist.id DESC  ";
        $res = Database::connect($sql);
        if($res != false){
            $row = mysqli_num_rows($res);
            if($row == 0){
                return 0;
                die();
            }else{
                return $res;
            }
        }else{
            return false;
        }
    }
    
        public static function deleteSingleWishProduct($pid){
        $cusId =  $cusid = \App\classes\Session::get('CustomerId');
        $sql = "DELETE FROM `wishlist` WHERE `cusid` = '$cusId' AND `proid` = $pid";
        $res = Database::connect($sql);
        if($res != false){
            return ;
        }else{
            return ;
        }
    }
}