<?php
session_start();
include("include/config.php");

$pfp_query = "select profile_pic_link from pfp_details where roll_number = '" . $_SESSION['roll_number'] . "'";
$pfp = mysqli_query($conn, $pfp_query)->fetch_array()['profile_pic_link'] ?? '';
?>
<html lang="en">
  <head>
    <title>F-Question-Pool</title>
    <meta
      property="og:title"
      content="F-Question-Pool"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <!-- custom css -->
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
    <!-- <script>
      function edit_row(no) {
      document.getElementById("editbtn" + no).style.display = "none";
      document.getElementById("savebtn" + no).style.display = "block";

      var ques = document.getElementById("ques" + no);
      var option1 = document.getElementById("op1" + no);
      var option2 = document.getElementById("op2" + no);
      var option3 = document.getElementById("op3" + no);
      var option4 = document.getElementById("op4" + no);
      var point = document.getElementById("pt" + no);
      var tags = document.getElementById("tag",+no);
      var correctanswer = document.getElementById("correctans" + no);
      var difficultylevel = document.getElementById("difflvl" + no);

      var ques_data = ques.innerHTML;
      var option1_data = option1.innerHTML;
      var option2_data = option2.innerHTML;
      var option3_data = option3.innerHTML;
      var option4_data = option4.innerHTML;
      var point_data = point.innerHTML;
      var tags_data = tags.innerHTML;
      var correctanswer_data = correctanswer.innerHTML;
      var difficultylevel_data = difficultylevel.innerHTML;

      name.innerHTML =
        "<input type='text' id='name_text" + no + "' value='" + name_data + "'>";
      country.innerHTML =
        "<input type='text' id='country_text" +
        no +
        "' value='" +
        country_data +
        "'>";
      age.innerHTML =
        "<input type='text' id='age_text" + no + "' value='" + age_data + "'>";
      }

      function save_row(no) {
        
      var ques = document.getElementById("ques" + no);
      var option1 = document.getElementById("op1" + no);
      var option2 = document.getElementById("op2" + no);
      var option3 = document.getElementById("op3" + no);
      var option4 = document.getElementById("op4" + no);
      var point = document.getElementById("pt" + no);
      var tags = document.getElementById("tag",+no);
      var correctanswer = document.getElementById("correctans" + no);
      var difficultylevel = document.getElementById("difflvl" + no);

      document.getElementById("ques" + no).innerHTML = ques;
      document.getElementById("op1" + no).innerHTML = option1;
      document.getElementById("op2" + no).innerHTML = option2;
      document.getElementById("op3" + no).innerHTML = option3;
      document.getElementById("op4" + no).innerHTML = option4;
      document.getElementById("pt" + no).innerHTML = point;
      document.getElementById("tag" + no).innerHTML = tags;
      document.getElementById("correctans" + no).innerHTML = correctanswer;
      document.getElementById("difflvl" + no).innerHTML = difficultylevel;


      document.getElementById("edit_button" + no).style.display = "block";
      document.getElementById("save_button" + no).style.display = "none";
      }

      function delete_row(no) {
      document.getElementById("containerforques" + no + "").outerHTML = "";
      }

      function add_row() {
      var new_name = document.getElementById("new_name").value;
      var new_country = document.getElementById("new_country").value;
      var new_age = document.getElementById("new_age").value;

      var table = document.getElementById("data_table");
      var table_len = table.rows.length - 1;
      var row = (table.insertRow(table_len).outerHTML =
        "<tr id='row" +
        table_len +
        "'><td id='name_row" +
        table_len +
        "'>" +
        new_name +
        "</td><td id='country_row" +
        table_len +
        "'>" +
        new_country +
        "</td><td id='age_row" +
        table_len +
        "'>" +
        new_age +
        "</td><td><input type='button' id='edit_button" +
        table_len +
        "' value='Edit' class='edit' onclick='edit_row(" +
        table_len +
        ")'> <input type='button' id='save_button" +
        table_len +
        "' value='Save' class='save' onclick='save_row(" +
        table_len +
        ")'> <input type='button' value='Delete' class='delete' onclick='delete_row(" + table_len + ")'></td></tr>");

      document.getElementById("new_name").value = "";
      document.getElementById("new_country").value = "";
      document.getElementById("new_age").value = "";
      }


    </script> -->
    <div>
      <link href="./dup.css" rel="stylesheet" />

      <div class="-question-pool-container">
        <header data-thq="thq-navbar" class="-question-pool-navbar-interactive">
          <img
            alt="logo"
            src="public/playground_assets/aqua_logo_cropped-1500h.png"
            class="-question-pool-logo"
          />
          <div
            data-thq="thq-navbar-nav"
            data-role="Nav"
            class="-question-pool-desktop-menu"
          >
            <div
              data-thq="thq-dropdown"
              class="-question-pool-thq-dropdown list-item"
            >
              <div
                data-thq="thq-dropdown-toggle"
                class="-question-pool-dropdown-toggle"
              >
                <span class="-question-pool-text">
                <?php echo "Hi ".$_SESSION['first_name']; ?>
                </span>
                <img
                  alt="profilepic"
                  src=<?=$pfp?>
                  class="-question-pool-image"
                />
              </div>
              <ul
                data-thq="thq-dropdown-list"
                class="-question-pool-dropdown-list"
              >
                <li
                  data-thq="thq-dropdown"
                  class="-question-pool-dropdown list-item"
                >
                  <a href="sf-change-password.php">
                    <div
                      data-thq="thq-dropdown-toggle"
                      class="-question-pool-dropdown-toggle1"
                    >
                      <span class="-question-pool-text01">Change Password</span>
                    </div>
                  </a>
                </li>
                <li
                  data-thq="thq-dropdown"
                  class="-question-pool-dropdown1 list-item"
                >
                  <a href="f-faculty-dashboard-profile.html">
                    <div
                      data-thq="thq-dropdown-toggle"
                      class="-question-pool-dropdown-toggle2"
                    >
                      <span class="-question-pool-text02">View Profile</span>
                    </div>
                  </a>
                </li>
                <li
                  data-thq="thq-dropdown"
                  class="-question-pool-dropdown2 list-item"
                >
                  <a href="sf-loginfacial.php">
                    <div
                      data-thq="thq-dropdown-toggle"
                      class="-question-pool-dropdown-toggle3"
                    >
                      <span class="-question-pool-text03">Log Out</span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div data-thq="thq-burger-menu" class="-question-pool-burger-menu">
            <svg viewBox="0 0 1024 1024" class="-question-pool-icon">
              <path
                d="M128 554.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 298.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 810.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667z"
              ></path>
            </svg>
          </div>
          <div data-thq="thq-mobile-menu" class="-question-pool-mobile-menu">
            <div class="-question-pool-icon-group">
              <svg
                viewBox="0 0 950.8571428571428 1024"
                class="-question-pool-icon02"
              >
                <path
                  d="M925.714 233.143c-25.143 36.571-56.571 69.143-92.571 95.429 0.571 8 0.571 16 0.571 24 0 244-185.714 525.143-525.143 525.143-104.571 0-201.714-30.286-283.429-82.857 14.857 1.714 29.143 2.286 44.571 2.286 86.286 0 165.714-29.143 229.143-78.857-81.143-1.714-149.143-54.857-172.571-128 11.429 1.714 22.857 2.857 34.857 2.857 16.571 0 33.143-2.286 48.571-6.286-84.571-17.143-148-91.429-148-181.143v-2.286c24.571 13.714 53.143 22.286 83.429 23.429-49.714-33.143-82.286-89.714-82.286-153.714 0-34.286 9.143-65.714 25.143-93.143 90.857 112 227.429 185.143 380.571 193.143-2.857-13.714-4.571-28-4.571-42.286 0-101.714 82.286-184.571 184.571-184.571 53.143 0 101.143 22.286 134.857 58.286 41.714-8 81.714-23.429 117.143-44.571-13.714 42.857-42.857 78.857-81.143 101.714 37.143-4 73.143-14.286 106.286-28.571z"
                ></path></svg
              ><svg
                viewBox="0 0 877.7142857142857 1024"
                class="-question-pool-icon04"
              >
                <path
                  d="M585.143 512c0-80.571-65.714-146.286-146.286-146.286s-146.286 65.714-146.286 146.286 65.714 146.286 146.286 146.286 146.286-65.714 146.286-146.286zM664 512c0 124.571-100.571 225.143-225.143 225.143s-225.143-100.571-225.143-225.143 100.571-225.143 225.143-225.143 225.143 100.571 225.143 225.143zM725.714 277.714c0 29.143-23.429 52.571-52.571 52.571s-52.571-23.429-52.571-52.571 23.429-52.571 52.571-52.571 52.571 23.429 52.571 52.571zM438.857 152c-64 0-201.143-5.143-258.857 17.714-20 8-34.857 17.714-50.286 33.143s-25.143 30.286-33.143 50.286c-22.857 57.714-17.714 194.857-17.714 258.857s-5.143 201.143 17.714 258.857c8 20 17.714 34.857 33.143 50.286s30.286 25.143 50.286 33.143c57.714 22.857 194.857 17.714 258.857 17.714s201.143 5.143 258.857-17.714c20-8 34.857-17.714 50.286-33.143s25.143-30.286 33.143-50.286c22.857-57.714 17.714-194.857 17.714-258.857s5.143-201.143-17.714-258.857c-8-20-17.714-34.857-33.143-50.286s-30.286-25.143-50.286-33.143c-57.714-22.857-194.857-17.714-258.857-17.714zM877.714 512c0 60.571 0.571 120.571-2.857 181.143-3.429 70.286-19.429 132.571-70.857 184s-113.714 67.429-184 70.857c-60.571 3.429-120.571 2.857-181.143 2.857s-120.571 0.571-181.143-2.857c-70.286-3.429-132.571-19.429-184-70.857s-67.429-113.714-70.857-184c-3.429-60.571-2.857-120.571-2.857-181.143s-0.571-120.571 2.857-181.143c3.429-70.286 19.429-132.571 70.857-184s113.714-67.429 184-70.857c60.571-3.429 120.571-2.857 181.143-2.857s120.571-0.571 181.143 2.857c70.286 3.429 132.571 19.429 184 70.857s67.429 113.714 70.857 184c3.429 60.571 2.857 120.571 2.857 181.143z"
                ></path></svg
              ><svg
                viewBox="0 0 602.2582857142856 1024"
                class="-question-pool-icon06"
              >
                <path
                  d="M548 6.857v150.857h-89.714c-70.286 0-83.429 33.714-83.429 82.286v108h167.429l-22.286 169.143h-145.143v433.714h-174.857v-433.714h-145.714v-169.143h145.714v-124.571c0-144.571 88.571-223.429 217.714-223.429 61.714 0 114.857 4.571 130.286 6.857z"
                ></path>
              </svg>
            </div>
          </div>
        </header>
        <div class="-question-pool-container01">
            <div id="wrapper">
    
                <div class="invitation">
                  <main class="main">	
                    <form id="inviteForm">
                      <h2 style="margin-bottom: 20px;">19CSE313 PRINCIPLES OF PROGRAMMING LANGUAGES QUESTION POOL </h2>
                      <div class="addq">
                      <input class="text" type="text" name="name" placeholder="Enter Question">
                      <div class="optioncontainer">
                      <input class="options" type="text" name="op1" placeholder="Option 1">
                      <input class="options" type="text" name="op2" placeholder="Option 2">
                      <input class="options" type="text" name="op3" placeholder="Option 3">
                      <input class="options" type="text" name="op4" placeholder="Option 4">
                      
                    </div>
                    <div class="choices">
                        <input class="options" type="text" name="tags" placeholder="Enter Tags">
                        <select id="points" name="points">
                            <option disabled selected>Points</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="5">5</option>
                          </select>
                          <select id="crtans" name="crtans">
                            <option disabled selected>Correct Answer</option>
                            <option value="opt1">Option 1</option>
                            <option value="opt2">Option 2</option>
                            <option value="opt3">Option 3</option>
                            <option value="opt4">Option 4</option>
                          </select>
                          <select id="difflvl" name="difflvl">
                            <option disabled selected>Difficulty Level</option>
                            <option value="Easy">Easy</option>
                            <option value="Medium">Medium</option>
                            <option value="Hard">Hard</option>
                          </select>
                          <div class="nextcont">
                            <button class="isub" type="submit" name="submit" value="submit">Submit</button>
                          </div>
                          
                    </div>

                      
                    </div>
                    </form>
            
                    <ul id="invitedList">
                      <li><span>John Smith</span><span>Option 1. op1</span><span>Option 2. op1</span><span>Option 3. op1</span><span>Option 4. op1</span><span>Tags: tag1, tag2</span><span>Points: 1</span><span>Correct Answer: Option 2</span><span>Difficulty Level: Easy</span><button>Edit</button><button>Remove</button>
                      </li>  
                    </ul>	
                  </main>
                </div>
              </div>
              <script type="text/javascript" src="dup.js"></script>
        </div> 
      </div>
    </div>
    <script
      data-section-id="navbar"
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>
</html>
