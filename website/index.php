<?php

$form_errors = [];
// form success will be done using `?submit=true` `$_GET["submit"] == "true"` value
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'parts/form-submit.php';
}

$title = "My Portfolio";
require 'parts/header.php';
?>
<a id="nav-burger">
    <div></div><div></div><div></div>
</a>
<div class="main">
    <!-- main content -->
    <header>
        <!-- header image and name -->
            <div class="header-overlay">
            <h1 id="typing">My Name is Joshua Goodall</h1>
            <p>I'm a web developer</p>
            <div class="scroll-button">
                <a href="#portfolio">
                    <p>Scroll down</p>
                    <p class="chevron-down"></p>
                </a>
            </div>
        </div>

    </header>
    <div class="projects container" id="portfolio">
        <!-- projects list -->
        <a class="project" href="http://netmatters.joshua-goodall.netmatters-scs.co.uk/" target="_blank">
            <img src="img/recreating-netmatters.webp" class="project-img" />
            <h2>Project One</h2>
            <p class="description">Recreating Netmatters' Website</p>
            <p>View Project <span class="icon-right"></span></p>
        </a>
        <a class="project" href="http://js-array.joshua-goodall.netmatters-scs.co.uk/" target="_blank">
            <img src="img/project1.webp" class="project-img" />
            <h2>Project Two</h2>
            <p class="description">JavaScript array<br>(dynamcially adding content to a webpage)</p>
            <p>View Project <span class="icon-right"></span></p>
        </a>
        <a class="project" href="#" target="_blank">
            <img src="img/project1.webp" class="project-img" />
            <h2>Project Three</h2>
            <p>View Project <span class="icon-right"></span></p>
        </a>
    </div>
    <div class="contact container">
        <!-- contact form -->
            <div>
            <h2> Get In Touch</h2>
            <p>If you want to get in touch with me, please fill out the form and I'll aim to respond to you in 2 working days.</p>
            </div>
            <form method="POST" action="#" aria-live>
            <?php if($_GET["submit"] ?? "false" == "true"): ?>
                <div id="formError" class="formSuccess">
                    <p>Form successfully submitted</p>
                </div>
            <?php elseif(!empty($form_errors)): ?>
                <div id="formError">
                    <p>Unable to submit form:</p>
                        <?php foreach($form_errors as $error): ?>
                            <p><?= $error ?></p>
                        <?php endforeach; ?>
                    <a></a>
                </div>
            <?php endif; ?>
            <div class="form-grid" id="contact">
                <label for="first-name" class="hidden">First Name</label>
                <input type="text" id="first-name" name="first-name" placeholder="First Name*" />
                <label for="last-name" class="hidden">Last Name</label>
                <input type="text" id="last-name" name="last-name" placeholder="Last Name*" />
                <label for="email" class="hidden">Email Address</label>
                <input inputmode="email" id="email" name="email" placeholder="Email Address*" />
                <label for="subject" class="hidden">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Subject*" />
                <label for="message" class="hidden">Message</label>
                <textarea id="message" name="message" placeholder="Message*"></textarea>
            </div>
            <button type="submit" id="submit" href="">Submit</button>
            </form>
    </div>
    <footer>
        <p></p>
        <div class="scroll-button">
            <a href="#">
                <p class="chevron-up"></p>
                <p>Back to top</p>
            </a>
        </div>
    </footer>
</div>
<script src="js/typing.js"></script>
<script src="js/form.js"></script>
<?php require 'parts/footer.php'; ?>