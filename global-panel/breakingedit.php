<?php include '../classes/BreakingNews.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if (isset($_GET['breakid'])) {
        $id = $_GET['breakid'];
    }
?>

<?php
    $brkn = new BreakingNews();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updatebreaking = $brkn->getupBreakingNews($_POST, $id);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Breaking News</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($updatebreaking)) {
                      echo $updatebreaking;
                 }
               ?></p>
                
               <div class="block copyblock"> 

              <?php
                $getbreakingnews = $brkn->getbreakingforshow($id);
                if ($getbreakingnews) {
                    while ($result = $getbreakingnews->fetch_assoc()) {
              ?>  

                 <form action="" method="POST">
                    <table class="form">	

                        <tr>
                            <!-- <td>
                                <label>Title</label>
                            </td> -->
                            <td>
                                <input type="text" name="title" placeholder=" <?php echo $result['title']; ?>">
                            </td>
                        </tr>

						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>

                    </table>
                    </form>
               <?php } } ?>     
  

                </div>
            </div>
        </div>



<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>

<?php include 'inc/footer.php';?>