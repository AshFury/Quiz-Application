<?php
session_start();
include("include/config.php");

$pfp_query = "select profile_pic_link from pfp_details where roll_number = '" . $_SESSION['roll_number'] . "'";
$pfp = mysqli_query($conn, $pfp_query)->fetch_array()['profile_pic_link'] ?? '';
if(isset($_POST['change_button'])){

  $old_entered = $_POST['old_pass'];
  $new_pass = $_POST['new_pass'];
  $new_pass_conf = $_POST['new_pass_conf'];

  if ($old_entered != $_SESSION['first_name']){
    echo '<script type="text/javascript">';
    echo 'window.addEventListener("load", () => {swal({ title: "Error!", text: "Wrong Name!", type: "error", confirmButtonText: "Okay" })})';
    echo '</script>';
  }

  elseif ($new_pass != $new_pass_conf){
    echo '<script type="text/javascript">';
    echo 'window.addEventListener("load", () => {swal({ title: "Error!", text: "New passwords not matching!", type: "error", confirmButtonText: "Okay" })})';
    echo '</script>';
  }

  else{
    $update_query = "UPDATE user_details SET first_name = '$new_pass' WHERE roll_number = '".$_SESSION['roll_number']."'";
    mysqli_query($conn, $update_query);
    $_SESSION['first_name'] = $new_pass;
    echo '<script type="text/javascript">';
    echo 'window.addEventListener("load", () => {swal({ title: "Success!", text: "Name updated successfully", type: "success", confirmButtonText: "Okay" })})';
    echo '</script>';
  }

}

