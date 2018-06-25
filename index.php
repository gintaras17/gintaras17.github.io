
    <?php include "includes/db.php"; ?>
    <?php include "includes/header.php"; ?>

    <!-- Navigation -->

    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               
               <?php
                
                $query = "SELECT * FROM posts";
                $select_all_posts_query = mysqli_query($connection,$query);
                    
                while($row = mysqli_fetch_assoc($select_all_posts_query)) { //loopas prasideda nuo cia
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,100);
                    $post_status = $row['post_status'];
                
                if($post_status !== 'published') {
                    echo "<h1 class='text-center'> no post sorry</h1>";
                } else {
                    
                
                    
                    ?>
                    
                    <h1 class="page-header">    <!--Visa sitas zemiau yra loop'as, kuris ima duomenis is lenteles-->
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>    <!--kai spausim ant title, tai nusius parametra i URL, matysim vien posto puslapi, kuris bus sios eilutes pradzia p_id=visa php eilute. cia toks pat reikalas, kai mes spaudziame edit, ir updateiname posta, url eilutej matom jo id nr, tai cia bus taip pat. mums ji reikia pagauti, kad tai veiktu..-->
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id ?>"><img class="img-responsive" src="images/<?php echo $post_image;?>" alt=""></a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                    
    <?php } } ?>

                

            </div>

            <!-- Blog Sidebar Widgets Column -->

        <?php include "includes/sidebar.php"; ?>
       
        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php";?>