<?php
session_start();
include("include/config.php");

$pointssql = "SELECT * FROM user_details WHERE first_name = '" . $_SESSION['first_name'] . "'";
$result = mysqli_query($conn, $pointssql) or die("Data retrieval error");
$row = mysqli_fetch_assoc($result);
$rate = $row['Rating'];

 
$monthdataPoints = array(
	array("label"=> "January", "y"=> 145),
	array("label"=> "February", "y"=> 245),
	array("label"=> "March", "y"=> 34),
	array("label"=> "April", "y"=> 122),
	array("label"=> "May", "y"=> 76),
	array("label"=> "June", "y"=> 89),
	array("label"=> "July", "y"=> 323),
	array("label"=> "August", "y"=> 149),
	array("label"=> "September", "y"=> 22),
	array("label"=> "October", "y"=> 28)
);
$yeardataPoints = array(
	array("label"=> "Monday", "y"=> 3),
	array("label"=> "Tuesday", "y"=> 5),
  array("label"=> "Wednesday", "y"=> 1),
	array("label"=> "Thursday", "y"=> 4),
  array("label"=> "Friday", "y"=> 3),
  array("label"=> "Saturday", "y"=> 3),
  array("label"=> "Sunday", "y"=> 3),
);

$_SESSION['Rating']=$rate;
$split_roll_number = explode('.', $_SESSION['roll_number']);
$dept = substr($split_roll_number[2], 2,3);
$temp = substr($split_roll_number[2],7,1);
switch($temp){
  case "0":
    $section = "A";
    break;
  case "1":
    $section = "B";
    break;
  case "2":
    $section = "C";
    break;
  case "3":
    $section = "D";
    break;
  case "4":
    $section = "E";
    break;
  case "6":
    $section = "F";
    break;
  default:
    echo "Invalid section";
}

