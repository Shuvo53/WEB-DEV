<?php include 'config.php';
$sql = "SELECT * FROM users WHERE id = 1";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My portfolio</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/d422b4fe66.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="images/logo.png" class="logo">
                <ul id="sidemenu">
                <li><a href="#header">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
                <i class="fa-solid fa-xmark" onclick="closemenu()"></i>
                </ul>
                <i class="fa-solid fa-bars" onclick="openmenu()"></i>
            </nav>
            
            <div class="header-text">
                <p><?=$data['title']?></p>
                <h1>Hello, This is <span>SHUVO</span>
                <br> studying at <span>KUET</span></h1>

            </div>
        </div>
    </div>


    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                   <img src="images/about me.jpeg">
                </div>
                <div class="about-col-2">
                     <h1>About Me</h1>
                     <p>
                     <?=$data['about']?>
                     </p>
                    
                     <div class="tab-titles">
                        <p class="tab-links active-link" onclick="opentab('skills')">Skills</p>
                        <p class="tab-links"onclick="opentab('experience')">Experience</p>
                        <p class="tab-links"onclick="opentab('education')">Education</p>
                     </div>
                     <div class="tab-contents active-tab" id="skills">
                        <ul>
                            <li><span>Writing</span><br>writing</li>
                            <li><span>App Development</span><br>Building Android/IOS ap</li>
                            <li><span>Web Development</span><br>Web App Development</li>
                        </ul>
                     </div>
                     <div class="tab-contents" id="experience">
                        <ul>
                            <li><span>Writing</span><br>Essays and all</li>
                            <li><span>App Development</span><br>Building Android/IOS ap</li>
                            <li><span>Web Development</span><br>Web App Development</li>
                        </ul>
                     </div>
                     <div class="tab-contents" id="education">
                        <ul>
                            <li><span>Writing</span><br>HSC pass</li>
                            <li><span>App Development</span><br>Building Android/IOS ap</li>
                            <li><span>Web Development</span><br>Web App Development</li>
                        </ul>
                     </div>

                 </div>

            </div>
        </div>

    </div>
    <!-- ----services---- -->
    <div id="services">
        <div class="container">
            <h1 class="sub-title">My Services</h1>
            <div class="services-list">
            <?php
            $services_query = "SELECT * FROM services";
            $services_result = mysqli_query($con, $services_query);

            if ($services_result->num_rows > 0) {
            while ($service_row = $services_result->fetch_assoc()) {
            ?>
            <div>
            <i class="<?= $service_row['icon'] ?>"></i>
            <h2><?= $service_row['title'] ?></h2>
            <p><?= $service_row['details'] ?></p>
            <a href="#">Learn more</a>
            </div>
            <?php
        }
    }
?>

                <!-- <div>
                    <i class="fa-solid fa-code"></i>
                    <h2>Web Design</h2>
                    <p>
                       Lets do some web design
                        
                        
                        
                    </p>
                    <a href="#">Learn more</a>
                </div>
                <div>
                    <i class="fa-solid fa-crop"></i>
                    <h2>UI/UX Design</h2>
                    <p>
                        
                        lets do some UI
                          
                        
                    </p>
                    <a href="#">Learn more</a>
                </div>
                <div>
                    <i class="fa-brands fa-app-store-ios"></i>
                    <h2>App Development</h2>
                    <p>
                        
                        Lets do some app development.
                        
                        
                    </p>
                    <a href="#">Learn more</a>
                </div> -->

            </div>
        </div>
    </div>
    


    <!-- --------------- portfolio ------------------- -->
    <!-- <div id="portfolio">
        <div class="container">
            <h1 class="sub-title">My Work</h1>
            <div class="work-list">

                <div class="work">
                  

                    <img src="images/boat.jpg">\

                    <div class="layer"></div>
                    <h3>Boat Traveller</h3>
                    <p>Visit Website</p>
                    <a href="#"><i class="fa-solid fa-link"></i></a>

                </div>
                <div class="work">
                    <img src="images/Clock.jpg">
                    <div class="layer"></div>
                    <h3>Time Traveller</h3>
                    <p>Visit Website</p>
                    <a href="#"><i class="fa-solid fa-link"></i></a>

                </div>
                
                <div class="work">
                    <img src="images/paper.jpg">
                    <div class="layer"></div>
                    <h3>Reading Enthusiast</h3>
                    <p>Visit Website</p>
                    <a href="#"><i class="fa-solid fa-link"></i></a>

                </div>
                </div>
            </div>
            <a href="#" class="btn">See more</a>
        </div>
    </div> -->
   

   
    <div id="portfolio">
    <div class="container">
        <h1 class="sub-title">My Work</h1>
        <div class="work-list">
            <?php
            $work_query = "SELECT * FROM work";
            $work_result = mysqli_query($con, $work_query);

            // Check if there are rows in the result set
            if (mysqli_num_rows($work_result) > 0) {
                // Loop through each row
                while ($work_row = mysqli_fetch_assoc($work_result)) {
                    ?>
                    <div class="work">
                        <img src="<?php echo $work_row['img']; ?>">
                        <div class="layer"></div>
                        <h3><?php echo $work_row['title']; ?></h3>
                        <p><?php echo $work_row['details']; ?></p>
                        <a href="#"><i class="fa-solid fa-link"></i></a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <a href="#" class="btn">See more</a>
    </div>
</div>

<?php
// Close the connection
mysqli_close($con);
?>


    <!--Contact-->
    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="contact-left">
                    <h1 class="sub-title">Contact Me</h1>
                    <p><i class="fa-solid fa-paper-plane"></i>shuvoloman@gmail.com</p>
                    <p><i class="fa-solid fa-phone"></i>01796902790</p>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/itz.alh.shuvo"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/alh_shuvo/"><i class="fa-brands fa-twitter-square"></i></a>
                        <a href="https://www.instagram.com/alh_shuvo/"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.instagram.com/alh_shuvo/"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                    <a href="images/SHUVO_CV.pdf"download class="btn btn2">Download CV</a>
                </div>
                <div class="contact-right">
                    <form>
                    <div class="contact-right">
    <form action="save_message.php" method="post">
        <input type="text" name="Name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="Message" rows="6" placeholder="Your Message" required></textarea>
        <button type="submit" class="btn btn2">Submit</button>
    </form>
</div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>







       
    
    
    <script>
        var tablinks=document.getElementsByClassName("tab-links");
        var tabcontents=document.getElementsByClassName("tab-contents");

        function opentab(tabname){
            for(tablink of tablinks)
            {
                tablink.classList.remove("active-link");
            }
            for(tabcontent of tabcontents)
            {
                tabcontent.classList.remove("active-tab");
            }
            event.currentTarget.classList.add("active-link");
            document.getElementById(tabname).classList.add("active-tab");
        }

    </script>
    <script>
        var sidemeu=document.getElementById("sidemenu");
        function openmenu()
        {
            sidemeu.style.right="0";
        }
        function closemenu()
        {
            sidemeu.style.right="-200px";
        }
    </script>
</body>
</html>