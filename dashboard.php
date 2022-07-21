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
<?php include 'partials/_connection.php'; ?>
    <div class="flex flex-col h-screen justify-between">
    <header class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-black">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-yellow-500 rounded-full" viewBox="0 0 24 24">
            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Tailblocks</span>
        </a>
        <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
            <a class="text-lg mr-5 hover:text-gray-900" href="index.php">Home</a>
            <a class="text-lg mr-5 hover:text-gray-900" href="about.php">About</a>
            <a class="text-lg mr-5 hover:text-gray-900" href="blog.php">Blogs</a>
            <a class="text-lg mr-5 hover:text-gray-900" href="contact.php">Contact</a>
      
        </nav>

        <span class="ml-3 text-lr mr-4"><?php echo $_SESSION['email'] ?></span>

        <button class="inline-flex items-center bg-yellow-500 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"><a href="logout.php">logout</a>

        </button>


        </div>
    </header>


      <section class="text-gray-600 body-font">
        <div class="container px-5 py-2 mx-auto">
          <div class="flex flex-col text-center w-full mb-2">
            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Welcome </h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base"><?php echo $_SESSION['email']; echo "Add your Blogs here"; ?></p>
          </div>
          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded"><a href="postform.php">ADD</a></button>
            <br>
            <table class="table-auto w-full text-left whitespace-no-wrap">
              <thead>
                <tr>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">sno</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Title</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Category</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Edit</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $temp = $_SESSION['email'];
                
                $query = "SELECT sno, title, category FROM blog where email = '$temp' " ;
                $result = mysqli_query($conn, $query);
          
                if (mysqli_num_rows($result) >= 0) {
                  $sn=1;
                  while($data = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td class="px-4 py-3"><?php echo $sn; ?> </td>
                  <td class="px-4 py-3"><?php echo $data['title']; ?> </td>
                  <td class="px-4 py-3"><?php echo $data['category']; ?> </td>
                  <td class="px-4 py-3"><button class="flex text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded"><a href="postform.php">Edit</a></button></td>
                  <td class="px-4 py-3"><button class="flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">deleted</button></td> 

                <tr>
                <?php
                  $sn++;}} else { ?>
                    <tr>
                    <td colspan="8">No data found</td>
                    </tr>

                <?php } ?>
                  </tbody>
            </table>
          </div>
        </div>
      </section>
        


        <?php include "partials/_footer.php"; ?>
          
        </div>
    </body>
</html>
