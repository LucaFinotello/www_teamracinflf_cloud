  <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <div class="card-body">
                   <form name="search" action="search.php" method="post">
              <div class="input-group">
           
        <input type="text" name="searchtitle" class="form-control" style="z-index: 0" placeholder="Cerca per..." required>
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit" style="z-index: 0">Vai</button>
                </span>
              </form>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">News recenti</h5>
            <div class="card-body">
                      <ul class="mb-0">
<?php
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 8");
while ($row=mysqli_fetch_array($query)) {

?>

  <li>
                      <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                    </li>
            <?php } ?>
          </ul>
            </div>
          </div>

        </div>
