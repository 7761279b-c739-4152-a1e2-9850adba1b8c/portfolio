<?php 
$title = "My Coding Examples";
$description = "My Coding Examples";
$current="coding-examples";
require 'parts/header.php';
?>
<div class="main">
    <a id="nav-burger">
        <div></div><div></div><div></div>
    </a>
    <div class="coding-examples container">
        <h1>Coding Examples</h1>
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
    scrollDirection = lastScrollY &lt; window.scrollY;
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
<?php require 'parts/footer.php'; ?>