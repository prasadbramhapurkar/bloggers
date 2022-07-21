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
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name =  $_POST['name'];
        $email = $_POST['email'];
        $password =  $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if($password === $cpassword){ 
            $sql = "INSERT INTO `user` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password');";
            // mysqli_query($conn, $sql);
            
            if(mysqli_query($conn, $sql)){
              header('Location:http://localhost/blog/signin.php');
            } 
            else{
                echo "ERROR: Hush! Sorry $sql".mysqli_error($conn);
            }
        }
        else{
          echo "Password & Confirm Password is not Matching!!!!";
        }
        }
    ?>

        <!-- ml-auto flex flex-col-->
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
              <div class="lg:w-2/5 md:w-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-black rounded-lg p-8  w-full mt-10 md:mt-0 ml-40 flex flex-col">
                <form action="signup.php" method="post">
                <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign Up</h2>
                <div class="relative mb-4">
                  <label for="name" class="leading-7 text-lr text-black-600">Full Name</label>
                  <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                  <label for="email" class="leading-7 text-lr text-black-600">Email</label>
                  <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                  <label for="password" class="leading-7 text-lr text-black-600">Password</label>
                  <input type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                  <label for="cpassword" class="leading-7 text-lr text-black-600">Confirm Password</label>
                  <input type="password" id="cpassword" name="cpassword" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <button class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">Sign Up</button>
                <p class="text-xs text-gray-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>
                </form>
              </div>
            </div>
          </section>

      <?php include 'partials/_footer.php'; ?>
        
        </div>
    </body>
</html>