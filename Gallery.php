<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header('Location: Login.php');
    exit();
}
include_once __DIR__ . '../controller/galleryController.php';
include_once __DIR__ . '../repository/galleryRepository.php';

$galleryRepository = new GalleryRepository();
$galleries = $galleryRepository->getAllGallery();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swissaround</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="main" style="background-image: none;">

        <div class="nav_bar">

            <div class="logo">
                <img src="Img/logo.png" alt="">
                <h2>Swissaround</h2>
            </div>

            <div class="sidebar">
                
                <ul>
                    <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="Places.php">Places</a></li>
                    <li><a href="Blogs.php">Blogs</a></li>
                    <li><a href="Book.php">Book</a></li>
                    <li><a href="Services.php">Services</a></li>
                    <li><a href="Gallery.php">Gallery</a></li>
                    <li><a href="Logout.php"><button>Log out</button></a></li>
                    <li><input type="search" placeholder="Search places"><a href=""><button>Search</button></a></li>
                </ul>
                
            </div>

            <div>
                <ul class="nav_link">
                    <li class="link"><a href="home.php">Home</a></li>
                    <li class="link"><a href="Places.php">Places</a></li>
                    <li class="link"><a href="Blogs.php">Blogs</a></li>
                    <li class="link"><a href="Book.php">Book</a></li>
                    <li class="link"><a href="Services.php">Services</a></li>
                    <li class="link"><a href="Gallery.php">Gallery</a></li>
                </ul>
            </div>

            <div class="login">
                <a href="Logout.php"><button>Log out</button></a>
            </div>
            
            <div class="search">
                <input class="srch" type="search" placeholder="Search places">
                <a href=""><button>Search</button></a>
            </div>

            <div class="menu_icon">
                <ul>
                    <li onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
                </ul>
            </div>

        </div>

        <div id="kontenti">
            <header>
            <h2>More images </h2>
            <?php foreach ($galleries as $gallery): ?>
            <img class="gallery-image" src="<?php echo $gallery['image']; ?>" alt="Gallery Image">
            <?php endforeach; ?>
            <button id="prevBtn">Previous</button>
            <button id="nextBtn">Next</button>
        </div>
        

        <footer>
            <div class="main-content">
    
                <div class="left box">
                    <h2>Company</h2>   
                    <div class="company">
                        <br>
                        <p><a href="home.php">Home</a></p>
                        <br>
                        <p><a href="#">About Us</a></p>
                        <br>
                        <p><a href="#">Privacy and Policy</a></p>
                        <br>
                        <p><a href="#">Terms & Conditions</a></p>
                        <br>
                        <p><a href="#">Contact Us</a></p>
                    </div>
                </div>
                <div class="center box">
    
                    <h2>Contact Us</h2>
                    <div class="contact">
                        <div class="phone">
                            <span class='bx bxs-phone'></span>
                            <i class="text">Phone:+134-64381-236419</i>
                        </div>
    
                        <div class="viber">
                            <span class='bx bxs-phone-call'></span>
                            <i class="text">Viber:+133-78432-211987</i>
                        </div>
                        <div class="email">
                            <span class='bx bxs-envelope' ></span>
                            <i class="text">Email:swissaround@gmail.com</i>
                        </div>
                    </div> 
                </div>
                <div class="right box">
                    <h2>Follow Us</h2>
                    <div class="social">
                        <br>
                        <a href="#"><span class='bx bxl-facebook-circle'></span></a>
                        <a href="#"><span class='bx bxl-instagram' ></span></a>
                        <a href="#"><span class='bx bxl-twitter' ></span></a>
                        <a href="#"><span class='bx bxl-linkedin' ></span></a>
                    </div>
                </div>   
            </div>
            <hr>
            <div class="copyright">
                <p>© All rights reserved 2023 Swissaround</p>
            </div>
        </footer>
    </div>
    <script>
        function showSidebar(){
            const sidebar = document.querySelector('.sidebar');
            sidebar.style.display = 'flex';
        }
        function hideSidebar(){
            const sidebar = document.querySelector('.sidebar');
            sidebar.style.display = 'none';
        }
        document.addEventListener('DOMContentLoaded', function() {
            let images = document.querySelectorAll('.gallery-image');
            let currentIndex = 0;

            function showImage(index) {
                images.forEach(function(image) {
                    image.style.display = 'none';
                });
                images[index].style.display = 'block';
            }

            function nextImage() {
                currentIndex = (currentIndex + 1) % images.length;
                showImage(currentIndex);
            }

            function prevImage() {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                showImage(currentIndex);
            }

            // Show the first image when the page loads
            showImage(currentIndex);

            // Add event listeners to the Next and Previous buttons
            document.querySelector('#nextBtn').addEventListener('click', nextImage);
            document.querySelector('#prevBtn').addEventListener('click', prevImage);
        });
    </script>
</body>
</html>