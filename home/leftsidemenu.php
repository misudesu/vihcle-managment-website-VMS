<?php 
 $name= $_SESSION['adminname'];
 $type=$_SESSION['Aacct'];
?>
 <!-- ========== Left Sidebar Start ========== -->
 <div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="#" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="../home/assets/images/logo_uk.png" alt="" height="70">
        </span>
        <span class="logo-sm">
            <img src="../home/assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    
    <!-- LOGO -->
    <a href="../home/home.php" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/users/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/users/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        
            <!--- Sidemenu -->
               <!--- Sidemenu -->
               <ul class="side-nav">

                <li class="side-nav-title side-nav-item">Navigation</li>
                
                <li class="side-nav-item">
                    <a href="../home/home.php" class="side-nav-link">
                        <i class="fas fa-house-user"></i>
                        <span> Home </span>
                    </a>
                </li>


                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                        <i class="fas fa-stopwatch"></i>
                        <span class="badge bg-success float-end">4</span>
                        <span> Reminder</span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../calander/addcalanderEvent.php">Add Reminder</a>
                            </li>
                   </ul>
                    </div>
                </li>


                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                        <i class="fas fa-car"></i>
                        <span> Vehicles </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../vehicle/addvehicle.php">Add Vehicle </a>
                            </li>
                            
                            <li>
                                <a href="../vehicle/vehicle.php">All Vehicles </a>
                            </li>
                            <li>
                    
                                
                                <!-------------------------------------->
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="fas fa-users"></i>                    
                     <span>Drivers </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPages">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../driver/driver.php">Add driver Members </a>
                            </li>
                            <li>
                                <a href="../driver/alldriver.php">All driver </a>
                            </li>
                            <li>
                                
                            </li>
                            
                            <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarPagesError" aria-expanded="false" aria-controls="sidebarPagesError">
                                    <span> Driver id  </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarPagesError">
                                    <ul class="side-nav-third-level">
                                        <li>
                                        <a href="../driverid/idcard.php">Driver id card</a>
                                    </li>
             
                                    </ul>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                        

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarreport" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="fas fa-scroll"></i>                      
                      <span> Report </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarreport">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../report/report.php">View report</a>
                            </li>
                            
                            <li>
                                <a href="../proreport/proview.php">View problem report  </a>
                            </li>
                           
                            <li>
                    
                                
                                <!-------------------------------------->
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                        <i class="fas fa-gas-pump"></i>
                        <span> Fuel Control </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="side-nav-second-level">

                            <li>
                                <a href="../full/make_invoice.php">Fuel control system  </a>
                            </li>
                            <li>
                                <a href="../full/Fullhome.php">Fuel History</a>
                            </li>
                            
                           
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                        <i class="fas fa-suitcase-rolling"></i>
                        <span> Trip entry </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProjects">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../trip/alltrip.php"> All trip </a>
                            </li>

                            <li>
                                <a href="../trip/addtrip.php">  Trip sheet entry </a>
                            </li>

                            <li>
                                <a href="../trip/addtravl.php"> Add Trip file </a>
                            </li>

                            <li>
                                  <a href="../trip/alltravl.php"> view all trip file </a>
                            </li>
                          
                                
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarmonthly" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                        <i class="fas fa-suitcase-rolling"></i>
                        <span> Monthly trip </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarmonthly">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../monthly/alltrip.php">All monthly trip</a>
                            </li>
                            <li>
                                <a href="../monthly/addsheet.php">Add sheet entry</a>
                            </li>
                            <li>                           
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarorg" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="fas fa-wrench"></i>
                        <span> Org Account </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarorg">
                        <ul class="side-nav-second-level">

                            <li>
                                <a href="../org/addaccount.php">Create Account</a>
                            </li>
                            <li>
                                <a href="../org/viewdoc.php">View files</a>

                            </li>
                            <li>
                                <a href="../org/viewreport.php">View report</a>

                            </li>
                            <li>                           
                        </ul>
                    </div>
                </li>
                
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                        <i class="fas fa-tasks"></i>
                        <span> Manage System </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTasks">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../document/addmegazin.php"> add megazin </a>
                            </li>
                            <?php 
                           if($type=="Admin"){
                               ?>
                            <li>
                                <a href="../mangeAccount/allusers.php">All User </a>
                            </li>
                            <?php 
                           }else{
                              
                          
                           }
                           ?>
                            <li>
                                <a href="../document/viewmegazin.php">Megazin </a>
                            </li>
                            <li>
                                <a href="../publisher/publisher.php"> publisher </a>
                            </li>
                            <li>
                                <a href="../alart/alart.php"> Alart </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
              
                
               

                <li class="side-nav-item">
                    <a href="../home/logout.php" class="side-nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <span> Log out </span>
                    </a>
                
    
            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->