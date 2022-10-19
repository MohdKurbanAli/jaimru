<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
    integrity="sha512-xA6Hp6oezhjd6LiLZynuukm80f8BoZ3OpcEYaqKoCV3HKQDrYjDE1Gu8ocxgxoXmwmSzM4iqPvCsOkQNiu41GA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="navbar-area">
    <div class="fria-responsive-nav">
        <div class="container">
            <div class="fria-responsive-menu">
                <div class="logo">
                    <a href="https://www.jaimru.com/">
                        <img src="assets/img/jaimru-technology-logo.png" alt="Jaimru-technology-logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="fria-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="https://www.jaimru.com/">
                    <img src="assets/img/jaimru-technology-logo.png" alt="Jaimru-technology-logo">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index" class="nav-link">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="about" class="nav-link ">
                                About
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="services" class="nav-link">
                                IT Services
                                <i class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="customize-erp" class="nav-link">
                                        Customize Erp
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="web-development" class="nav-link">
                                        Web Development
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="digital-marketing" class="nav-link">
                                        Digital Marketing
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ecommerce-website-development" class="nav-link">
                                        E-commerce Development
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="app-development" class="nav-link">
                                        App Development
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="bulk-sms" class="nav-link">
                                        Bulk SMS
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="travel-website-company" class="nav-link">
                                        Travel Website
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Payment-Gateway" class="nav-link">
                                        Payment Gateway
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Email-Marketing" class="nav-link">
                                        Email Marketing
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="HR-Services" class="nav-link">
                                HR Services
                                <i class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="Payroll-Outsourcing" class="nav-link">
                                        Payroll Outsourcing
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="General-Staffing" class="nav-link">
                                        General Staffing
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="IT-Staffing" class="nav-link">
                                        IT Staffing
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="Statutory-Compliance" class="nav-link">
                                        Statutory Compliance
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="NextGen-HRMS" class="nav-link">
                                        NextGen HRMS
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Recruitment-Solutions" class="nav-link">
                                        Recruitment Solutions
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="AarambhPro-Startup-Solutions" class="nav-link">
                                        AarambhPro Startup Solutions
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="HR-Consulting" class="nav-link">
                                        HR Consulting
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Training-and-Development" class="nav-link">
                                        Training and Development
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="portfolio" class="nav-link">
                                Portfolio

                            </a>


                        </li>

                        <li class="nav-item">
                            <a href="contact" class="nav-link">
                                Contact
                            </a>
                        </li>
                    </ul>

                    <div class="others-options">
                        <div class="burger-menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
var chatbox = document.getElementById('fb-customer-chat');
chatbox.setAttribute("page_id", "102069438515856");
chatbox.setAttribute("attribution", "biz_inbox");

window.fbAsyncInit = function() {
    FB.init({
        xfbml: true,
        version: 'v12.0'
    });
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>