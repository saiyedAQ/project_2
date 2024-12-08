
    //menu
    <!-- Institution  sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>


            <h2>Institutions on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- institutions sEARCH Section Ends Here -->



    <!-- institutions MEnu Section Starts Here -->
    <section class="institutions-menu">
        <div class="container">
            <h2 class="text-center">Institutions Menu</h2>

            <?php 

                //SQL Query to Get institutions based on search keyword
                //$search = Bir Hospital '; DROP database name;
                // "SELECT * FROM tbl_ins WHERE title LIKE '%Bir Hospital'%' OR description LIKE '%Bir Hospital%'";
                $sql = "SELECT * FROM tbl_ins WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether  available of not
                if($count>0)
                {
                    //Institutions Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $phnnumber = $row['number'];
                        $location = $row['location'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="institutions-menu-box">
                            <div class="institutions-menu-img">
                                <?php 
                                    // Check whether image name is available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/institutions/<?php echo $image_name; ?>" alt="Bir Hospital" class="img-responsive img-curve">
                                        <?php 

                                    }
                                ?>
                                ''
                            </div>

                            <div class="ins-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="ins-location">$<?php echo $location; ?></p>
                                <p class="ins-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="#" class="btn btn-primary">Visit Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Institutions Not Available
                    echo "<div class='error'> Institutions not found.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- Institutions Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>