?>
<html lang="en">
  <head>
    <title>SF-Change-Password - AQUA</title>
    <meta
      property="og:title"
      content="SF-Change-Password - Jovial Candid Aardvark"
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
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
  </head>
  <body>
    <div>
      <link href="./sf-change-password.css" rel="stylesheet" />

      <div class="s-change-password-container">
        <header
          data-thq="thq-navbar"
          class="s-change-password-navbar-interactive"
        >
          <img
            alt="logo"
            src="public/playground_assets/aqua_logo_cropped-1500h.png"
            class="s-change-password-logo"
          />
          <div
            data-thq="thq-navbar-nav"
            data-role="Nav"
            class="s-change-password-desktop-menu"
          >
            <div
              data-thq="thq-dropdown"
              class="s-change-password-thq-dropdown list-item"
            >
              <div
                data-thq="thq-dropdown-toggle"
                class="s-change-password-dropdown-toggle"
              >
                <span class="s-change-password-text">
                <?php echo "Hi ".$_SESSION['first_name']; ?>
                </span>
                <img
                  alt="profilepic"
                  src=<?=$pfp?>
                  class="s-change-password-image"
                />
              </div>
              <ul
                data-thq="thq-dropdown-list"
                class="s-change-password-dropdown-list"
              >
                <li
                  data-thq="thq-dropdown"
                  class="s-change-password-dropdown list-item"
                >
                  <a href="sf-change-password.php">
                    <div
                      data-thq="thq-dropdown-toggle"
                      class="s-change-password-dropdown-toggle1"
                    >
                      <span class="s-change-password-text1">
                        Edit Profile
                      </span>
                    </div>
                  </a>
                </li>
                <li
                  data-thq="thq-dropdown"
                  class="s-change-password-dropdown1 list-item"
                >
                  <a href="s-student-dashboard-profile.php">
                    <div
                      data-thq="thq-dropdown-toggle"
                      class="s-change-password-dropdown-toggle2"
                    >
                      <span class="s-change-password-text2">View Profile</span>
                    </div>
                  </a>
                </li>
                <li
                  data-thq="thq-dropdown"
                  class="s-change-password-dropdown2 list-item"
                >
                  <a href="sf-loginfacial.php">
                    <div
                      data-thq="thq-dropdown-toggle"
                      class="s-change-password-dropdown-toggle3"
                    >
                      <span class="s-change-password-text3">Log Out</span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div data-thq="thq-burger-menu" class="s-change-password-burger-menu">
            <svg viewBox="0 0 1024 1024" class="s-change-password-icon">
              <path
                d="M128 554.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 298.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 810.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667z"
              ></path>
            </svg>
          </div>
          <div data-thq="thq-mobile-menu" class="s-change-password-mobile-menu">
            <div class="s-change-password-icon-group">
              <svg
                viewBox="0 0 950.8571428571428 1024"
                class="s-change-password-icon2"
              >
                <path
                  d="M925.714 233.143c-25.143 36.571-56.571 69.143-92.571 95.429 0.571 8 0.571 16 0.571 24 0 244-185.714 525.143-525.143 525.143-104.571 0-201.714-30.286-283.429-82.857 14.857 1.714 29.143 2.286 44.571 2.286 86.286 0 165.714-29.143 229.143-78.857-81.143-1.714-149.143-54.857-172.571-128 11.429 1.714 22.857 2.857 34.857 2.857 16.571 0 33.143-2.286 48.571-6.286-84.571-17.143-148-91.429-148-181.143v-2.286c24.571 13.714 53.143 22.286 83.429 23.429-49.714-33.143-82.286-89.714-82.286-153.714 0-34.286 9.143-65.714 25.143-93.143 90.857 112 227.429 185.143 380.571 193.143-2.857-13.714-4.571-28-4.571-42.286 0-101.714 82.286-184.571 184.571-184.571 53.143 0 101.143 22.286 134.857 58.286 41.714-8 81.714-23.429 117.143-44.571-13.714 42.857-42.857 78.857-81.143 101.714 37.143-4 73.143-14.286 106.286-28.571z"
                ></path></svg
              ><svg
                viewBox="0 0 877.7142857142857 1024"
                class="s-change-password-icon4"
              >
                <path
                  d="M585.143 512c0-80.571-65.714-146.286-146.286-146.286s-146.286 65.714-146.286 146.286 65.714 146.286 146.286 146.286 146.286-65.714 146.286-146.286zM664 512c0 124.571-100.571 225.143-225.143 225.143s-225.143-100.571-225.143-225.143 100.571-225.143 225.143-225.143 225.143 100.571 225.143 225.143zM725.714 277.714c0 29.143-23.429 52.571-52.571 52.571s-52.571-23.429-52.571-52.571 23.429-52.571 52.571-52.571 52.571 23.429 52.571 52.571zM438.857 152c-64 0-201.143-5.143-258.857 17.714-20 8-34.857 17.714-50.286 33.143s-25.143 30.286-33.143 50.286c-22.857 57.714-17.714 194.857-17.714 258.857s-5.143 201.143 17.714 258.857c8 20 17.714 34.857 33.143 50.286s30.286 25.143 50.286 33.143c57.714 22.857 194.857 17.714 258.857 17.714s201.143 5.143 258.857-17.714c20-8 34.857-17.714 50.286-33.143s25.143-30.286 33.143-50.286c22.857-57.714 17.714-194.857 17.714-258.857s5.143-201.143-17.714-258.857c-8-20-17.714-34.857-33.143-50.286s-30.286-25.143-50.286-33.143c-57.714-22.857-194.857-17.714-258.857-17.714zM877.714 512c0 60.571 0.571 120.571-2.857 181.143-3.429 70.286-19.429 132.571-70.857 184s-113.714 67.429-184 70.857c-60.571 3.429-120.571 2.857-181.143 2.857s-120.571 0.571-181.143-2.857c-70.286-3.429-132.571-19.429-184-70.857s-67.429-113.714-70.857-184c-3.429-60.571-2.857-120.571-2.857-181.143s-0.571-120.571 2.857-181.143c3.429-70.286 19.429-132.571 70.857-184s113.714-67.429 184-70.857c60.571-3.429 120.571-2.857 181.143-2.857s120.571-0.571 181.143 2.857c70.286 3.429 132.571 19.429 184 70.857s67.429 113.714 70.857 184c3.429 60.571 2.857 120.571 2.857 181.143z"
                ></path></svg
              ><svg
                viewBox="0 0 602.2582857142856 1024"
                class="s-change-password-icon6"
              >
                <path
                  d="M548 6.857v150.857h-89.714c-70.286 0-83.429 33.714-83.429 82.286v108h167.429l-22.286 169.143h-145.143v433.714h-174.857v-433.714h-145.714v-169.143h145.714v-124.571c0-144.571 88.571-223.429 217.714-223.429 61.714 0 114.857 4.571 130.286 6.857z"
                ></path>
              </svg>
            </div>
          </div>
        </header>
        <div class="s-change-password-imagecontainer">
          <img
            alt="image"
            src="public/playground_assets/login_page-900w.png"
            class="s-change-password-image1"
          />
        </div>
        <form role="form" method = "post">
        <div class="s-change-password-container1">
          <div class="s-change-password-container2">
            <h1 class="s-change-password-text4">CHANGE NAME</h1>
            <input
              type="text"
              name = "old_pass"
              required=""
              autofocus=""
              placeholder="Enter current name"
              class="s-change-password-textinput input"
            />
            <input
              type="text"
              name = "new_pass"
              required=""
              autofocus=""
              placeholder="Enter new name"
              class="s-change-password-textinput1 input"
            />
            <input
              type="text"
              name = "new_pass_conf"
              required=""
              placeholder="Confirm new name"
              class="s-change-password-textinput2 input"
            />
            <button type = "submit" class = "s-change-password-navlink3 button" name = "change_button">
            Edit Profile
        </button>
          </div>
        </div>
      </div>
    </div>
    </form>
    <script
      data-section-id="navbar"
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>
</html>