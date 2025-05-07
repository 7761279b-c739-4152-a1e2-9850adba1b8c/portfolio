<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="ROBOTS" content="NOINDEX,NOFOLLOW" />
        <!-- <title></title> -->
        <link rel="stylesheet" href="css/styles.css" />
    </head>

    <body>
        <nav>
            <!-- navigation sidebar -->
            <div><h1><a href="index.html">J</a></h1></div>
            <div><a href="about-me.html">About Me</a></div>
            <div><a href="index.html#portfolio">My Portfolio</a></div>
            <div><a href="coding-examples.html">Coding Examples</a></div>
            <div><a href="scs-scheme.html">SCS Scheme</a></div>
            <div class="contact-highlight"><a href="index.html#contact">Contact Me</a></div>

        </nav>
        <div class="main">
            <a id="nav-burger">
                <div></div><div></div><div></div>
            </a>
            <div class="coding-examples container">
                <h2>Coding Examples</h2>
                <p>More coming soon</p>

                <h3>Example of a button mixin in scss</h3>
                <p>from recreating netmatters' webpage<br>used to repeat the same styles on multiple button colors</p>
<pre>@mixin button($color) {
    @extend %btn;
    background-color: $color;
    &:hover {
        background-color: darken($color, 8%)
    }
}</pre>
                <h3>Example of detecting scroll (for a header to show) in JavaScript</h3>
                <p>from recreating netmatters' website<br>used to show a header when you scroll up and hide it when you scroll down</p>
<pre>let lastScrollY = window.scrollY;
let scrollDirection = true;
window.addEventListener('scrollend', (event) => {
    if (scrollDirection) {
        closeHeader();
    } else {
        openHeader();
    }
})
window.addEventListener('scroll', () => {
    scrollDirection = lastScrollY < window.scrollY;
    lastScrollY = window.scrollY;
    if (lastScrollY == 0) {
        scrollDirection = true;
        closeHeader();
    }
});</pre>
                <h3>Example of adding an element to a page in JavaScript</h3>
                <p>from js arrays [modified since this is split across functions originally]<br></p>
<pre>element = document.createElement('div');
element.classList.add('box');
element.innerHTML = `&lt;h3&gt;Images for: &lt;code&gt;${name}&lt;/code&gt;.&lt;/h3&gt;
    &lt;div class="img-grid"&gt;&lt;/div&gt;`;

assigned.innerHTML = '';
assigned.appendChild(element);
</pre>
            </div>
        </div>
        <script src="js/nav.js"></script>
    </body>
</html>