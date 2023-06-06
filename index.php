<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Academic Registration</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/landing-page.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="FontAwesome/css/all.css">
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="logo-title">
        <figure class="logo">
          <img src="images/LU-logo.png" width="500" height="500" alt="LU-logo">
        </figure>
        <h1><a href="index.php">LU-STDRG<a></h1>
      </div>
      <div class="links">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#departments">Departments</a></li>
          <li><a href="#about-us">About</a></li>
        </ul>
        <button id="login""><a href="login.php">Login</a></button>
        <button id="signup"><a href="signup.php">SignUp</a></button>
      </div>
    </nav>
  </header>
  <main>
    <section class="science-icons">
      <div><i class="fa-solid fa-plus fa-spin fa-spin-reverse fa-xl"></i></div>
      <div><i class="fa-solid fa-infinity fa-spin fa-xl" style="color: #d357fe;"></i></div>
      <div><i class="fa-solid fa-dna fa-beat fa-xl" style="color: #00c7fc;"></i></div>
      <div><i class="fa fa-flask-vial fa-flip fa-xl" style="color: #371a94;"></i></div>
      <div><i class="fa fa-robot fa-beat fa-xl" style="color: #be38f3;"></i></div>
      <div><i class="fa fa-code fa-flip fa-xl" style="color: #000000;"></i></div>
      <div><i class="fa-solid fa-microchip fa-fade fa-xl" style="color: #0056d6;"></i></div>
      <div><i class="fa fa-server fa-beat fa-xl" style="color: #001e57;"></i></div>
      <div><i class="fa-solid fa-calculator fa-shake fa-xl" style="color: #0042aa;"></i></div>
      <div><i class="fa-solid fa-square-root-variable fa-flip fa-xl" style="color: #5e30eb;"></i></div>
      <div><i class="fa fa-atom fa-spin fa-xl" style="color: #0061ff"></i></div>
      <div><i class="fa fa-microscope fa-fade fa-xl" style="color: #006d8f;"></i></div>
      <div><i class="fa fa-magnet fa-shake fa-xl" style="color: #e32400"></i></div>
      <div><i class="fa fa-vials fa-shake fa-xl" style="color: #0061ff;"></i></div>
      <div><i class="fa fa-seedling fa-beat-fade fa-xl" style="color: #96d35f;"></i></div>
      <div><i class="fa fa-heart-circle-bolt fa-beat fa-xl" style="color: #ff2600;"></i></div>
      <div><i class="fa fa-graduation-cap fa-bounce fa-xl" style="color: #000000;"></i></div>
      <div><i class="fa fa-book-open fa-fade fa-xl" style="color: #001e57;"></i></div>
      <div><i class="fa-solid fa-dna fa-beat fa-xl" style="color: #00c7fc;"></i></div>
      <div><i class="fa fa-magnet fa-shake fa-xl" style="color: #e32400"></i></div>
      <div><i class="fa-solid fa-infinity fa-spin fa-xl" style="color: #d357fe;"></i></div>
      <div><i class="fa-solid fa-square-root-variable fa-flip fa-xl" style="color: #5e30eb;"></i></div>
      <div><i class="fa fa-atom fa-spin fa-xl" style="color: #0061ff"></i></div>
      <div><i class="fa fa-heart-circle-bolt fa-beat fa-xl" style="color: #ff2600;"></i></div>
      <div><i class="fa fa-robot fa-beat fa-xl" style="color: #be38f3;"></i></div>
      <div><i class="fa-solid fa-calculator fa-shake fa-xl" style="color: #0042aa;"></i></div>
      <h1>Welcome to Lebanese University.</h1>
      <h2>Enroll Now In Faculty Of Science!</h2>
    </section>
    <section id="departments">
      <h1>Departments</h1>
      <div class="depcontainer">
        <div class="depcards">
          <h1>Computer Science</h1>
          <p>Computer science is the study of computers and computational systems. It is a broad field which includes everything from the algorithms that make up software to how software interacts with hardware to how well software is developed and designed. Computer scientists use various mathematical algorithms, coding procedures, and their expert programming skills to study computer processes and develop new software and systems.</p>
        </div>
        <div class="depcards">
          <h1>Mathematics</h1>
          <p>Mathematics is the science of structure, order, and relation that has evolved from elemental practices of counting, measuring, and describing the shapes of objects. It deals with logical reasoning and quantitative calculation, and its development has involved an increasing degree of idealization and abstraction of its subject matter</p>
        </div>
        <div class="depcards">
          <h1>Physics</h1>
          <p>
            Physics is a natural science that seeks to understand the fundamental principles governing the behavior of matter and energy. It encompasses a wide range of topics, including mechanics, thermodynamics, electromagnetism, optics, and quantum mechanics.The laws of physics apply to everything in the universe, from the tiniest subatomic particles to the largest structures in the cosmos.</p>
        </div>
        <div class="depcards">
          <h1>Biology</h1>
          <p>Biology is the natural science that studies living organisms and their interactions with each other and the environment. It encompasses a wide range of topics, from the molecular basis of life to the study of ecosystems and biodiversity.Biology seeks to understand the fundamental principles governing the diversity of life on Earth, including the mechanisms of evolution and the interactions between living organisms and their environments.</p>
        </div>
        <div class="depcards">
          <h1>Chemistry</h1>
          <p>
            Chemistry is the scientific study of the properties and behavior of matter, as well as the composition and structure of substances and their transformations.Chemists seek to understand the fundamental principles governing chemical reactions, including the interaction of atoms and molecules, and the effects of temperature, pressure, and other factors on chemical systems.</p>
        </div>
        <div class="depcards">
          <h1>BioChemistry</h1>
          <p>Biochemistry is the study of the chemical processes and substances that occur within living organisms. It combines principles from both biology and chemistry to understand the molecular basis of life.Biochemists study the chemical reactions and pathways that occur within cells and organisms, including the synthesis and breakdown of biological molecules such as proteins, carbohydrates, and nucleic acids.</p>
        </div>
        <div class="depcards">
          <h1>Electronics</h1>
          <p>
            Electronics is a field of study that deals with the design, development, and application of electronic devices and systems. It involves the study of electronic circuits, semiconductor devices, and the properties of materials used in electronic devices.Electronics majors learn how to design and analyze electronic circuits, as well as how to use specialized software tools to simulate and test electronic systems.</p>
        </div>
        <div class="depcards">
          <h1>Statistics</h1>
          <p>Statistics is a branch of mathematics that deals with the collection, analysis, interpretation, presentation, and organization of data. It involves methods for gathering and summarizing data, and for making inferences and decisions based on that data.Statistics has many practical applications in fields such as business, economics, healthcare, and social sciences, where it is used to help make informed decisions based on data.</p>
        </div>
      </div>
    </section>
    <section id="about-us">
      <figure>
        <img src="images/faculty-of-science.jpg" alt="faculty of science"/>
      </figure>
      <div class="about">
        <h1>About Us</h1>
        <p>This website was developed by Master 1 Computer Science Students at The Lebanese University to assist students and automate their Registration Process in the Departments of The Faculty of Science. It reduces the time it takes to request required students' documents for registration. New students as well as old students will be able to choose their major, courses, and submit their personal information required for a successfull registration. In addition, enrolled students can also request a University statement that ensure their registration in the university.</p>
      </div>
    </section>
  </main>
  <?php require("footer.php"); ?>
</body>
</html>