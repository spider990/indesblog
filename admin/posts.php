<?php include('C:\xampp\htdocs\php\complete-blog-php\config.php'); ?>
<?php include('admin_functions.php'); ?>
<?php include('post_functions.php'); ?>
<?php include('head_section.php'); ?>

<?php $posts = getAllPosts(); ?>
    <title> Admin / Manage Posts</title>
</head>

      <?php include(ROOT_PATH . '/admin/navbar.php') ?>

      <div class="container content">

          <?php include(ROOT_PATH . '/admin/menu.php') ?>

          <div class="table-div" style="width: 80%;">
          <!--display notification message -->
          <?php include(ROOT_PATH . 'includes/messages.php') ?>

          <?php if (empty($posts)): ?>
             <h1 style="text-align; margin-top: 20px;">No posts in the database.</h1>
          <?php else: ?>
             <table class="table">
                 <thead>
                     <th>N</th>
                     <th>Title</th>
                     <th>Author</th>
                     <th>Views</th>

                     <?php if ($_SESSION['user']['role'] == "Admin"): ?>
                        <th><small>Publish</small></th>
                     <?php endif ?>
                     <th><small>Edit</small></th>
                     <th><small>Delete</small></th>  
                 </thead>
                 <tbody>
                 <?php foreach ($posts as $key => $post): ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $post['author']; ?></td>
                        <td>
                            <a target="_blank"
                            href="<?php echo BASE_URL . 'single_post.php?post-slug=' . $post['slug'] ?>">
                            </a>
                        </td>
                        <td><?php echo $post['views']; ?></td>

                        <?php if ($_SESSION['user']['role'] == "Admin" ): ?>
                            <td>
                                <?php if ($post['published'] == true): ?>
                                    <a class="fa fa-check btn unpublish"
                                      href="posts.php?unpublish=<?php echo $post['id'] ?>">
                                    </a>
                                <?php else: ?>
                                    <a class="fa fa-times btn publish"
                                       href="posts.php?publish=<?php echo $post['id'] ?>">
                                    </a>
                                <?php endif ?>             
                            </td>
                            <?php endif ?>

                            <td>
                                <a class="fa fa-pencil btn edit"
                                   href="create_post.php?edit-post=<?php echo $post['id'] ?>">
                                </a>   
                            </td>
                            <td>
                                <a class="fa fa-trash btn delete"
                                   href="create_post.php?delete-post=<?php echo $post['id'] ?>">
                                </a>
                            </td>    
                    </tr>
                   <?php endforeach ?>     
                 </tbody>
             </table>
             <?php endif ?>   
            </div>
        </div>
</body>
  </html>    