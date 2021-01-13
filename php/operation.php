<?php   

require_once("../Bookstore/php/db.php");
require_once("../Bookstore/php/component.php");

$conn = Createdb();
$query = getData("SELECT * FROM books");

// Create button click
if(isset($_POST['create'])) {
    createData();
}

if(isset($_POST['update'])) {
    updateData();
}

if(isset($_POST['delete'])) {
    deleteRecord();
}

if(isset($_POST['deleteall'])) {
    deleteAll();
}

// if(isset($_POST['searchBtn'])) {
//     $result = $_POST['search'];
//     searchFunc($result);
// }

// ============================



function createData() {
    $bookWriter = textBoxValue('book_writer');
    $bookname = textBoxValue('book_name');
    $bookpublisher = textBoxValue(("book_publisher"));
    $bookprice = textBoxValue('book_price');

    if($bookname && $bookpublisher && $bookprice) {

        $sql = "INSERT INTO books (book_writer, book_name, book_publisher, book_price)
                VALUES ('$bookWriter','$bookname', '$bookpublisher', '$bookprice')";

        if(mysqli_query($GLOBALS['conn'], $sql)) {
            TextNode("success", "Record Successfully Inserted!");
        } else {
            echo 'Error';
        }

        } else {
            TextNode("error", "Provide Data in the Text Box");
        }

}

function textBoxValue($value) {
    $textbox = mysqli_real_escape_string($GLOBALS['conn'], trim($_POST[$value]));
    if(empty($textbox)) {
        return false;
    } else {
        return $textbox;
    }
}


// Messages
function TextNode($classname, $msg) {
    $element = "<h6 class='$classname'>$msg</h6>";
    
    echo $element;
}


// Get data from mySQL database 
function getData($sql) {
    global $conn;
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
        // Array kosong rows[] akan sama dengan $row
    }
    return $rows;

}

// Update Data
function updateData() {
    $bookId = textBoxValue('book_id');
    $bookWriter = textBoxValue('book_writer');
    $bookName = textBoxValue('book_name'); 
    $bookPublisher = textBoxValue('book_publisher');
    $bookPrice = textBoxValue('book_price');


    if($bookWriter && $bookName && $bookPublisher && $bookPrice) {
        $sql = "
            UPDATE books SET
            book_writer = '$bookWriter', 
            book_name = '$bookName',
            book_publisher = '$bookPublisher',
            book_price = '$bookPrice'

            WHERE id='$bookId'
        ";

        if (mysqli_query($GLOBALS['conn'], $sql)) {
            TextNode("success", "Data Successfully Updated");
        } else {
            TextNode("error", "Unable to Update Data");
        } 

        } else {
            TextNode("error", "Select Data Using Edit Icon");
        }

}

function deleteRecord() {
    $bookId = textBoxValue("book_id");

    $sql = "
        DELETE FROM books WHERE id='$bookId'
    ";

    if (mysqli_query($GLOBALS['conn'], $sql)) {
        TextNode("success", "Record Deleted Successfully!");
    } else {
        TextNode("error", "Unable to Delete Record!");
    }
}


function deleteAll() {
    $sql ="DROP TABLE books";

    if(mysqli_query($GLOBALS['conn'], $sql)){
        TextNode("success", "All Record Deleted Successfully!");
        Createdb();
    } else {
        TextNode("error", "Something Went Wrong Record cannot be Deleted!");
    }
}


function searchFunc($keyword){
    $query = "SELECT * FROM books
			  WHERE
			  book_publisher LIKE '%$keyword%' OR
			  book_name LIKE '%$keyword%' OR
			  book_writer LIKE '%$keyword%' OR
			  book_price LIKE '%$keyword%' 
			  ";

    return getData($query);
    echo $query;
}
