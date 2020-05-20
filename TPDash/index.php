<?php 
  include('header.php');
?>
<!--=================================
 Main content -->

 <!--=================================
wrapper -->

    <div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white"> Welcome back, Michael! </h3>
            <span class="mb-10 mb-md-30 text-white d-block">View a summary of your account navigate to the most important account activities.</span>
          </div>
          <div class="col-md-6">
          <div class="card">
            <div class="btn-group info-drop header-info-button">
                <button type="button" class="dropdown-toggle-split  button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add new <i class="ti-plus"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Add Project </a>
                  <a class="dropdown-item" href="#"><i class="text-primary ti-files"></i>Add Task </a> 
                  <a class="dropdown-item" href="#"><i class="text-warning ti-id-badge"></i>Add team </a> 
                  <a class="dropdown-item" href="#"><i class="text-dark ti-pencil-alt"></i>Leave app </a> 
                  <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>New Message</a> 
                  <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Edit Profile</a> 
                  <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a> 
                  <a class="dropdown-item" href="#"><i class="text-danger ti-unlock"></i>Logout</a> 
                </div>
              </div>
            </div>
           </div>
          </div>
        </div>
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Notifications</h4>
             <!-- action group -->
             <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-danger ti-trash"></i>Clear All</a>
                </div>
              </div>
             <div class="scrollbar">
              <ul class="list-unstyled">
                <?php
                $count=0;
                include('dbcon.php');
                $stmt=$con->prepare("CALL GET_REG_NOTIFICATION();");
                $stmt->execute();
                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                  $id = $data['NOTIFICATION_SENDER_ID'];
                  $type = $data['NOTIFICATION_SENDER_TYPE'];
                  if($count==0)
                  {
                    $x=7;
                    $y='ST';
                    $stmt1=$con->prepare(" CALL GET_USERNAME(:id,:type);");
                    $stmt1->bindparam(":id",$x);
                    $stmt1->bindparam(":type",$y);
                    $stmt1->execute();
                    $uname=$stmt1->fetch(PDO::FETCH_ASSOC);
                    $count=1;
                    echo $uname;
                  }
                  $stmt1=$con->prepare(" CALL GET_USERNAME(:id,:type);");
                  $stmt1->bindparam(":id",$id);
                  $stmt1->bindparam(":type",$type);
                  $stmt1->execute();
                  $uname=$stmt1->fetch(PDO::FETCH_ASSOC); 
                ?>
                <li class="">
                  <div class="media">
                   <!-- <div class="position-relative">
                    <img class="img-fluid mr-15 avatar-small" src="images/team/01.jpg" alt="">
                    <i class="avatar-online bg-success"></i>
                   </div>  -->
                    <div class="media-body">
                       <h6 class="mt-0"><?php echo $uname['uname']; ?><small class="float-right"><?php echo $data['NOTIFICATION_TIME_STAMP']; ?></small></h6>
                       <p><?php echo $data['NOTIFICATION_DESCRPTION']; ?>
                       <a href="deny.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>&sid=<?php echo $data['NOTIFICATION_SENDER_ID'];?>&type=<?php echo $data['NOTIFICATION_SENDER_TYPE']; ?>"><button class="btn btn-sm btn-outline-danger float-right ml-2 mb-2"><i class="fa fa-times"></i> Deny</button></a>
                       <a href="apply.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>&sid=<?php echo $data['NOTIFICATION_SENDER_ID'];?>&type=<?php echo $data['NOTIFICATION_SENDER_TYPE']; ?>"><button class="btn btn-sm btn-outline-success float-right mb-2"><i class="fa fa-check"></i> Allow</button></a></p>
                       <hr style="justify-content: center;border-top: 0.2px solid #6c757d">
                    </div>
                  </div>
                </li>
                <?php
                }
                ?>
                <li class="">
                  <div class="media">
                   <div class="position-relative">
                    <img class="img-fluid mr-15 avatar-small" src="images/team/01.jpg" alt="">
                    <i class="avatar-online bg-success"></i>
                   </div> 
                    <div class="media-body">
                       <h6 class="mt-0">Username <small class="float-right">6 days ago</small></h6>
                       <p>Description.....................................................
                       <a href="#"><button class="btn btn-sm btn-outline-warning float-right"><i class="fa fa-sign-in"></i> Clear</button></a></p>
                    </div>
                  </div>
                </li>
              </ul>
             </div>
            </div>
          </div>
        </div>
      <!-- <div class="row account-overview mb-30">
       <div class="col-12">
        <div class="card card-statistics h-100">
         <div class="card-body bg-dark">
           <h5 class="card-title">Account overview</h5>
            <div class="row">
              <div class="col-xl-3 col-sm-6">
               <div class="row">
                  <div class="col-md-7 col-sm-7 col-7 align-self-center">
                    <span>Percentage Up</span>
                    <h4 class="text-danger fw-6 mt-10">655 Share</h4>
                  </div>
                  <div class="col-md-5 col-sm-5 col-5 align-self-center text-right">
                   <span class="round-chart mb-0" data-percent="87" data-size="80" data-width="4" data-color="#dc3545"> <span class="percent"></span> </span>
                </div>
              </div>
            </div>  
            <div class="col-xl-3 col-sm-6">
               <div class="row">
                  <div class="col-md-7 col-sm-7 col-7 align-self-center">
                    <span>Percentage Down</span>
                    <h4 class="text-success fw-6 mt-10">460 Share</h4>
                  </div>
                  <div class="col-md-5 col-sm-5 col-5 align-self-center text-right">
                   <span class="round-chart mb-0" data-percent="77" data-size="80" data-width="4" data-color="#28a745"> <span class="percent"></span> </span>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-sm-6">
             <div class="row">
                <div class="col-md-7 col-sm-7 col-7 align-self-center">
                  <span>Increase Amount</span>
                  <h4 class="text-info fw-6 mt-10">$560 total</h4>
                </div>
                <div class="col-md-5 col-sm-5 col-5 align-self-center text-right">
                 <span class="round-chart mb-0" data-percent="56" data-size="80" data-width="4" data-color="#17a2b8"> <span class="percent"></span> </span>
                </div>
             </div>
            </div>
            <div class="col-xl-3 col-sm-6">
             <div class="row">
                <div class="col-md-7 col-sm-7 col-7 align-self-center">
                  <span>New user each day</span>
                  <h4 class="text-warning fw-6 mt-10">5,546</h4>
                </div>
                <div class="col-md-5 col-sm-5 col-5 align-self-center text-right">
                 <span class="round-chart mb-0" data-percent="80" data-size="80" data-width="4" data-color="#ffc107"> <span class="percent"></span> </span>
                </div>
             </div>
           </div>
           </div>
          </div>
        </div>
        </div>
      </div> -->
      <!-- <div class="row">
        <div class="col-xl-4 h-100">
           <div class="card card-statistics mb-30">
             <div class="card-body p-0">
                <div class="bg-success">
                <div class="d-flex justify-content-between p-3">
                    <div class="d-block">
                      <h5 class="text-white">Market up</h5>
                    </div>
                    <div class="d-flex">
                      <i class="mr-10 text-white fa fa-arrow-up"> </i>
                       <h5 class="text-white"><b>463</b></h5>
                    </div>
                   </div>
                  <div id="sparkline7-1" class="text-center"></div>
               </div>
               </div>
           </div>
           <div class="card card-statistics mb-30">
             <div class="card-body p-0">
                <div class="bg-danger">
                <div class="d-flex justify-content-between p-3">
                    <div class="d-block">
                      <h5 class="text-white">Market down </h5>
                    </div>
                    <div class="d-flex">
                      <i class="mr-10 text-white fa fa-arrow-down"> </i>
                       <h5 class="text-white"><b>466</b></h5>
                    </div>
                   </div>
                  <div id="sparkline8-1" class="text-center"></div>
               </div>
               </div>
           </div>
        </div>
        <div class="col-xl-4 mb-30">
           <div class="card card-statistics h-100">
             <div class="card-body">
              <h5 class="card-title">Best Selling Items</h5>
               <ul class="list-unstyled">
                <li class="mb-20">
                  <div class="media">
                   <div class="position-relative">
                    <img class="img-fluid mr-15 avatar-small" src="images/item/01.png" alt="">
                   </div> 
                    <div class="media-body">
                       <h6 class="mt-0 mb-0">Car dealer <span class="float-right text-danger"> 8,561</span>  </h6>
                       <p>Automotive WordPress Theme </p>
                    </div>
                  </div>
                  <div class="divider dotted mt-20"></div>
                </li>
                <li class="mb-20">
                  <div class="media">
                   <div class="position-relative clearfix">
                    <img class="img-fluid mr-15 avatar-small" src="images/item/02.png" alt="">
                   </div> 
                    <div class="media-body">
                       <h6 class="mt-0 mb-0">Webster  <span class="float-right text-warning"> 6,213</span>  </h6>
                       <p>Multi-purpose HTML5 Template </p>
                    </div>
                  </div>
                  <div class="divider dotted mt-20"></div>
                </li>
                <li class="mb-20">
                  <div class="media">
                   <div class="position-relative clearfix">
                    <img class="img-fluid mr-15 avatar-small" src="images/item/04.png" alt="">
                   </div> 
                    <div class="media-body">
                       <h6 class="mt-0 mb-0">Sam Martin  <span class="float-right text-warning"> 6,213</span>  </h6>
                       <p>Personal vCard Resume WordPress Theme </p>
                    </div>
                  </div>
                  <div class="divider dotted mt-20"></div>
                </li>
                <li>
                  <div class="media">
                   <div class="position-relative">
                      <img class="img-fluid mr-15 avatar-small" src="images/item/03.png" alt="">
                   </div> 
                    <div class="media-body">
                       <h6 class="mt-0 mb-0">The corps  <span class="float-right text-success"> 2,926</span>  </h6>
                       <p> Multi-Purpose WordPress Theme </p>
                    </div>
                  </div>
                </li>
              </ul>
             </div>
           </div>
        </div>
        <div class="col-xl-4 mb-30">
           <div class="card card-statistics h-100">
             <div class="card-body">
              <h5 class="card-title">Customer Feedback</h5>
              <div class="row">
                  <div class="col-md-6">
                      <div class="clearfix">
                       <p class="mb-10 float-left">Positive</p>
                       <i class="mb-10 text-success float-right fa fa-arrow-up"> </i>
                    </div>
                    <div class="progress progress-small">
                      <div class="skill2-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h5 class="mt-10 text-success">8501</h5>
                  </div>
                  <div class="col-md-6">
                     <div class="clearfix">
                       <p class="mb-10 float-left">Negative</p>
                       <i class="mb-10 text-danger float-right fa fa-arrow-down"> </i>
                    </div>
                    <div class="progress progress-small">
                      <div class="skill2-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h5 class="mt-10 text-danger">3251</h5>
                  </div>
               </div>
              <div id="morris-area" class="hide-axis" style="height: 320px;"></div>
             </div>
           </div>
        </div>
      </div> -->
       <!-- <div class="row">
         <div class="col-xl-4 mb-30">
          <div class="card data-usage h-100">
          <div class="card-body">
            <h5 class="card-title">Monthly Usage</h5>
            <div class="row d-flex align-items-center">
              <div class="col-sm-6">
                <span class="round-chart" data-percent="77" data-width="5" data-color="#84ba3f"> 
                  <span class="percent"></span>
                </span>
              </div>
              <div class="col-sm-6">
                <h2 class="theme-color font-weight-bold">70.45 GB</h2>
                <small>Current Plan</small>
                <h5 class="mt-2 text-dark">263 GB Per Month</h5></div>
            </div>
            <p><strong>Note:</strong> You can upgrade your existing Premium Plan to a plan with more features, or a longer subscription period.</p>
          </div>
        </div> -->
        </div>
        <!-- <div class="col-xl-4 mb-30">
         <div class="card card-statistics h-100">
            <div class="card-body text-left">
               <h5 class="card-title">Members Activity</h5>
                <div class="row">
                  <div class="col-6 col-sm-6 mb-30">
                    <div class="counter">
                      <span class="timer text-success" data-to="4905" data-speed="10000">4905</span>
                      <label class="text-capitalize mt-0">New submissions </label>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mb-30">
                    <div class="counter">
                      <span class="timer text-info" data-to="6524" data-speed="10000">6524</span>
                      <label class="text-capitalize mt-0">New contacts</label>
                    </div>
                  </div>
                </div>
                <div class="divider"></div>
                <div class="row">
                  <div class="col-6 col-sm-4 mt-30">
                     <b>Daily visitors</b>
                     <p>465</p>
                  </div>
                  <div class="col-6 col-sm-4 mt-30">
                    <b>Active</b>
                     <p>9524</p>
                  </div>
                  <div class="col-6 col-sm-4 mt-30">
                    <b>Inactive</b>
                     <p>1283</p>
                  </div>
                </div>
             </div>
          </div>
        </div> -->
        <!-- <div class="col-xl-4 mb-30">
          <div class="card card-statistics h-100">
            <div class="p-4 text-center bg" style="background: url(images/bg/01.jpg);">
               <h5 class="mb-60 text-white position-relative">Michael Bean </h5>
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-primary ti-files"></i> Add task</a>
                  <a class="dropdown-item" href="#"><i class="text-dark ti-pencil-alt"></i> Edit Profile</a>
                  <a class="dropdown-item" href="#"><i class="text-success ti-user"></i> View Profile</a>
                  <a class="dropdown-item" href="#"><i class="text-secondary ti-info"></i> Contact Info</a>
                </div>
              </div>
            </div>
            <div class="card-body text-center position-relative">
              <div class="avatar-top">
                <img class="img-fluid w-25 rounded-circle " src="images/team/13.jpg" alt="">
               </div>
               <div class="row">
                  <div class="col-6 col-sm-4 mt-30">
                     <b>Files Saved</b>
                     <h4 class="text-success mt-10">1582</h4>
                  </div>
                  <div class="col-6 col-sm-4 mt-30">
                    <b>Memory Used </b>
                     <h4 class="text-danger mt-10">58GB</h4>
                  </div>
                  <div class="col-12 col-sm-4 mt-30">
                    <b>Spent Money</b>
                     <h4 class="text-warning mt-10">352,6$</h4>
                  </div>
                </div>
             </div>
          </div>
        </div> -->
      </div>
      <!-- <div class="row">
        <div class="col-xl-8 mb-30">
          <div class="card card-statistics h-100">
           <div class="card-body">
             <h5 class="mb-15 pb-0 border-0 card-title">Last Billings </h5>
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-files"></i> Approved</a>
                  <a class="dropdown-item" href="#"><i class="text-warning ti-pencil-alt"></i> Pending</a>
                  <a class="dropdown-item" href="#"><i class="text-danger ti-user"></i> Rejected</a>
                  <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i> Refresh</a>
                </div>
              </div>
              <div class="table-responsive">
              <table class="table center-aligned-table mb-10">
                <thead>
                  <tr class="text-dark">
                    <th>Order No</th>
                    <th>Product Name</th>
                    <th>Purchased On</th>
                    <th>Shipping Status</th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><i class="fa fa-circle text-success"></i></td>
                    <td>Iphone 7</td>
                    <td>12 May 2017</td>
                    <td>Dispatched</td>
                    <td>Credit card</td>
                    <td><label class="badge badge-warning">Pending</label></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-circle text-info"></i></td>
                    <td>Galaxy S8</td>
                    <td>15 May 2017</td>
                    <td>Dispatched</td>
                    <td>Internet banking</td>
                    <td><label class="badge badge-warning">Pending</label></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-circle text-warning"></i></td>
                    <td>Amazon Echo</td>
                    <td>17 May 2017</td>
                    <td>Dispatched</td>
                    <td>Credit card</td>
                    <td><label class="badge badge-success">Approved</label></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-circle text-danger"></i></td>
                    <td>Google Pixel</td>
                    <td>17 May 2017</td>
                    <td>Dispatched</td>
                    <td>Cash on delivery</td>
                    <td><label class="badge badge-danger">Rejected</label></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-circle text-dark"></i></td>
                    <td>Mac Mini</td>
                    <td>19 May 2017</td>
                    <td>Dispatched</td>
                    <td>Debit card</td>
                    <td><label class="badge badge-success">Approved</label></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-circle text-info"></i></td>
                    <td>Galaxy S9</td>
                    <td>26 May 2017</td>
                    <td>Dispatched</td>
                    <td>Internet banking</td>
                    <td><label class="badge badge-warning">Pending</label></td>
                  </tr>
                </tbody>
              </table>
            </div>
           </div>
          </div>
        </div>
        <div class="col-xl-4 mb-30">
         <div class="card card-statistics h-100 admin-followers">
           <div class="card-body">
             <h5 class="card-title">Followers </h5>
             <div class="scrollbar max-h-350">
              <ul class="list-unstyled">
                <li class="mb-30">
                  <div class="media">
                   <div class="position-relative">
                    <img class="img-fluid mr-15 avatar-small" src="images/team/05.jpg" alt="">
                    <i class="avatar-online bg-success"></i>
                   </div> 
                    <div class="media-body">
                       <div>
                          <a class="button button-border gray small border float-right" href="#">Follow</a>
                       </div> 
                       <h6 class="mt-0 text-info">Martin smith </h6>
                       <p>@potenzauser</p>
                    </div>
                  </div>
                  <div class="divider mt-30"></div>
                </li>
                <li class="mb-30">
                  <div class="media">
                   <div class="position-relative clearfix">
                    <img class="img-fluid mr-15 avatar-small" src="images/team/02.jpg" alt="">
                    <i class="avatar-online bg-success"></i>
                   </div> 
                    <div class="media-body">
                       <div>
                          <a class="button button-border gray small border float-right" href="#">Follow</a>
                       </div> 
                       <h6 class="mt-0 text-warning">Paul Flavius </h6>
                       <p>@potenzauser</p>
                    </div>
                  </div>
                  <div class="divider mt-30"></div>
                </li>
                <li class="mb-30">
                  <div class="media">
                   <div class="position-relative">
                      <img class="img-fluid mr-15 avatar-small" src="images/team/03.jpg" alt="">
                      <i class="avatar-online bg-danger"></i>
                   </div> 
                    <div class="media-body">
                       <div>
                          <a class="button gray small border float-right" href="#">Following <i class="fa fa-check"></i></a>
                       </div> 
                       <h6 class="mt-0 text-danger">Anne Smith</h6>
                       <p>@potenzauser</p>
                    </div>
                  </div>
                  <div class="divider mt-30"></div>
                </li>
                <li class="mb-30">
                  <div class="media">
                   <div class="position-relative">
                      <img class="img-fluid mr-15 avatar-small" src="images/team/04.jpg" alt="">
                      <i class="avatar-online bg-success"></i>
                   </div> 
                    <div class="media-body">
                       <div>
                          <a class="button button-border gray small border float-right" href="#">Follow</a>
                       </div> 
                       <h6 class="mt-0 text-info">Sara Lisbon </h6>
                       <p>@potenzauser</p>
                    </div>
                  </div>
                </li>
              </ul>
             </div>
            </div>
          </div>
        </div>
      </div> -->
     
<!--=================================
 wrapper -->
<?php 
  include('footer.php');
?>      
