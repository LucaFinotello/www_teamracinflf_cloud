<?php 
session_start();
include('includes/config.php');
include('../db_con.php');
include('../loggati/header.html');
?>
    <div id="main">
        <?php include ('../loggati/findDevice.php'); ?>
        <div id="contenuto">
            <span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; News</span>
            <div class="container">
                <div class="menu1">
                    <ul>
                        <li><a href="#"><?php echo $_SESSION['username'];
                                $q = mysqli_query($conn,"SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
                                ?></a>
                            <ul>
                                <li><a href="profilo.php">Modifica profilo</a></li>
                                <li><a href="modifica.php">Modifica password</a></li>
                                <li><a href="elimina.php">Elimina account</a></li>
                                <li><a href="../logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

              <div class="row" style="margin-top: 2%">

                <!-- Blog Entries Column -->
                <div class="col-md-8">

                  <!-- Blog Post -->
                <?php
                     if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        $no_of_records_per_page = 8;
                        $offset = ($pageno-1) * $no_of_records_per_page;

                        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                        $result = mysqli_query($con,$total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                        while ($row=mysqli_fetch_array($query)) {
                ?>

                  <div class="card mb-4" style="border: 1px solid;
    padding: 1%;
    margin-bottom: 2%;">
                    <img class="card-img-top" style="max-width:30vw" src="../immagini/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                    <div class="card-body">
                      <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>

                      <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Leggi tutto &rarr;</a>
                    </div>
                  </div>
                <?php } ?>

                  <!-- Pagination -->

            <ul class="pagination justify-content-center mb-4">
                <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
                </li>
                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
                </li>
                <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
            </ul>

                </div>

                <!-- Sidebar Widgets Column -->
              <?php include('includes/sidebar.php');?>
              </div>
              <!-- /.row -->

            <!-- Bootstrap core JavaScript -->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        </div>
    </div>
<?php
include ('../loggati/footer.html')
?>
