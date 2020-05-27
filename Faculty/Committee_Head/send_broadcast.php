<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
  include('../../Files/PDO/dbcon.php'); 
  $stmt=$con->prepare("CALL VIEW_BROADCAST_LISTS();");
  $stmt->execute();
?>
<script src="../../Files/ckeditor/ckeditor.js"></script>
<!-- <script src="../../Files/ckeditor5/build/ckeditor.js"></script> -->
<div class="content-wrapper header-info">
    <!-- widgets -->
    <div class="mb-30">
        <div class="card h-100 ">
            <div class="card-body h-100">
                <h4 class="card-title">Send Broadcast</h4>
                <!-- action group -->
                <div class="scrollbar">
                    <ul class="list-unstyled">
                        <form action="broadcast_sender.php" method="POST">
                            <li>
                                <div class="media">
                                    <div class="media-body mb-2">
                                        <select name="blid" class="form-control p-1 pl-3" required>
                                            <option>Select Broadcast List</option>
                                            <?php $a=0;
                            while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                            { 
                              if ($a==0) 
                              {
                                ?>
                                            <option value="<?php echo $data['BROADCAST_LIST_ID']; ?>" selected>
                                                <?php echo $data['BROADCAST_LIST_NAME']; ?>-<?php echo $data['FACULTY_FIRST_NAME']; ?>
                                                <?php echo $data['FACULTY_LAST_NAME']; ?>-<?php echo $data['BROADCAST_LIST_DATE']; ?>
                                            </option>
                                            <?php 
                              $a+=1;
                              }
                              else
                              {
                                ?>
                                            <option value="<?php echo $data['BROADCAST_LIST_ID']; ?>">
                                                <?php echo $data['BROADCAST_LIST_NAME']; ?>-<?php echo $data['FACULTY_FIRST_NAME']; ?>
                                                <?php echo $data['FACULTY_LAST_NAME']; ?>-<?php echo $data['BROADCAST_LIST_DATE']; ?>
                                            </option>
                                            <?php 
                              }
                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </li>
                            For name of the representatve type @REP_NAME, for name of the company type @CMPNY_NAME and
                            for sender name type @SENDER.
                            <li>
                                <div class="media">
                                    <div class="media-body mb-2">
                                        <input type="text" name="subject" class="form-control" placeholder="Suject">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-body mb-2">
                                        <textarea name="editor" id="editor">
                                          <p>Dear @REP_NAME,</p>
                                          <p>Content @CMPNY_NAME Content</p>
                                          <p>Yours&#39; Truly, @SENDER.</p>
                                        </textarea>
                                        <script>
                                        CKEDITOR.replace('editor');
                                        </script>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-body mb-2">
                                        <input type="submit" class="button button-border x-small" value="Send"
                                            name="Submit">
                                        <input type="reset" class="btn btn-lg btn-outline-danger float-right ml-2"
                                            value="RESET" name="">
                                    </div>
                                </div>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php 
  include('footer.php');
?>