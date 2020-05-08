<?php

require_once 'DataAccess.inc';
require_once 'ProductCategory.inc';
require_once 'ProductMediaType.inc';
require_once 'ProductLevel.inc';
require_once 'ProductPrice.inc';
require_once 'ProductProperty.inc';
require_once 'Member.inc';
require_once 'Enums.inc';
require_once 'WidgetBuilder.php';

class Product {

    public $ProductId;
    public $Title;
    public $Description;
    public $ProductCategory;
    public $ProductLevel;
    public $ProductMediaType;
    public $ProductPrices;
    public $ProductProperties;
    public $Members;

    function __construct() {
        $this->ProductId = 0;
        $this->Title = "";
        $this->Description = "";
        $this->ProductCategory = new ProductCategory();
        $this->ProductLevel = new ProductLevel();
        $this->ProductMediaType = new ProductMediaType();
        $this->ProductPrices = new ProductPrices();
        $this->ProductProperties = new ProductProperties();
        $this->Members = new Members();
    }

}

class Products extends ArrayObject {

    function __construct() {
        
    }

}

class ProductController {

    public static function Insert(Product $product) {
        $sql = "INSERT INTO `Products` ( ";
        $sql.= "`Title`, `Description`, `ProductCategory` ,`ProductLevel`,`ProductMediaType` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$product->Title', '$product->Description' , '{$product->ProductCategory->ProductCategoryId}' , '{$product->ProductLevel->ProductLevelId}', '{$product->ProductMediaType->ProductMediaTypeId}' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(Product $product) {
        $sql = "UPDATE `Products` SET ";
        $sql .= "`Description` = '$product->Description', ";
        $sql .= "`ProductMediaType` = '{$product->ProductMediaType->ProductMediaTypeId}', ";
        $sql .= "`ProductLevel` = '{$product->ProductLevel->ProductLevelId}', ";
        $sql .= "`ProductCategory` = '{$product->ProductCategory->ProductCategoryId}', ";
        $sql .= "`Title` = '$product->Title' ";
        $sql .= " WHERE ";
        $sql .= "`ProductId` = {$product->ProductId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(Product $product) {
        $sql = "DELETE FROM `Products` ";
        $sql .= " WHERE ";
        $sql .= "`ProductId` = '$product->ProductId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneProduct($id, $getproperties = FALSE, $getprices = FALSE) {
        $sql = "SELECT * FROM `Products` ";
        $sql .= " WHERE ";
        $sql .= "`ProductId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Product();
            $pst->ProductId = $row['ProductId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->ProductCategory = ProductCategoryController::FindOneProductCategory($row['ProductCategory']);
            $pst->ProductLevel = ProductLevelController::FindOneProductLevel($row['ProductLevel']);
            $pst->ProductMediaType = ProductMediaTypeController::FindOneProductMediaType($row['ProductMediaType']);
            return $pst;
        }
    }

