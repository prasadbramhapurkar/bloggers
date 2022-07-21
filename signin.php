<!DOCTYPE html>
<html>
<head>
    <title>Bloggers</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet">
</head>

<body>
    <div class="flex flex-col h-screen justify-between">
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_connection.php'; ?>

    <?php
    $login = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password =  $_POST['password'];

        $sql = "select email,password from user where email='$email' AND password = '$password'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        
        if($num == 1){
          // echo "you are logged in!!!";
          $login = true;
          session_start();
          $_SESSION["email"] = $email;
          $_SESSION["loggedin"] = true;
          header('Location:http://localhost/blog/dashboard.php');
        }
        else{
          echo "wrong entry!!!";
        }

        }
    ?>

        <!-- ml-auto flex flex-col-->
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
              <div class="lg:w-2/6 md:w-1/2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-black rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                <form action="signin.php" method="POST">
                <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign In</h2>
                <div class="relative mb-4">
                  <label for="email" class="leading-7 text-lr text-black-600">Email</label>
                  <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                  <label for="password" class="leading-7 text-lr text-black-600">Password</label>
                  <input type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <button class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">Sign In</button>
                <p class="text-xs text-gray-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>
              </form>
              </div>
            </div>
          </section>

      <?php include 'partials/_footer.php'; ?>
        
        </div>
    </body>
</html>