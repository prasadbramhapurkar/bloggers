<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
      header('Location:http://localhost/blog/signin.php');
      exit;
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bloggers</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet">
</head>

<body>

<?php include "partials/_connection.php" ?>
<?php include "partials/_header.php" ?>

<?php
  // session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $category = $_POST['category'];
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $message = $_POST['message'];
    $email = $_SESSION['email'];
    $q = "select name from `user` where email='$email'";
    $result = $conn->query($q);
    $row = $result->fetch_assoc();
    $name = $row["name"];

    $sql = "INSERT INTO `blog` (`author`,`email`,`title`,`slug`,`category`,`content`) VALUES ('$name','$email', '$title','$slug','$category', '$message');";

    if(mysqli_query($conn,$sql)){
      header('Location:http://localhost/blog/dashboard.php');
    }
    else{
      echo "Error: Hush! Sorry $sql".mysqli_error($conn);
    }
  }
?>

<section class="text-gray-600 body-font relative">
      <form action="postform.php" method="post">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">ADD YOUR BLOG</h1>
          </div>
          
          <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap -m-2">
              <div class="p-2 w-full">
                <div class="relative">
                  <label for="category" class="leading-7 text-sm text-gray-600">Category</label>
                  <select name="category" id="category"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  required>
                   <option value="C">C</option>
                   <option value="C++">C++</option>
                   <option value="PYTHON">PYTHON</option>
                   <option value="PHP">PHP</option>
                  </select>
                </div>
              </div>
              <div class="p-2 w-full">
                <div class="relative">
                  <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                  <input type="text" id="title" name="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                </div>
              </div>
              <div class="p-2 w-full">
                <div class="relative">
                  <label for="slug" class="leading-7 text-sm text-gray-600">slug</label>
                  <input type="text" id="slug" name="slug" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                </div>
              </div>
              <div class="p-2 w-full">
                <div class="relative">
                  <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                  <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" ></textarea>
                </div>
              </div>
              <div class="p-2 w-full">
                <button type="submit" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">ADD</button>
              </div>
              </form>
      </section>

      <?php include "partials/_footer.php"; ?>
</body>
</html>