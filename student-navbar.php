<?php

  echo '<header>
          <nav class="navbar">
            <div class="logo-title">
              <figure class="logo">
                <img src="images/LU-logo.png" width="500" height="500" alt="LU-logo">
              </figure>
              <h1><a href="user-page.php">LU-STDRG<a></h1>
            </div>
            <div class="links">
              <ul>
                <li><a href="user-page.php">Home</a></li>
                <li><a href="grades.php">Grades</a></li>
                <li><a href="login.php">LogOut</a></li>
              </ul>
              <div class="profile">
                <span id="student-name">'; echo $student_name; echo '</span>
                <button id="profile-picture"><a href="profile.php">';
                if(!$student_image["Image"]) echo '<img src="images/profile-pic.jpeg" width="50" height="50"/>';
                else echo '<img src="data:image/jpeg;base64,'.base64_encode($student_image["Image"]).'" width="50" height="50"/>'; 
                echo '</a></button>
              </div>
            </div>
          </nav>
       </header>';

       //the base64 above is used to encode profile image comming from database

?>