    public static function FindProductsForMember($memberid, $getProductProperties = FALSE) {
        $sql = "SELECT
Products.ProductId as `Products.ProductId`,
Products.Title as `Products.Title`,
Products.Description as `Products.Description`,
Products.ProductCategory as `Products.ProductCategory`,
Products.ProductMediaType as `Products.ProductMediaType`,
Products.ProductLevel as `Products.ProductLevel`,
ProductCategories.ProductCategoryId as `ProductCategories.ProductCategoryId`,
ProductCategories.Title as `ProductCategories.Title`,
ProductCategories.Description as `ProductCategories.Description`,
ProductCategories.Parent as `ProductCategories.Parent`,
ProductLevels.ProductLevelId as `ProductLevels.ProductLevelId`,
ProductLevels.Title as `ProductLevels.Title`,
ProductLevels.Description as `ProductLevels.Description`,
ProductMediaTypes.ProductMediaTypeId as `ProductMediaTypes.ProductMediaTypeId`,
ProductMediaTypes.Title as `ProductMediaTypes.Title`,
ProductMediaTypes.Description as `ProductMediaTypes.Description`
FROM
Members
INNER JOIN ProductMember ON Members.MemberId = ProductMember.Member
INNER JOIN Products ON Products.ProductId = ProductMember.Product
INNER JOIN ProductCategories ON ProductCategories.ProductCategoryId = Products.ProductCategory
INNER JOIN ProductLevels ON ProductLevels.ProductLevelId = Products.ProductLevel
INNER JOIN ProductMediaTypes ON ProductMediaTypes.ProductMediaTypeId = Products.ProductMediaType
WHERE Members.MemberId ={$memberid}";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Product();
            $pst->ProductId = $row['Products.ProductId'];
            $pst->Title = $row['Products.Title'];
            $pst->Description = $row['Products.Description'];

            $cat = new ProductCategory();
            $cat->ProductCategoryId = $row['ProductCategories.ProductCategoryId'];
            $cat->Title = $row['ProductCategories.Title'];
            $cat->Description = $row['ProductCategories.Description'];
            $pst->ProductCategory = $cat;

            $med = new ProductMediaType();
            $med->ProductMediaTypeId = $row['ProductMediaTypes.ProductMediaTypeId'];
            $med->Title = $row['ProductMediaTypes.Title'];
            $med->Description = $row['ProductMediaTypes.Description'];
            $pst->ProductMediaType = $med;

            $lvl = new ProductLevel();
            $lvl->ProductLevelId = $row['ProductLevels.ProductLevelId'];
            $lvl->Title = $row['ProductLevels.Title'];
            $lvl->Description = $row['ProductLevels.Description'];
            $pst->ProductMediaType = $lvl;


            if ($getProductProperties == TRUE) {
                $pst->ProductProperties = ProductPropertyController::FindProductPropertiesForProduct($id);
            } else {
                $pst->ProductProperties= NULL;
            }



//            $pst->ProductCategory = ProductCategoryController::FindOneProductCategory($row['ProductCategory']);
//            $pst->ProductLevel = ProductLevelController::FindOneProductLevel($row['ProductLevel']);
//            $pst->ProductMediaType = ProductMediaTypeController::FindOneProductMediaType($row['ProductMediaType']);
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function Fill($getproperties = FALSE, $getprices = FALSE) {
        $sql = "SELECT * FROM `Products` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Product();
            $pst->ProductId = $row['ProductId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->ProductCategory = ProductCategoryController::FindOneProductCategory($row['ProductCategory']);
            $pst->ProductLevel = ProductLevelController::FindOneProductLevel($row['ProductLevel']);
            $pst->ProductMediaType = ProductMediaTypeController::FindOneProductMediaType($row['ProductMediaType']);
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function Count() {
        $sql = "SELECT Count(ProductId) as `cnt` FROM `Products` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            return $row['cnt'];
        }
    }

    public static function GetProducts($count = 0, $method = SearchMethods::Newest) {


        $sql = "SELECT * FROM `Products` ";

        switch ($method) {
            case SearchMethods::Newest:
                $sql.="ORDER BY ProductId DESC ";
                break;
            case SearchMethods::Oldest:
                $sql.="ORDER BY ProductId ASC ";
                break;
            case SearchMethods::BestSelling:
                $sql.="ORDER BY ProductId ASC ";
                break;
            case SearchMethods::Popular:
                $sql.="ORDER BY ProductId ASC ";
                break;
            default:
                break;
        }

        if ($count > 0) {
            $sql .= " LIMIT {$count}";
        }

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $projects = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Product();
            $pst->ProductId = $row['ProductId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->ProductCategory = ProductCategoryController::FindOneProductCategory($row['ProductCategory']);
            $pst->ProductLevel = ProductLevelController::FindOneProductLevel($row['ProductLevel']);
            $pst->ProductMediaType = ProductMediaTypeController::FindOneProductMediaType($row['ProductMediaType']);
            $projects[$i] = $pst;
            $i++;
        }
        return $projects;
    }

}

class ProductUIBuilder {

    public static function CreateTotalProductWidget() {
        $count = ProductController::Count();
        $file = "../Content/Widgets/Col3CenterContent.widget";
        WidgetBuilder::createWidget($file, array("value" => $count, "smalltext" => 'محصول', "bigtext" => 'تعداد کل محصولات', "color" => 'green', "image" => 'pe-7s-cart'));
    }

    public static function CreateTodayProductWidget() {
        $count = ProductController::Count();
        $file = "../Content/Widgets/Col3CenterContent.widget";
        WidgetBuilder::createWidget($file, array("value" => $count, "smalltext" => 'محصول', "bigtext" => 'محصولات امروز', "color" => 'green', "image" => 'pe-7s-cart'));
    }

    public static function CreateProductBriefTable($count, $method) {
        $projects = ProductController::GetProducts($count, $method);
        $file = "../Content/Widgets/Col6ProductsTableContentGreen.widget";


        $s = '';
        switch ($method) {
            case SearchMethods::Newest :
                $s = "جدید ترین محصولات";
                break;

            case SearchMethods::Oldest :
                $s = "قدیمی ترین محصولات";
                break;
            case SearchMethods::Popular :
                $s = "محبوبترین محصولات";
                break;
            case SearchMethods::BestSelling:
                $s = "پر فروشترین محصولات";
                break;
        }

        WidgetBuilder::createWidget($file, array($s, $projects));
    }

    public static function CreateTotalPerTodayProductForMemberWidget($memberid) {
        $count = ProductController::Count();
        $file = "../Content/Widgets/Col4PieChartViolet.widget";
        WidgetBuilder::createWidget($file, array('نمودار وضعیت محصولات', 'کل', 'امروز'));
    }

    public static function CreateTodayProductForMemberWidget($memberid) {
        $count = ProductController::Count();
        $file = "../Content/Widgets/Col4CenterContent.widget";
        WidgetBuilder::createWidget($file, array('color' => 'violet', 'buttoncolor' => 'primary2', 'bigtext' => 'تعداد محصولات امروز', 'value' => $count, 'buttontext' => 'مشاهده اطلاعات'));
    }

    public static function CreateTotalProductForMemberWidget($memberid) {
        $count = ProductController::Count();
        $file = "../Content/Widgets/Col4CenterContent.widget";
        WidgetBuilder::createWidget($file, array('color' => 'violet', 'buttoncolor' => 'primary2', 'bigtext' => 'تعداد کل محصولات', 'value' => $count, 'buttontext' => 'مشاهده اطلاعات'));
    }

}