$pfp_query = "select profile_pic_link from pfp_details where roll_number = '" . $_SESSION['roll_number'] . "'";
$pfp = mysqli_query($conn, $pfp_query)->fetch_array()['profile_pic_link'] ?? '';
// $pfp = 'public\playground_assets\shankar_linkedin_pic.jpg';
?>
<html lang="en">
  <head>
  <script>
    // var month = document.getElementById('b1');
    // var year = document.getElementById('b2');
    window.onload = function() {
                  var chart1 = new CanvasJS.Chart("Monthchart", {
	                animationEnabled: true,
	                theme: "light2", // "light1", "light2", "dark1", "dark2"
	                title: {
		              text: "Ratings by month"
	                },
	                axisY: {
		                title: "Rating"
	                },
	                data: [{
		                type: "column",
		                dataPoints: <?php echo json_encode($monthdataPoints, JSON_NUMERIC_CHECK); ?>
	                }]
                  });
                  var chart = new CanvasJS.Chart("Yearchart", {
	                animationEnabled: true,
	                theme: "light2", // "light1", "light2", "dark1", "dark2"
	                title: {
		              text: "Ratings by Week"
	                },
	                axisY: {
		                title: "Rating"
	                },
	                data: [{
		                type: "column",
		                dataPoints: <?php echo json_encode($yeardataPoints, JSON_NUMERIC_CHECK); ?>
	                }]
                  });
                  chart1.render();
                    chart.render();
                }
    // month.onclick = function(){
    //   var chart = new CanvasJS.Chart("Monthchart", {
	  //               animationEnabled: true,
	  //               theme: "light2", // "light1", "light2", "dark1", "dark2"
	  //               title: {
		//               text: "Ratings by month"
	  //               },
	  //               axisY: {
		//                 title: "Rating"
	  //               },
	  //               data: [{
		//                 type: "column",
		                // dataPoints: 
	  //               }]
    //               });
    //                 chart.render();
    //             }
    // year.onclick = function(){
    //   var chart = new CanvasJS.Chart("Monthchart", {
	  //               animationEnabled: true,
	  //               theme: "light2", // "light1", "light2", "dark1", "dark2"
	  //               title: {
		//               text: "Ratings by year"
	  //               },
	  //               axisY: {
		//                 title: "Rating"
	  //               },
	  //               data: [{
		//                 type: "column",
		//                 dataPoints: 
	  //               }]
    //               });
    //                 chart.render();
    //             }
    </script>
    <title>S-StudentDashboardProfile - AQUA</title>
    <meta
      property="og:title"
      content="S-StudentDashboardProfile - AQUA"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Inter;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }
    </style>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&amp;display=swap"
      data-tag="font"
    />
    <!--This is the head section-->
    <!-- <style> ... </style> -->
    <style data-section-id="dropdown">
      [data-thq="thq-dropdown"]:hover > [data-thq="thq-dropdown-list"] {
          display: flex;
        }

        [data-thq="thq-dropdown"]:hover > div [data-thq="thq-dropdown-arrow"] {
          transform: rotate(90deg);
        }
    </style>
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
    <div>
      <script
        type="text/javascript"
        src="https://unpkg.com/dangerous-html@0.1.12/dist/default/lib.umd.js"

      ></script>
      <link href="./s-student-dashboard-profile.css" rel="stylesheet" />

      <div class="-student-dashboard-profile-container">
        <header
          data-thq="thq-navbar"
          class="-student-dashboard-profile-navbar-interactive"
        >
          <img
            alt="logo"
            src="public/playground_assets/aqua_logo_cropped-1500h.png"
            class="-student-dashboard-profile-logo"
          />
          <!-- <div
                data-thq="thq-dropdown-toggle"
                class="-student-dashboard-profile-dropdown-toggle"
              > -->
              <!-- <button id="contribute" class="contribute-button">Contribute</button>
              <script type="text/javascript">
                  document.getElementById("contribute").onclick = function () {
                  location.href = "contribute.php";
                  };
                </script> -->
              <!-- </div> -->
          <div
            data-thq="thq-navbar-nav"
            data-role="Nav"
            class="-student-dashboard-profile-desktop-menu"
          >
          <button id="contribute" class="contribute-button">Contribute</button>
              <script type="text/javascript">
                  document.getElementById("contribute").onclick = function () {
                  location.href = "contribute.php";
                  };
                </script>
            <div
              data-thq="thq-dropdown"
              class="-student-dashboard-profile-thq-dropdown list-item"
            >
              <div
                data-thq="thq-dropdown-toggle"
                class="-student-dashboard-profile-dropdown-toggle"
              >
                <span class="-student-dashboard-profile-text">
                <?php echo "Hi ".$_SESSION['first_name']; ?>
                </span>
                <img
                  alt=<?=$pfp?>
                  src=<?=$pfp?>
                  class="-student-dashboard-profile-image"
                />
              </div>
              <ul
                data-thq="thq-dropdown-list"
                class="-student-dashboard-profile-dropdown-list"
              >
                <li
                  data-thq="thq-dropdown"
                  class="-student-dashboard-profile-dropdown list-item"
                >
                  <a href="sf-change-password.php">
                    <div
                      data-thq="thq-dropdown-toggle"
                      class="-student-dashboard-profile-dropdown-toggle1"
                    >
                      <span class="-student-dashboard-profile-text01">
                        Change Password
                      </span>
                    </div>
                  </a>
                </li>
                <li
                  data-thq="thq-dropdown"
                  class="-student-dashboard-profile-dropdown1 list-item"
                >
                  <a href="s-student-dashboard-profile.php">
                    <div
                      data-thq="thq-dropdown-toggle"
                      class="-student-dashboard-profile-dropdown-toggle2"
                    >
                      <span class="-student-dashboard-profile-text02">
                        View Profile
                      </span>
                    </div>
                  </a>
                </li>
                <li
                  data-thq="thq-dropdown"
                  class="-student-dashboard-profile-dropdown2 list-item"
                >
                  <a href="sf-loginfacial.php">
                    <div
                      data-thq="thq-dropdown-toggle"
                      class="-student-dashboard-profile-dropdown-toggle3"
                    >
                      <span class="-student-dashboard-profile-text03">
                        Log Out
                      </span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div
            data-thq="thq-burger-menu"
            class="-student-dashboard-profile-burger-menu"
          >
            <svg
              viewBox="0 0 1024 1024"
              class="-student-dashboard-profile-icon"
            >
              <path
                d="M128 554.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 298.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 810.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667z"
              ></path>
            </svg>
          </div>
          <div
            data-thq="thq-mobile-menu"
            class="-student-dashboard-profile-mobile-menu"
          >
            <div class="-student-dashboard-profile-icon-group">
              <svg
                viewBox="0 0 950.8571428571428 1024"
                class="-student-dashboard-profile-icon2"
              >
                <path
                  d="M925.714 233.143c-25.143 36.571-56.571 69.143-92.571 95.429 0.571 8 0.571 16 0.571 24 0 244-185.714 525.143-525.143 525.143-104.571 0-201.714-30.286-283.429-82.857 14.857 1.714 29.143 2.286 44.571 2.286 86.286 0 165.714-29.143 229.143-78.857-81.143-1.714-149.143-54.857-172.571-128 11.429 1.714 22.857 2.857 34.857 2.857 16.571 0 33.143-2.286 48.571-6.286-84.571-17.143-148-91.429-148-181.143v-2.286c24.571 13.714 53.143 22.286 83.429 23.429-49.714-33.143-82.286-89.714-82.286-153.714 0-34.286 9.143-65.714 25.143-93.143 90.857 112 227.429 185.143 380.571 193.143-2.857-13.714-4.571-28-4.571-42.286 0-101.714 82.286-184.571 184.571-184.571 53.143 0 101.143 22.286 134.857 58.286 41.714-8 81.714-23.429 117.143-44.571-13.714 42.857-42.857 78.857-81.143 101.714 37.143-4 73.143-14.286 106.286-28.571z"
                ></path></svg
              ><svg
                viewBox="0 0 877.7142857142857 1024"
                class="-student-dashboard-profile-icon4"
              >
                <path
                  d="M585.143 512c0-80.571-65.714-146.286-146.286-146.286s-146.286 65.714-146.286 146.286 65.714 146.286 146.286 146.286 146.286-65.714 146.286-146.286zM664 512c0 124.571-100.571 225.143-225.143 225.143s-225.143-100.571-225.143-225.143 100.571-225.143 225.143-225.143 225.143 100.571 225.143 225.143zM725.714 277.714c0 29.143-23.429 52.571-52.571 52.571s-52.571-23.429-52.571-52.571 23.429-52.571 52.571-52.571 52.571 23.429 52.571 52.571zM438.857 152c-64 0-201.143-5.143-258.857 17.714-20 8-34.857 17.714-50.286 33.143s-25.143 30.286-33.143 50.286c-22.857 57.714-17.714 194.857-17.714 258.857s-5.143 201.143 17.714 258.857c8 20 17.714 34.857 33.143 50.286s30.286 25.143 50.286 33.143c57.714 22.857 194.857 17.714 258.857 17.714s201.143 5.143 258.857-17.714c20-8 34.857-17.714 50.286-33.143s25.143-30.286 33.143-50.286c22.857-57.714 17.714-194.857 17.714-258.857s5.143-201.143-17.714-258.857c-8-20-17.714-34.857-33.143-50.286s-30.286-25.143-50.286-33.143c-57.714-22.857-194.857-17.714-258.857-17.714zM877.714 512c0 60.571 0.571 120.571-2.857 181.143-3.429 70.286-19.429 132.571-70.857 184s-113.714 67.429-184 70.857c-60.571 3.429-120.571 2.857-181.143 2.857s-120.571 0.571-181.143-2.857c-70.286-3.429-132.571-19.429-184-70.857s-67.429-113.714-70.857-184c-3.429-60.571-2.857-120.571-2.857-181.143s-0.571-120.571 2.857-181.143c3.429-70.286 19.429-132.571 70.857-184s113.714-67.429 184-70.857c60.571-3.429 120.571-2.857 181.143-2.857s120.571-0.571 181.143 2.857c70.286 3.429 132.571 19.429 184 70.857s67.429 113.714 70.857 184c3.429 60.571 2.857 120.571 2.857 181.143z"
                ></path></svg
              ><svg
                viewBox="0 0 602.2582857142856 1024"
                class="-student-dashboard-profile-icon6"
              >
                <path
                  d="M548 6.857v150.857h-89.714c-70.286 0-83.429 33.714-83.429 82.286v108h167.429l-22.286 169.143h-145.143v433.714h-174.857v-433.714h-145.714v-169.143h145.714v-124.571c0-144.571 88.571-223.429 217.714-223.429 61.714 0 114.857 4.571 130.286 6.857z"
                ></path>
              </svg>
            </div>
          </div>
        </header>
        <div class="-student-dashboard-profile-container01">
          <div class="-student-dashboard-profile-container02">
            <span class="-student-dashboard-profile-text04">My Profile</span>
            <div class="-student-dashboard-profile-container03">
              <img
                alt="<?=$pfp?>"
                src=<?=$pfp?>
                class="-student-dashboard-profile-image1"
              />
              <div class="-student-dashboard-profile-container04">
                <div class="-student-dashboard-profile-container05">
                  <div class="-student-dashboard-profile-container06">
                    <div class="-student-dashboard-profile-container07">
                      <span class="-student-dashboard-profile-text05">
                        Name
                      </span>
                    </div>
                    <div class="-student-dashboard-profile-container08">
                      <span class="-student-dashboard-profile-text06">
                      <?php echo "".$_SESSION['first_name']." ".$_SESSION['last_name']; ?>
                      </span>
                    </div>
                  </div>
                  <div class="-student-dashboard-profile-container09">
                    <div class="-student-dashboard-profile-container10">
                      <span class="-student-dashboard-profile-text07">
                      Roll Number
                      </span>
                    </div>
                    <div class="-student-dashboard-profile-container11">
                      <span class="-student-dashboard-profile-text08">
                      <?php echo $_SESSION['roll_number']; ?>
                      </span>
                    </div>
                  </div>
                  <div class="-student-dashboard-profile-container12">
                    <div class="-student-dashboard-profile-container13">
                      <span class="-student-dashboard-profile-text09">
                        Branch
                      </span>
                    </div>
                    <div class="-student-dashboard-profile-container14">
                      <span class="-student-dashboard-profile-text10">
                        <?php
                           echo $dept;
                        ?>
                      </span>
                    </div>
                  </div>
                  <div class="-student-dashboard-profile-container15">
                    <div class="-student-dashboard-profile-container16">
                      <span class="-student-dashboard-profile-text11">
                        Rating
                      </span>
                    </div>
                    <div class="-student-dashboard-profile-container17">
                      <span class="-student-dashboard-profile-text12">
                      <?php echo $rate; ?>
                      </span>
                    </div>
                  </div>
                  <div class="-student-dashboard-profile-container18">
                    <div class="-student-dashboard-profile-container19">
                      <span class="-student-dashboard-profile-text13">
                        Ranking
                      </span>
                    </div>
                    <div class="-student-dashboard-profile-container20">
                      <span class="-student-dashboard-profile-text14">
                      <?php echo $_SESSION['semester']; ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>


              <div class="-student-dashboard-profile-edit">
                <button id="editprof" style="background:#3630a3;color:white;">Edit Profile</button>
                <script type="text/javascript">
                  document.getElementById("editprof").onclick = function () {
                  location.href = "edit-profile.php";
                  };
                </script>
              </div>
              <button id="testtake" style="background:#3630a3;color:white;">Take Test</button>
                <script type="text/javascript">
                  document.getElementById("testtake").onclick = function () {
                  location.href = "s-quiz-instructions.php";
                  };
                </script>
              </div>
              
              <div class="-student-dashboard-profile-container21">
                <!-- <span class="-student-dashboard-profile-text15">
                  Badges Obtained
                  <input type='button' id='b1' value='Monthly Data' />
                  <input type='button' id='b2' value='Weekly Data' />
                  </span>-->
                  <div class="-student-dashboard-profile-week">
                    <div id="Monthchart" style="height: 370px; width: 100%;"></div>
                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                  </div>
                  <div class="-student-dashboard-profile-month">
                    <div id="Yearchart" style="height: 370px; width: 100%;"></div>
                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                  </div>
              </div>
              
              </div>
            </div>
          </div>
          <div class="-student-dashboard-profile-code-embed">
            <dangerous-html
              html="<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link href='https://fonts.googleapis.com/css?family=Titillium Web' rel='stylesheet'>
