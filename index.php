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

      <!-- end header -->

      <!-- main part -->

      <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
          <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
            <h1 class="title-font font-medium text-3xl text-gray-900">Slow-carb next level shoindcgoitch ethical authentic, poko scenester</h1>
            <p class="leading-relaxed mt-4">Poke slow-carb mixtape knausgaard, typewriter street art gentrify hammock starladder roathse. Craies vegan tousled etsy austin.</p>
          </div>
          <div class="lg:w-2/6 md:w-1/2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-black rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
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
          </div>
        </div>
      </section>

      <!-- end main part -->
      <hr>
      <!-- features of a blogs in website -->

      <section class="text-gray-600 body-font">
        <div class="container px-5 py-5 mx-auto">
          <h1 class="sm:text-3xl text-2xl font-medium title-font text-center text-gray-900 mb-4">Categories 
            <br class="hidden sm:block">of the Blogs
          </h1>
          <?php
            $sql = "SELECT cname, description FROM `category` ";
            
  
            $result = mysqli_query($conn, $sql);
      
            if (mysqli_num_rows($result) >= 0) {
              while($data = mysqli_fetch_assoc($result)) {
                ?>
          <!--  -->
          <!-- p-4 md:w-1/3  -->
          <div class="flex flex-wrap sm:-m-4 -mx-1 -mb-10 -mt-4 md:space-y-0 space-y-6">
            <div class="flex">
              <div class="flex-grow pl-6">
                <h2 class="text-gray-900 text-lg title-font font-medium mb-2 mt-10"><?php echo $data['cname']; ?></h2>
                <p class="leading-relaxed text-base"><?php echo $data['description']; ?></p>
                <a class="mt-3 text-yellow-500 inline-flex items-center" href="blog.php">Learn More
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <br>
          <?php
        }
            }
            ?>
        </div>
      </section>

      <!-- end of our features -->
      <?php include 'partials/_footer.php'; ?>
    </div>
</body>
</html>
