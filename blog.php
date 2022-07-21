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
    <?php include 'partials/_header.php'; ?>


      <!-- blog section hear -->

      <?php
            $sql = "SELECT sno,author,category,date,title,content FROM `blog` ";
            
  
            $result = mysqli_query($conn, $sql);
      
            if (mysqli_num_rows($result) >= 0) {
              while($data = mysqli_fetch_assoc($result)) {
              ?>

      <section class="text-gray-600 body-font">
        <div class="container px-5 py-5 mx-auto">
          <div class="-my-8 divide-y-2 divide-gray-100">
            <div class="py-8 flex flex-wrap md:flex-nowrap">
              <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                <span class="font-semibold title-font text-gray-700"><?php echo $data['category'] ?></span>
                <span class="mt-1 text-gray-500 text-sm"><?php echo $data['date'] ?></span>
              </div>
              <div class="md:flex-grow">
                <h2 class="text-2xl font-medium text-gray-900 title-font mb-2"><?php echo $data['title'] ?></h2>
                <h6 class="text-lr font-medium text-gray-900 title-font mb-2">Posted By : <?php echo $data['author'] ?></h6>
                <p class="leading-relaxed"><?php echo $data['content'] ?></p>

                <?php
                  $_SESSION['sno'] = $data['sno']; 
                ?>
                <a class="text-yellow-500 inline-flex items-center mt-4" href="view_blog.php">Learn More
                  <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <?php }}?>
      <!-- end of blog hear -->

      <?php include 'partials/_footer.php'; ?>
          
          
        </div>
    </body>
</html>
