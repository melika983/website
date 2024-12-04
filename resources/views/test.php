<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stunning Landing Page</title>
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/owl.css">
    <style>
        body {
            background: linear-gradient(to right, #D6E5FA, #F4F4F4);
            color: #297CA1;
            font-family: 'Arial', sans-serif;
         }
        .hero {
            background-image: url('https://source.unsplash.com/1600x900/?landscape');
            background-size: cover;
            background-position: center;
             display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            position: relative;
            margin-bottom: -100px;
        }
        .hero h1 {
            font-size: 3.5rem;
            text-align: center;
        }


        .btn-custom {
            background-color: #235B92;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            margin: 10px;
        }
        .btn-custom:hover {
            background-color: #1A4D72;
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }
        .content-section {
            text-align: center;
            margin-top: 40px;
        }
        footer {
            background-image: url(../assets/css/footer-bg.png);
            /* background-position: center top;
            background-repeat: repeat; */
            /* background-size: cover;
            margin-top: 130px;
            padding-top: 300px;
            padding-bottom: 60px; */
            width: 100%;
        }
        .icon {
            font-size: 2rem;
            color: #235B92;
        }
        body {
    font-size: 16px; /* Base size */
        }

        h1, h2, h3 {
            text-align: center;
            margin: 0;
        }

        h1 {
            font-size: 3rem; /* Responsive size */
        }

        h2 {
            font-size: 2.5rem; /* Responsive size */
        }

        p {
            font-size: 1.2rem; /* Responsive size */
        }

        .navbar {
            background-color: #D6E5FA;
            padding: 15px;
        }
        .navbar-brand img {
            width: 50px;
            height: auto;
        }
        .nav-link {
            color: #297CA1;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .nav-link:hover {
            background-color: #C0D3E1;
            transform: scale(1.1);
            border-radius: 5px;
        }
        .main-banner:after {
            content: '';
            background-image: url(../assets/css/slider.png);
            background-repeat: no-repeat;
            background-size: contain;
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .process-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 50px 0;
        }

        .process-step {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            margin: 20px;
            width: 80%;
            max-width: 300px;
            opacity: 0; /* Start hidden */
            transform: translateY(20px); /* Start slightly below */
            animation: fadeInUp 0.5s forwards; /* Animation */
        }

        .process-icon {
            font-size: 3rem;
            color: #297CA1;
            margin-bottom: 15px;
        }

        h3 {
            font-size: 1.5rem;
            margin: 10px 0;
        }

        p {
            font-size: 1rem;
        }

            .circle {
    background: white;
    border-radius: 50%;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 10%; /* Use percentage for padding */
    width: 100%; /* Full width of column */
    max-width: 150px; /* Limit max size */
    margin: 10px auto; /* Centered */
}

.process-section {
    margin-top: 40px; /* Space above the process section */
}

@media (max-width: 768px) {
    .process-section {
        flex-direction: column; /* Stack vertically on small screens */
    }
    h1 {
        font-size: 2.5rem; /* Smaller size on tablets */
    }

    h2 {
        font-size: 2rem; /* Smaller size on tablets */
    }

    p {
        font-size: 1rem; /* Smaller size on tablets */
    }
    .process-container {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
            }
            .process-container {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
            }
            .process-step {
                margin: 20px;
            }
        }
        @keyframes fadeInUp {
                    to {
                        opacity: 1; /* Fully visible */
                        transform: translateY(0); /* Original position */
                    }
                }

    </style>
</head>
<body>
    {{-- <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
         </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Service</a>
                </li>
            </ul>
        </div>
    </nav> --}}
    <header class="header-area header-sticky wow slideInDown animated" data-wow-duration="0.75s" data-wow-delay="0s" style="visibility: visible;-webkit-animation-duration: 0.75s; -moz-animation-duration: 0.75s; animation-duration: 0.75s;-webkit-animation-delay: 0s; -moz-animation-delay: 0s; animation-delay: 0s;">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav class="main-nav">
                <!-- ***** Logo Start ***** -->
                <a href="index.html" class="logo">
                  {{-- <img src="assets/images/logo.png" alt="Chain App Dev"> --}}
                </a>
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                  <li class="scroll-to-section"><a href="#top" class="active">Guide</a></li>
                  {{-- <li class="scroll-to-section"><a href="#services" class="">Services</a></li>
                  <li class="scroll-to-section"><a href="#about" class="">About</a></li>
                  <li class="scroll-to-section"><a href="#pricing" class="">Pricing</a></li>
                  <li class="scroll-to-section"><a href="#newsletter" class="">Newsletter</a></li> --}}
                  <li><div class="gradient-button"><a id="modal_trigger" href="#modal" class="active"><i class="fa fa-sign-in-alt"></i> Sign In Now</a></div></li>
                </ul>
                <a class="menu-trigger">
                    <span>Menu</span>
                </a>
                <!-- ***** Menu End ***** -->
              </nav>
            </div>
          </div>
        </div>
      </header>

 {{--<div class="container text-center">
    <header>
        <button class="btn btn-custom" onclick="alert('Guide clicked!')">
            Guide <i class="fas fa-book"></i>
        </button>
    </header>

    <div class="content-section">
        <h2>حلقه اصلی رویداد</h2>
        <img src="assets/css/2.jpg" alt="Example Image" class="img-fluid" style="max-width: 50%; height: auto;">

    </div>
    <button class="btn btn-custom" onclick="alert('Go Next clicked!')">
        Go Next <i class="fas fa-arrow-right"></i>
    </button>

</div>--}}

<div class="main-banner wow fadeIn animated" id="top" data-wow-duration="1s" data-wow-delay="0.5s" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft animated" data-wow-duration="1s" data-wow-delay="1s" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 1s; -moz-animation-delay: 1s; animation-delay: 1s;">
                <div class="row">
                  <div class="col-lg-12">
                    <h3>به رویداد  تاس خوش آمدید</h3>
                    <p>حلقه اصلی تاس و روند بازی رو به درستی مطالعه کنید</p>
                  </div>
                  <div class="col-lg-6">
                    <div class="container process-container">
                        <div class="process-step">
                            <div class="process-icon">
                                <i class="fas fa-pencil-alt"></i> <!-- FontAwesome icon -->
                            </div>
                            <h3>Step 1: Design</h3>
                            <p>Create the blueprint and design layout for the project.</p>
                        </div>
                        <div class="process-step">
                            <div class="process-icon">
                                <i class="fas fa-code"></i>
                            </div>
                            <h3>Step 2: Development</h3>
                            <p>Turn the design into a functional website or application.</p>
                        </div>
                        <div class="process-step">
                            <div class="process-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <h3>Step 3: Launch</h3>
                            <p>Deploy the project and make it available to users.</p>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <button class="btn btn-custom" onclick="alert('Go Next clicked!')">
        Go Next <i class="fas fa-arrow-right"></i>
    </button>


</div>
    {{-- <footer class="mt-5">

    </footer> --}}
    <footer id="newsletter">
        <div class="container">
          <div class="row">


          </div>
          <div class="d-flex justify-content-center">
            <button class="btn btn-custom" onclick="alert('Footer Button 1 clicked!')">
                Footer Button 1 <i class="fas fa-info-circle"></i>
            </button>
            <button class="btn btn-custom" onclick="alert('Footer Button 2 clicked!')">
                Footer Button 2 <i class="fas fa-cog"></i>
            </button>
        </div>
        </div>
      </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>




