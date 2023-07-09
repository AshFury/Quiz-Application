<?php
ob_start();
session_start();
include("include/config.php");

$pfp_query = "select profile_pic_link from pfp_details where roll_number = '" . $_SESSION['roll_number'] . "'";
$pfp = mysqli_query($conn, $pfp_query)->fetch_array()['profile_pic_link'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>S-TestTakingInterface - Jovial Candid Aardvark</title>
    <meta
      property="og:title"
      content="S-TestTakingInterface - Jovial Candid Aardvark"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
s-test-taking-interface    <meta property="twitter:card" content="summary_large_image" />

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
      <link href="./s-test-taking-interface.css" rel="stylesheet" />

      <div class="-test-taking-interface-container">
        <header
          data-thq="thq-navbar"
          class="-test-taking-interface-navbar-interactive"
        >
          <img
            alt="logo"
            src="public/playground_assets/aqua_logo_cropped-1500h.png"
            class="-test-taking-interface-logo"
          />
          <div
            data-thq="thq-navbar-nav"
            data-role="Nav"
            class="-test-taking-interface-desktop-menu"
          >
            <div
              data-thq="thq-dropdown"
              class="-test-taking-interface-thq-dropdown list-item"
            >
              <div
                data-thq="thq-dropdown-toggle"
                class="-test-taking-interface-dropdown-toggle"
              >
                <span class="-test-taking-interface-text">
                <?php echo "Hi ".$_SESSION['first_name']; ?>
                </span>
                <img
                  alt="profilepic"
                  src=<?=$pfp?>
                  class="-test-taking-interface-image"
                />
              </div>
              <ul
                data-thq="thq-dropdown-list"
                class="-test-taking-interface-dropdown-list"
              >
                <li
                  data-thq="thq-dropdown"
                  class="-test-taking-interface-dropdown list-item"
                >
                  <a href="sf-change-password.php">
                    <div
                      data-thq="thq-dropdown-toggle"
                      class="-test-taking-interface-dropdown-toggle1"
                    >
                      <span class="-test-taking-interface-text01">
                        Change Password
                      </span>
                    </div>
                  </a>
                </li>
                <li
                  data-thq="thq-dropdown"
                  class="-test-taking-interface-dropdown1 list-item"
                >
                  <a href="s-student-dashboard-profile.php">
                    <div
                      data-thq="thq-dropdown-toggle"
                      class="-test-taking-interface-dropdown-toggle2"
                    >
                      <span class="-test-taking-interface-text02">
                        View Profile
                      </span>
                    </div>
                  </a>
                </li>
                <li
                  data-thq="thq-dropdown"
                  class="-test-taking-interface-dropdown2 list-item"
                >
                  <a href="sf-loginfacial.php">
                    <div
                      data-thq="thq-dropdown-toggle"
                      class="-test-taking-interface-dropdown-toggle3"
                    >
                      <span class="-test-taking-interface-text03">Log Out</span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div
            data-thq="thq-burger-menu"
            class="-test-taking-interface-burger-menu"
          >
            <svg viewBox="0 0 1024 1024" class="-test-taking-interface-icon">
              <path
                d="M128 554.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 298.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 810.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667z"
              ></path>
            </svg>
          </div>
          <div
            data-thq="thq-mobile-menu"
            class="-test-taking-interface-mobile-menu"
          >
            <div class="-test-taking-interface-icon-group">
              <svg
                viewBox="0 0 950.8571428571428 1024"
                class="-test-taking-interface-icon2"
              >
                <path
                  d="M925.714 233.143c-25.143 36.571-56.571 69.143-92.571 95.429 0.571 8 0.571 16 0.571 24 0 244-185.714 525.143-525.143 525.143-104.571 0-201.714-30.286-283.429-82.857 14.857 1.714 29.143 2.286 44.571 2.286 86.286 0 165.714-29.143 229.143-78.857-81.143-1.714-149.143-54.857-172.571-128 11.429 1.714 22.857 2.857 34.857 2.857 16.571 0 33.143-2.286 48.571-6.286-84.571-17.143-148-91.429-148-181.143v-2.286c24.571 13.714 53.143 22.286 83.429 23.429-49.714-33.143-82.286-89.714-82.286-153.714 0-34.286 9.143-65.714 25.143-93.143 90.857 112 227.429 185.143 380.571 193.143-2.857-13.714-4.571-28-4.571-42.286 0-101.714 82.286-184.571 184.571-184.571 53.143 0 101.143 22.286 134.857 58.286 41.714-8 81.714-23.429 117.143-44.571-13.714 42.857-42.857 78.857-81.143 101.714 37.143-4 73.143-14.286 106.286-28.571z"
                ></path></svg
              ><svg
                viewBox="0 0 877.7142857142857 1024"
                class="-test-taking-interface-icon4"
              >
                <path
                  d="M585.143 512c0-80.571-65.714-146.286-146.286-146.286s-146.286 65.714-146.286 146.286 65.714 146.286 146.286 146.286 146.286-65.714 146.286-146.286zM664 512c0 124.571-100.571 225.143-225.143 225.143s-225.143-100.571-225.143-225.143 100.571-225.143 225.143-225.143 225.143 100.571 225.143 225.143zM725.714 277.714c0 29.143-23.429 52.571-52.571 52.571s-52.571-23.429-52.571-52.571 23.429-52.571 52.571-52.571 52.571 23.429 52.571 52.571zM438.857 152c-64 0-201.143-5.143-258.857 17.714-20 8-34.857 17.714-50.286 33.143s-25.143 30.286-33.143 50.286c-22.857 57.714-17.714 194.857-17.714 258.857s-5.143 201.143 17.714 258.857c8 20 17.714 34.857 33.143 50.286s30.286 25.143 50.286 33.143c57.714 22.857 194.857 17.714 258.857 17.714s201.143 5.143 258.857-17.714c20-8 34.857-17.714 50.286-33.143s25.143-30.286 33.143-50.286c22.857-57.714 17.714-194.857 17.714-258.857s5.143-201.143-17.714-258.857c-8-20-17.714-34.857-33.143-50.286s-30.286-25.143-50.286-33.143c-57.714-22.857-194.857-17.714-258.857-17.714zM877.714 512c0 60.571 0.571 120.571-2.857 181.143-3.429 70.286-19.429 132.571-70.857 184s-113.714 67.429-184 70.857c-60.571 3.429-120.571 2.857-181.143 2.857s-120.571 0.571-181.143-2.857c-70.286-3.429-132.571-19.429-184-70.857s-67.429-113.714-70.857-184c-3.429-60.571-2.857-120.571-2.857-181.143s-0.571-120.571 2.857-181.143c3.429-70.286 19.429-132.571 70.857-184s113.714-67.429 184-70.857c60.571-3.429 120.571-2.857 181.143-2.857s120.571-0.571 181.143 2.857c70.286 3.429 132.571 19.429 184 70.857s67.429 113.714 70.857 184c3.429 60.571 2.857 120.571 2.857 181.143z"
                ></path></svg
              ><svg
                viewBox="0 0 602.2582857142856 1024"
                class="-test-taking-interface-icon6"
              >
                <path
                  d="M548 6.857v150.857h-89.714c-70.286 0-83.429 33.714-83.429 82.286v108h167.429l-22.286 169.143h-145.143v433.714h-174.857v-433.714h-145.714v-169.143h145.714v-124.571c0-144.571 88.571-223.429 217.714-223.429 61.714 0 114.857 4.571 130.286 6.857z"
                ></path>
              </svg>
            </div>
          </div>
        </header>
        <div class="-test-taking-interface-container01">
          <div class="-test-taking-interface-container02">
            <div class="-test-taking-interface-container03">
              <span class="-test-taking-interface-text04">
                19CSE301 - Computer Networks
              </span>
              <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
              <script type="text/javascript">
                secs = 20;
                timer = setInterval(function () {
                  var element = document.getElementById("status");
                  if(secs>60){
                    var rem_secs=secs%60;
                    var mins=(secs-rem_secs)/60;
                    if(rem_secs < 10){
                      element.innerHTML = "Time Left: <b>"+mins+"</b>:<b>0"+rem_secs+"</b>";
                    }else{
                    element.innerHTML = "Time Left: <b>"+mins+"</b>:<b>"+rem_secs+"</b>";
                    }
                  }
                  else{
                    element.innerHTML = "Time Left: <b>"+secs+"</b> seconds";}
                if(secs < 1){
                clearInterval(timer);
                document.getElementsByClassName('buttonsub')[0].click();
                <!-- window.location.replace("http://localhost/Proj/s-test-submission.php"); -->
                }
                secs--;
                }, 1000)
              </script> 
              <span class="-test-taking-interface-text05">
                <div id="status"></div>
                <span class="-test-taking-interface-text07"><script type="text/javascript">countDown(10,"status");</script></span>
              </span>
            </div>
            <div class="-test-taking-interface-container04">
              <span class="-test-taking-interface-text08">
                AQUA inc. All rights reserved
              </span>
            </div>
            <div class="-test-taking-interface-container05">
              <span class="-test-taking-interface-text09">QUIZ - 2</span>
              <?php
                $_SESSION['test_company']="Microsoft";
                $tst_comp=$_SESSION['test_company'];
                $sql = "select * from company_questions where company='$tst_comp'";
                $result = mysqli_query($conn, $sql) or die("Data retrieval error");
                $question_no=0;
                $_SESSION['correctoptions']=array();
                $_SESSION['questionslist']=array();
                $score=0;?>
                <style>
                  .ques{
                    padding-left: 30px;
                  }
              </style>
                <form method="post">
                <div class="ques">
                <?php
                while ($row = mysqli_fetch_array($result)){
                  //$row = mysqli_fetch_assoc($result);
                  $_SESSION['question'] = $row['question'];
                  $_SESSION['option1'] = $row['option1'];
                  $_SESSION['option2'] = $row['option2'];
                  $_SESSION['option3'] = $row['option3'];
                  $_SESSION['option4'] = $row['option4'];
                  $_SESSION['correctoption'] = $row['correctoption'];
                  //echo '<form action="" method="POST">';
                  array_push($_SESSION['questionslist'],$_SESSION['question']);
                  array_push($_SESSION['correctoptions'],$_SESSION['correctoption']);
                  $question_no=$question_no+1;
                  if ($question_no == 11){
                    break;
                  }
                  ?>
                  <b>Question <?=$question_no?></b>  
                  <br> 
                  <span class='-test-taking-interface-text11'><?=$_SESSION['question']?></span> 
                  <br>
                  <div class="-test-taking-interface-container07">      
                  <input type="radio" name="optradio[<?php echo $question_no; ?>]" value="<?=$_SESSION['option1']?>"><?=$_SESSION['option1']?>
                  </div>
                  <div class="-test-taking-interface-container08">      
                  <input type="radio" name="optradio[<?php echo $question_no; ?>]" value="<?=$_SESSION['option2']?>"><?=$_SESSION['option2']?>
                  </div>
                  <div class="-test-taking-interface-container09">      
                  <input type="radio" name="optradio[<?php echo $question_no; ?>]" value="<?=$_SESSION['option3']?>"><?=$_SESSION['option3']?>
                  </div>
                  <div class="-test-taking-interface-container10">      
                  <input type="radio" name="optradio[<?php echo $question_no; ?>]" value="<?=$_SESSION['option4']?>"><?=$_SESSION['option4']?>
                  </div>
                  <br>
                  <br>

                <?php
                }
                ?>
                <style>
                .subbutton{
                  padding-left: 622px;
                }
                .buttonsub {
                  background-color: #f44336;
                  border: none;
                  color: white;
                  padding: 15px 32px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;
                  margin: 4px 2px;
                  cursor: pointer;
                }
                </style>
                <div class="subbutton" id="buttonsub">
                <button type="submit" name="submit" class="buttonsub">Submit</button>
                </div>
              </div>
                </form>
                <?php
                if(isset($_POST["submit"])){
                $x=0;
                $score=0;
                $_SESSION['youroption']=array();
                foreach($_POST['optradio'] as $value){
                  array_push($_SESSION['youroption'],$value);
                  if($value==$_SESSION['correctoptions'][$x]){
                    $score=$score+1;
                  }
                  $x=$x+1;
                }
                $_SESSION['currscore']=$score;
                $new_points=(($score*100)/$question_no);
                $pointssql = "SELECT * FROM user_details WHERE first_name = '" . $_SESSION['first_name'] . "'";
                $result = mysqli_query($conn, $pointssql) or die("Data retrieval error");
                $row = mysqli_fetch_assoc($result);
                $rate = $row['Rating'];
                $rate=$rate+$new_points;
                $updatepointssql = "UPDATE user_details SET Rating='$rate' WHERE first_name='" . $_SESSION['first_name'] . "'";
                mysqli_query($conn, $updatepointssql); 
                if ($_SESSION['test_stat']==0) {
                  $_SESSION['test_sat']=1;
                  $name=$_SESSION['first_name'];
                  $updatetest = "UPDATE user_tests SET Test_Status=1 WHERE first_name='$name' AND Test_ID='" . $_SESSION['Test_ID'] . "";
                }
                //$_SESSION['isright']=$correctoptions;
                //$_SESSION['chosen']=$youroption;
                //echo "Your score is: ".$score;
                header("Location: s-test-submission.php");
              }
              ob_end_flush();
                ?>
            </div>
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
