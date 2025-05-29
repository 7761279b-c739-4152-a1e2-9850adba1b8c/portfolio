<?php

$form_errors = [];
// form success will be done using `?submit=true` `$_GET["submit"] == "true"` value
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'parts/form-submit.php';
}

$title = "My Portfolio";
$description = "My Portfolio";
$current=".";
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
        <div>
            <a class="project" href="http://netmatters.joshua-goodall.netmatters-scs.co.uk/" target="_blank">
                <img src="img/recreating-netmatters.webp" class="project-img" alt="preview of recreating netmatters' website project" />
                <h2>Project One</h2>
                <p class="description">Recreating Netmatters' Website</p>
                <p class="view">View Project <span class="icon-right"></span></p>
            </a>
            <a class="gh" href="https://github.com/7761279b-c739-4152-a1e2-9850adba1b8c/Netmatters-homepage" target="_blank">View source on Github</a>
        </div>
        <div>
            <a class="project" href="http://js-array.joshua-goodall.netmatters-scs.co.uk/" target="_blank">
                <img src="img/js-arrays.webp" class="project-img" alt="preview of js arrays project" />
                <h2>Project Two</h2>
                <p class="description">JavaScript array<br>(dynamcially adding content to a webpage)</p>
                <p class="view">View Project <span class="icon-right"></span></p>
            </a>
            <a class="gh" href="https://github.com/7761279b-c739-4152-a1e2-9850adba1b8c/js-array" target="_blank">View source on Github</a>
        </div>
        <div>
            <a class="project" href="http://laravel.joshua-goodall.netmatters-scs.co.uk" target="_blank">
                <img src="img/laravel.webp" class="project-img" alt="preview of laravel example" />
                <h2>Project Three</h2>
                <p class="description">Laravel example<br>(MVC and database)
                <p class="view">View Project <span class="icon-right"></span></p>
            </a>
            <a class="gh" href="https://github.com/7761279b-c739-4152-a1e2-9850adba1b8c/Laravel-assessment" target="_blank">View source on Github</a>
        </div>
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
                    <a></a>
                </div>
            <?php elseif(!empty($form_errors)): ?>
                <div id="formError">
                    <p>Unable to submit form:</p>
                        <?php foreach($form_errors as $error): ?>
                            <p><?= $error ?></p>
                            <a></a>
                        <?php endforeach; ?>
                    <a></a>
                </div>
            <?php endif; ?>
            <div class="form-grid" id="contact">
                <label for="name" class="hidden">Name</label>
                <input type="text" id="name" name="name" placeholder="Name*" />
                <label for="email" class="hidden">Email Address</label>
                <input inputmode="email" id="email" name="email" placeholder="Email Address*" />
                <label for="phone" class="hidden">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Phone" />
                <label for="subject" class="hidden">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Subject*" />
                <label for="message" class="hidden">Message</label>
                <textarea id="message" name="message" placeholder="Message*"></textarea>
            </div>
            <button type="submit" id="submit">Submit</button>
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