<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="dashboard-projects.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo_uk.png" alt="" height="70">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    
    <!-- LOGO -->
    <a href="../home/home.php" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        
            <!--- Sidemenu -->
               <!--- Sidemenu -->
               <ul class="side-nav">

                <li class="side-nav-title side-nav-item" style="font-size: 15px;">Navigation</li>
                
                <li class="side-nav-item">
                    <a href="../home/home.php" class="side-nav-link">
                        <i class="fas fa-house-user"></i>
                        <span style="font-size: 15px;"> Home </span>
                    </a>
                </li>


                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                        <i class="fas fa-stopwatch"></i>
                        <span class="badge bg-success float-end">4</span>
                        <span style="font-size: 15px;"> Reminder</span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../calander/index.php" style="font-size: 15px;">Add Reminder</a>
                            </li>
                   </ul>
                    </div>
                </li>


                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                        <i class="fas fa-car"></i>
                        <span style="font-size: 15px;"> Vehicles </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../vehicle/addvehicle.php" style="font-size: 15px;">Add Vehicle </a>
                            </li>
                            
                            <li>
                                <a href="../vehicle/vehicle.php" style="font-size: 15px;">All Vehicles </a>
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
                     <span style="font-size: 15px;">Drivers </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPages">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../driver/driver.php" style="font-size: 15px;">Add driver Members </a>
                            </li>
                            <li>
                                <a href="../driver/alldriver.php" style="font-size: 15px;">All driver </a>
                            </li>
                            <li>
                                
                            </li>
                            <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarPagesError" aria-expanded="false" aria-controls="sidebarPagesError">
                                    <span style="font-size: 15px;"> driver id  </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarPagesError">
                                    <ul class="side-nav-third-level">
                                        <li>
                                        <a href="../driverid/idcard.php" style="font-size: 15px;">driver id card</a>
                                    </li>
                                    <li>
                                    <a  data-toggle='modal' data-id='' href='#Useradd' class='open-adduser' style="font-size: 15px;"><i class="fa fa-user"></i>Add driver id card</a>
                                     
                                    </li>
                                    
                                  

                                    <li>
                                    <a data-toggle='modal' href="#Taxreceipted" class="Open-Taxreceipted" style="font-size: 15px;"><i class='fa fa-print'></i>Bulk printing</a>
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
                      <span style="font-size: 15px;"> Report </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarreport">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../report/report.php" style="font-size: 15px;">View report</a>
                            </li>
                           
                    
                                
                                <!-------------------------------------->
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                        <i class="fas fa-gas-pump"></i>
                        <span style="font-size: 15px;"> Fuel Control </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="side-nav-second-level">

                            <li>
                                <a href="../full/make_invoice.php" style="font-size: 15px;">Fuel control system  </a>
                            </li>
                            <li>
                                <a href="../full/Fullhome.php" style="font-size: 15px;">Fuel History</a>
                            </li>
                            
                           
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                        <i class="fas fa-suitcase-rolling"></i>
                        <span style="font-size: 15px;"> Trip entry </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProjects">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../trip/alltrip.php" style="font-size: 15px;">All trip</a>
                            </li>
                            <li>
                                <a href="../trip/addtrip.php" style="font-size: 15px;">Trip sheet entry</a>
                            </li>
                            <li>
                                
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarmonthly" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                        <i class="fas fa-suitcase-rolling"></i>
                        <span style="font-size: 15px;"> Monthly trip </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarmonthly">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../monthly/alltrip.php" style="font-size: 15px;">All monthly trip</a>
                            </li>
                            <li>
                                <a href="../monthly/addsheet.php" style="font-size: 15px;">Add sheet entry</a>
                            </li>
                            <li>                           
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarorg" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="fas fa-wrench"></i>
                        <span style="font-size: 15px;"> Org Account </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarorg">
                        <ul class="side-nav-second-level">

                            <li>
                                <a href="../org/addaccount.php" style="font-size: 15px;">Create Account</a>
                            </li>
                            <li>
                                <a href="../org/viewreport.php" style="font-size: 15px;">View Report</a>

                            </li>
                            <li>                           
                        </ul>
                    </div>
                </li>
                
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                        <i class="fas fa-tasks"></i>
                        <span style="font-size: 15px;"> Manage System </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTasks">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="../document/viewmegazin.php" style="font-size: 15px;">View daily report </a>
                            </li>
                            
                            <li>
                                <a href="../proreport/proview.php" style="font-size: 15px;">View problem report  </a>
                            </li>
                            <li>
                                <a href="../mangeAccount/allusers.php" style="font-size: 15px;">All User </a>
                            </li>
                            <li>
                                <a href="../document/viewmegazin.php" style="font-size: 15px;">Megazin </a>
                            </li>
                        </ul>
                    </div>
                </li>          
                <li class="side-nav-item">
                    <a href="../home/logout.php" class="side-nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <span style="font-size: 15px;"> Log out </span>
                    </a>     
                
                
               
                
              

              
                
    
            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->