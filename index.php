<?php require_once('C:\xampp\htdocs\php\complete-blog-php\config.php') ?>
<?php require_once( ROOT_PATH . '/includes/registration_login.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>

<!-- Retrieve all posts from database -->
<?php $posts = getPublishedPosts(); ?>


<?php require_once( ROOT_PATH .'/includes/head_section.php') ?>

<?php 

     if (isset($_GET['topic'])) {
         $topic_id = $_GET['topic'];
         $posts = getPublishedPostsbyTopic($topic_id);
     }
    ?>
    <title>Lifeblog / Home</title>
</head>
<body>
    <div class="container">
    
      <?php include( ROOT_PATH .'/includes/navbar.php') ?>

      <!-- banner --->
      <?php include( ROOT_PATH .'/includes/banner.php') ?>
      
        <div class="content">
            <h2 class="content-title">Recent Articles</h2>
            <hr>
            <?php foreach ($posts as $post): ?>
                <div class="post" style="margin-left: 0px;">
                  <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
                  <!-- add if statment-->
                  <?php if (isset($post['topic']['name'])): ?>
                     <a 
                        href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
                        class="btn category">
                        <?php echo $post['topic']['name'] ?>
                    </a>
                   <?php endif ?>

                  <a href="single_post.php?post_slug=<?php echo $post['slug']; ?>">
                      <div class="post_info">
                          <h3><?php echo $post['title'] ?></h3>
                          <div class="info">
                              <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
                              <span class="read_more">Read more...</span>
                          </div>
                      </div>
                  </a>
               </div>
               <?php endforeach ?>
            <!-- more content still to come here ...-->
        </div>

        <?php include( ROOT_PATH .'/includes/footer.php') ?>

