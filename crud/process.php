<?php
    include('connect.php');

    session_start();
    $name = "";
    $email="";
    $password="";
    //insert values into mysql
    if(isset($_POST['save'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $_SESSION['role'] = "success";
        $_SESSION['massage'] = 'Record Has Been Save';
        $query = "INSERT INTO data (name,email,password)
               VALUES ('$name','$email','$password')";
        $execute = mysqli_query($conn , $query);
        header("Location: http://localhost/crud/news.php");
    }


    //delete
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delete = "DELETE FROM data WHERE id = $id";
        $execute = mysqli_query($conn , $delete);
        $_SESSION['role'] = "danger";
        $_SESSION['massage'] = 'Record Has Been Delete';
        header("Location: http://localhost/crud/news.php");
    }

    //edit
    $bool = false;
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $bool = true;
        $query = "SELECT * FROM data WHERE id = $id";
        $execute = mysqli_query($conn , $query );
        $result = mysqli_fetch_assoc($execute);
        $name = $result['name'];
        $email = $result['email'];
        $password = $result['password'];


    }


    //update
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $update = "UPDATE data 
        SET name='$name' , email='$email', password='$password' 
        WHERE id = $id
        ";
        $_SESSION['role'] = "success";
        $_SESSION['massage'] = 'Record Has Been Update';
        $execute = mysqli_query($conn , $update);
        header("Location: http://localhost/crud/news.php");
        echo mysqli_error($conn);
    }
?>