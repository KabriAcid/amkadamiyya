<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 pt-1 fixed-start ms-3 " id="sidenav-main">
   <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="admin-dashboard.php">
         <img src="../../assets/favicon/favicon.png" class="rounded shadow-lg navbar-brand-img h-100" alt="main_logo">
         <span class="ms-1 font-weight-bold">Amkadamiyya</span>
      </a>
   </div>
   <hr class="horizontal dark mt-0">
   <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
         <!-- Dashboard -->
         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#dashboardMenu" class="nav-link 
               <?php
               if (basename($_SERVER['PHP_SELF']) == 'admin-dashboard.php' || basename($_SERVER['PHP_SELF']) == 'admin-profile.php' || basename($_SERVER['PHP_SELF']) == 'admin-edit-profile.php') {
                  echo "active";
               }
               ?>" aria-controls="dashboardMenu" role="button" aria-expanded="false">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                  <svg class="text-dark" width="16px" height="16px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                     <title>shop </title>
                     <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Rounded-Icons" transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                           <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                              <g id="shop-" transform="translate(0.000000, 148.000000)">
                                 <path class="color-background" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" id="Path" opacity="0.598981585"></path>
                                 <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z" id="Path"></path>
                              </g>
                           </g>
                        </g>
                     </g>
                  </svg>
               </div>
               <span class="nav-link-text ms-1">Dashboard</span>
            </a>
            <div class="collapse " id="dashboardMenu">
               <ul class="nav ms-4 ps-3">
                  <li class="nav-item">
                     <a class="nav-link" href="admin-dashboard.php">
                        <span class="sidenav-normal"> My Dashboard </span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="admin-profile.php">
                        <span class="sidenav-normal"> My Profile </span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="admin-edit-profile.php">
                        <span class="sidenav-normal"> Edit Profile </span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>

         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#studentsMenu" class="nav-link 
            <?php
            if (basename($_SERVER['PHP_SELF']) == 'admin-student-list.php' || basename($_SERVER['PHP_SELF']) == 'admin-new-student.php') {
               echo "active";
            }
            ?>" aria-controls="studentsMenu" role="button" aria-expanded="false">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="22px" height="22px">
                     <path class="color-background" d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" opacity="0.598981585" />
                  </svg>
               </div>
               <span class="nav-link-text ms-1">Students</span>
            </a>
            <div class="collapse " id="studentsMenu">
               <ul class="nav ms-4 ps-3">
                  <li class="nav-item">
                     <a class="nav-link" href="admin-student-list.php">
                        <span class="sidenav-normal"> Student's List </span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="admin-new-student.php">
                        <span class="sidenav-normal"> Add Student </span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>

         <!-- Staff -->
         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#staffMenu" class="nav-link 
               <?php
               if (basename($_SERVER['PHP_SELF']) == 'admin-staff-list.php' || basename($_SERVER['PHP_SELF']) == 'admin-new-staff.php') {
                  echo "active";
               }
               ?>" aria-controls="staffMenu" role="button" aria-expanded="false">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                  <i class="ni ni-circle-08
                  <?php
                  if (basename($_SERVER['PHP_SELF']) == 'admin-staff-list.php' || basename($_SERVER['PHP_SELF']) == 'admin-new-staff.php') {
                     echo 'text-white';
                  } else {
                     echo 'text-dark';
                  }
                  ?>" style="font-size: 12px;"></i>
               </div>
               <span class="nav-link-text ms-1">Staff</span>
            </a>
            <div class="collapse " id="staffMenu">
               <ul class="nav ms-4 ps-3">
                  <li class="nav-item">
                     <a class="nav-link" href="admin-staff-list.php">
                        <span class="sidenav-normal"> Staff List </span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="admin-new-staff.php">
                        <span class="sidenav-normal"> Add Staff </span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>

         <!-- Alumni -->
         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#alumniMenu" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin-alumni-list.php' || basename($_SERVER['PHP_SELF']) == 'admin-new-alumni.php' ? 'active' : '' ?>" role="button">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                  <i class="fa fa-graduation-cap
                  <?php
                  if (basename($_SERVER['PHP_SELF']) == 'admin-new-alumni.php' || basename($_SERVER['PHP_SELF']) == 'admin-alumni-list.php') {
                     echo 'text-white';
                  } else {
                     echo 'text-dark';
                  }
                  ?>" style="font-size: 12px;"></i>
               </div>
               <span class="nav-link-text ms-1">Alumni</span>
            </a>
            <div class="collapse" id="alumniMenu">
               <ul class="nav ms-4 ps-3">
                  <li class="nav-item">
                     <a class="nav-link" href="admin-alumni-list.php">
                        <span class="sidenav-normal"> Alumni List </span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="admin-new-alumni.php">
                        <span class="sidenav-normal"> Add Alumni </span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>

         <!--  Blog -->
         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#postsMenu" class="nav-link  
               <?php
               if (basename($_SERVER['PHP_SELF']) == 'admin-timeline.php' || basename($_SERVER['PHP_SELF']) == 'admin-new-post.php') {
                  echo "active";
               }
               ?>" aria-controls="postsMenu" role="button" aria-expanded="false">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                  <i class="ni ni-camera-compact
                  <?php
                  if (basename($_SERVER['PHP_SELF']) == 'admin-timeline.php' || basename($_SERVER['PHP_SELF']) == 'admin-new-post.php') {
                     echo 'text-white';
                  } else {
                     echo 'text-dark';
                  }
                  ?>" style="font-size: 12px;"></i>
               </div>
               <span class="nav-link-text ms-1">Blogs</span>
            </a>
            <div class="collapse " id="postsMenu">
               <ul class="nav ms-4 ps-3">
                  <li class="nav-item">
                     <a class="nav-link" href="admin-timeline.php">
                        <span class="sidenav-normal"> Timeline </span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="admin-new-post.php">
                        <span class="sidenav-normal"> New Post </span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>

         <!--  -->
         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sessionMenu" class="nav-link 
            <?php
            if (basename($_SERVER['PHP_SELF']) == 'admin-edit-session.php') {
               echo "active";
            }
            ?>" aria-controls="sessionMenu" role="button" aria-expanded="false">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                  <i class="ni ni-calendar-grid-58 
                  <?php
                  if (basename($_SERVER['PHP_SELF']) == 'admin-edit-session.php') {
                     echo 'text-white';
                  } else {
                     echo 'text-dark';
                  }
                  ?>" style="font-size: 12px;"></i>
               </div>
               <span class="nav-link-text ms-1">Sessions</span>
            </a>
            <div class="collapse " id="sessionMenu">
               <ul class="nav ms-4 ps-3">
                  <li class="nav-item">
                     <a class="nav-link" href="admin-edit-session.php">
                        <span class="sidenav-normal"> Edit Sessions </span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <!-- Subjects -->
         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#subjectsMenu" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin-add-subject.php' ? 'active' : '' ?>" role="button">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                  <i class="ni ni-single-copy-04
                  <?php
                  if (basename($_SERVER['PHP_SELF']) == 'admin-add-subject.php' || basename($_SERVER['PHP_SELF']) == 'remove-subject.php') {
                     echo 'text-white';
                  } else {
                     echo 'text-dark';
                  }
                  ?>" style="font-size: 12px;"></i>
               </div>
               <span class="nav-link-text ms-1">Subjects</span>
            </a>
            <div class="collapse" id="subjectsMenu">
               <ul class="nav ms-4 ps-3">
                  <li class="nav-item">
                     <a class="nav-link" href="admin-add-subject.php">
                        <span class="sidenav-normal"> Add Subject </span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <!--  -->
         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#resultsMenu" class="nav-link 
            <?php
            if (basename($_SERVER['PHP_SELF']) == 'admin-choose-subject.php' || basename($_SERVER['PHP_SELF']) == 'admin-view-results.php') {
               echo "active";
            }
            ?>" aria-controls="resultsMenu" role="button" aria-expanded="false">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2">
                  <i class="ni ni-archive-2
                  <?php
                  if (basename($_SERVER['PHP_SELF']) == 'admin-choose-subject.php' || basename($_SERVER['PHP_SELF']) == 'admin-view-results.php') {
                     echo 'text-white';
                  } else {
                     echo 'text-dark';
                  }
                  ?>" style="font-size: 12px;"></i>
               </div>
               <span class="nav-link-text ms-1">Results</span>
            </a>
            <div class="collapse " id="resultsMenu">
               <ul class="nav ms-4 ps-3">
                  <li class="nav-item">
                     <a class="nav-link" href="admin-choose-subject.php">
                        <span class="sidenav-normal"> Upload Results </span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="admin-view-results.php">
                        <span class="sidenav-normal"> View Results </span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <!--  -->
         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#paymentsMenu" class="nav-link 
            <?php
            if (basename($_SERVER['PHP_SELF']) == 'admin-invoices.php' || basename($_SERVER['PHP_SELF']) == 'admin-verify-payment.php') {
               echo "active";
            }
            ?>" aria-controls="paymentsMenu" role="button" aria-expanded="false">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                  <i class="ni ni-credit-card 
                  <?php
                  if (basename($_SERVER['PHP_SELF']) == 'admin-invoices.php' || basename($_SERVER['PHP_SELF']) == 'admin-verify-payment.php') {
                     echo 'text-white';
                  } else {
                     echo 'text-dark';
                  }
                  ?>" style="font-size: 12px;"></i>
               </div>
               <span class="nav-link-text ms-1">Payments</span>
            </a>
            <div class="collapse " id="paymentsMenu">
               <ul class="nav ms-4 ps-3">
                  <li class="nav-item">
                     <a class="nav-link" href="admin-invoices.php">
                        <span class="sidenav-normal"> Invoices </span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="admin-verify-payment.php">
                        <span class="sidenav-normal"> Verify Payments </span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#applicantMenu" class="nav-link 
            <?php
            if (basename($_SERVER['PHP_SELF']) == 'admin-new-applicant.php' || basename($_SERVER['PHP_SELF']) == 'admin-view-applicant.php' || basename($_SERVER['PHP_SELF']) == 'admin-search-application.php') {
               echo "active";
            }
            ?>" aria-controls="applicantMenu" role="button" aria-expanded="false">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                  <i class="ni ni-single-02 
                  <?php
                  if (basename($_SERVER['PHP_SELF']) == 'admin-new-applicant.php' || basename($_SERVER['PHP_SELF']) == 'admin-view-applicant.php' || basename($_SERVER['PHP_SELF']) == 'admin-search-application.php') {
                     echo 'text-white';
                  } else {
                     echo 'text-dark';
                  }
                  ?>" style="font-size: 12px;"></i>
               </div>
               <span class="nav-link-text ms-1">Applicants</span>
            </a>
            <div class="collapse " id="applicantMenu">
               <ul class="nav ms-4 ps-3">
                  <li class="nav-item">
                     <a class="nav-link" href="admin-new-applicant.php">
                        <span class="sidenav-normal"> New Applicants </span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="admin-search-application.php">
                        <span class="sidenav-normal"> Search Application Code </span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <!-- Notifications -->
         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#notificationMenu" class="nav-link 
            <?php
            if (basename($_SERVER['PHP_SELF']) == 'admin-view-notification.php') {
               echo "active";
            }
            ?>" aria-controls="notificationMenu" role="button" aria-expanded="false">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                  <i class="ni ni-notification-70
                  <?php
                  if (basename($_SERVER['PHP_SELF']) == 'admin-view-notification.php') {
                     echo 'text-white';
                  } else {
                     echo 'text-dark';
                  }
                  ?>" style="font-size: 12px;"></i>
               </div>
               <span class="nav-link-text ms-1">Notifications</span>
            </a>
            <div class="collapse " id="notificationMenu">
               <ul class="nav ms-4 ps-3">
                  <li class="nav-item">
                     <a class="nav-link" href="admin-general-alert.php">
                        <span class="sidenav-normal"> General Alerts </span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="admin-view-notification.php">
                        <span class="sidenav-normal"> View Notifications </span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <!-- Defaults -->
         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#settingsMenu" class="nav-link 
            <?php
            if (basename($_SERVER['PHP_SELF']) == 'admin-set-defaults.php' || basename($_SERVER['PHP_SELF']) == 'admin-general-settings.php') {
               echo "active";
            }
            ?>" aria-controls="settingsMenu" role="button" aria-expanded="false">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                  <i class="ni ni-settings
                  <?php
                  if (basename($_SERVER['PHP_SELF']) == 'admin-set-defaults.php' || basename($_SERVER['PHP_SELF']) == 'admin-general-settings.php') {
                     echo 'text-white';
                  } else {
                     echo 'text-dark';
                  }
                  ?>" style="font-size: 12px;"></i>
               </div>
               <span class="nav-link-text ms-1">Settings</span>
            </a>
            <div class="collapse " id="settingsMenu">
               <ul class="nav ms-4 ps-3">
                  <li class="nav-item">
                     <a class="nav-link" href="admin-set-defaults.php">
                        <span class="sidenav-normal"> Set Defaults </span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="admin-general-settings.php">
                        <span class="sidenav-normal"> General Settings </span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <!-- Line Breaker -->
         <li class="nav-item">
            <hr class="horizontal dark">
         </li>

         <!-- Logout -->
         <li class="nav-item">
            <a class="nav-link" href="admin-logout.php">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                  <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                     <title>spaceship</title>
                     <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Rounded-Icons" transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                           <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                              <g id="spaceship" transform="translate(4.000000, 301.000000)">
                                 <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                                 <path class="color-background" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z" id="Path"></path>
                                 <path class="color-background" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z" id="color-2" opacity="0.598539807"></path>
                                 <path class="color-background" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z" id="color-3" opacity="0.598539807"></path>
                              </g>
                           </g>
                        </g>
                     </g>
                  </svg>



               </div>
               <span class="nav-link-text ms-1">Logout</span>
            </a>
         </li>
      </ul>
   </div>
</aside>