<style>
body {
  font-family: 'Titillium Web';
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: #2D2774;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #ffffff;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #d9d9d9;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #2D2774;
  color: white;
  margin-top: 10px;
  padding: 10px 15px;
  border: none;
  border-radius: 16px;
}

.openbtn:hover {
  background-color: #3A3297;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>

<div id='mySidebar' class='sidebar'>
  <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>×</a>
  <a href='s-student-subject-page.html'>19CSE311<br>Computer Security</a>
  <a href='s-student-subject-page.html'>19CSE311<br>Computer Security</a>
  <a href='s-student-subject-page.html'>19CSE311<br>Computer Security</a>
  <a href='s-student-subject-page.html'>19CSE311<br>Computer Security</a>
  <a href='s-student-subject-page.html'>19CSE311<br>Computer Security</a>
  <a href='s-student-subject-page.html'>19CSE311<br>Computer Security</a>
</div>



<script>
function openNav() {
  document.getElementById('mySidebar').style.width = '250px';
  document.getElementById('main').style.marginRight = '250px';
}

function closeNav() {
  document.getElementById('mySidebar').style.width = '0';
  document.getElementById('main').style.marginRight= '0';
}
</script>
   
</body>
</html>"
            ></dangerous-html>
          </div>
        </div>
      </div>
    </div>
    <script
      data-section-id="navbar"
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>
</html>
