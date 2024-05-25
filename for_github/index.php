<?php
// if(!isset($_SESSION["user"])){
//     include("navbar.php");
//     header("Location: login.php");
//     exit();
// }else{
//     include("navbar_r.php");
// }
// include("conn-db.php");
include("conn-db.php");
session_start();
if(!isset($_SESSION["user"])){   
    // header("Location: login.php");
    // exit();
    include("navbar.php");
}else {
    include("navbar_r.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/css/bootstrap.css">

</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4 mb-4"> <!-- Added mb-4 class for bottom margin -->
                <div class="card p-3" style="width: 18rem;"> <!-- Added p-3 class for padding -->
                    <img class="card-img-top" src="../doctor/photoes/interest.jpeg" alt="Card image cap" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">باطنة</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-4"> <!-- Added mb-4 class for bottom margin -->
                <div class="card p-3" style="width: 18rem;"> <!-- Added p-3 class for padding -->
                    <img class="card-img-top" src="../doctor/photoes/Best-Genral-Surgery-in-Dombivali.jpg" alt="Card image cap" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">جراحة عامة</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-4"> <!-- Added mb-4 class for bottom margin -->
                <div class="card p-3" style="width: 18rem;"> <!-- Added p-3 class for padding -->
                    <img class="card-img-top" src="../doctor/photoes/bones.jpg" alt="Card image cap" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">عظام</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-4 "> <!-- Added mb-4 class for bottom margin -->
                <div class="card p-3" style="width: 18rem;"> <!-- Added p-3 class for padding -->
                    <img class="card-img-top" src="../doctor/photoes/nose and mouth.jpg" alt="Card image cap" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">انف و اذن</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-4"> <!-- Added mb-4 class for bottom margin -->
                <div class="card p-3" style="width: 18rem;"> <!-- Added p-3 class for padding -->
                    <img class="card-img-top" src="../doctor/photoes/female.jpeg" alt="Card image cap" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">نساء و توليد</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-4"> <!-- Added mb-4 class for bottom margin -->
                <div class="card p-3" style="width: 18rem;"> <!-- Added p-3 class for padding -->
                    <img class="card-img-top" src="../doctor/photoes/eyes.jpeg" alt="Card image cap" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">عيون</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-4"> <!-- Added mb-4 class for bottom margin -->
                <div class="card p-3" style="width: 18rem;"> <!-- Added p-3 class for padding -->
                    <img class="card-img-top" src="../doctor/photoes/digestive_system.jpg" alt="Card image cap" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">جهاز هضمى</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-4"> <!-- Added mb-4 class for bottom margin -->
                <div class="card p-3" style="width: 18rem;"> <!-- Added p-3 class for padding -->
                    <img class="card-img-top" src="../doctor/photoes/family.avif" alt="Card image cap" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">طب اسرة</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-4"> <!-- Added mb-4 class for bottom margin -->
                <div class="card p-3" style="width: 18rem;"> <!-- Added p-3 class for padding -->
                    <img class="card-img-top" src="../doctor/photoes/dermal.webp" alt="Card image cap" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">جلدية</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-4"> <!-- Added mb-4 class for bottom margin -->
                <div class="card p-3" style="width: 18rem;"> <!-- Added p-3 class for padding -->
                    <img class="card-img-top" src="../doctor/photoes/male.webp" alt="Card image cap" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">ذكورة وعقم</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            
            <!-- Repeat the above div for each card you want to display -->
            <!-- Repeat this pattern until you have five columns of cards -->
        </div>
    </div>






    <script src="/js/popper.js"></script>
    <script src="/js/jquery-3.7.1.js"></script>
    <script src="/js/bootstrap.js"></script>
</body>

</html>
</body>
</html>