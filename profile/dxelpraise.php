<?php

    $config = include('../config.php');
    $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
    $con = new PDO($dsn, $config['username'], $config['pass']);

    $exe = $con->query('SELECT * FROM password LIMIT 1');
    $data = $exe->fetch();
    $password = $data['password'];

    if (isset($_GET['sendmail'])) {

        $subject = "Hello";
        $password = htmlentities(strip_tags(trim($password)));
        $body = htmlentities(strip_tags(trim($_GET['subject'])));
        $to = "dxelpraise@gmail.com";

        $location = "../sendmail.php?to=$to&subject=$subject&password=$password&body=$body";

        header("Location: " . $location);

    }

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>dxelpraise's profile</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Open+Sans:700,400,300);
* {
  margin:0;
  padding:0;
  box-sizing:border-box;
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  -webkit-font-smoothing:antialiased;
  -moz-font-smoothing:antialiased;
  -o-font-smoothing:antialiased;
  font-smoothing:antialiased;
  text-rendering:optimizeLegibility;
}

  ::-moz-selection {
   background: rgba(0,0,0,0.2);
    }
::selection {
 background: rgba(0,0,0,0.2);
  }
  body{

background: #07a;
  background: -webkit-linear-gradient(left,#07a, #0aa, #07a);
  background: -o-linear-gradient(right,#07a, #0aa, #07a);
  background: -moz-linear-gradient(right,#07a, #0aa, #07a);
  background: linear-gradient(to right,#07a, #0aa, #07a);
  background-size: 200%;
  background-position: 0%;
  font-family: 'Open Sans', sans-serif;
  font-size: 1em;
  margin: 1.5em 4em 0;
}

.container {
  max-width:700px;
  width:100%;
  margin:0 auto;
  position:relative;
/* padding: 12px;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;*/
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: none;

}
#contact {
  background:#F9F9F9;
  padding:25px;
  margin:50px 0;
}
#contact h4 {
  margin:5px 0 15px;
  display:block;
  font-size:13px;
}
#contact h3 {
  color: #F96;
  display: block;
  font-size: 30px;
  font-weight: 400;
}
#contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea {
  width:100%;
  border:1px solid #CCC;
  background:#FFF;
  margin:0 0 5px;
  padding:10px;
  }
#contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea, #contact button[type="submit"] { font:400 12px/16px "Open Sans", Helvetica, Arial, sans-serif; 
}

textarea{
    height: auto;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

#contact textarea {
  height:100px;
  max-width:100%;
  resize:none;
}
#contact button[type="submit"]:hover {
  background:#09C;
}
#contact button[type="submit"]:active { box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5); }
fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}



::-moz-selection { background: rgba(0,0,0,0.2); }
::selection { background: rgba(0,0,0,0.2); }

body {
  background: #07a;
  background: -webkit-linear-gradient(left,#07a, #0aa, #07a);
  background: -o-linear-gradient(right,#07a, #0aa, #07a);
  background: -moz-linear-gradient(right,#07a, #0aa, #07a);
  background: linear-gradient(to right,#07a, #0aa, #07a);
  background-size: 200%;
  background-position: 0%;
  font-family: 'Open Sans', sans-serif;
  font-size: 1em;
  margin: 1.5em 4em 0;
  color: #f5f5f5;
  /**animation: bg-move 10s linear infinite;
  -webkit-animation: bg-move 10s linear infinite; **/
}

h1 {
  font-size: 3.5em;
  text-align: center;
  margin: -.1em 0 1em;
  font-weight: 700;
}
h2 {
  font-size: 3em;
  text-align: center;
  margin: -.1em 0 1em;
}
.circle, .home-circle {
  position: relative;
  margin: 0 auto 3em;
  height: 9em;
  width: 9em;
  border-radius: 50%;
  background: #999 url(https:///avatars3.githubusercontent.com/u/18211098?v=4&u=19f756c2f4d3947b1f567a5008584a37c3df5042&s=400) 80% 0%;
  background-size: 10em 10em;
  box-shadow: 0 0 0 0.8em rgba(255,255,255,0.3);
}
.circle {
  margin: -2.5em auto 0;
  height: 4em;
  width: 4em;
  background: #999 url(https://g/avatars3.githubusercontent.com/u/18211098?v=4&u=19f756c2f4d3947b1f567a5008584a37c3df5042&s=400) 70% 0%;
  background-size: 4.5em 4.5em;
  box-shadow: 0 0 0 0.4em rgba(255,255,255,0.3);
}
.home-circle:before, .home-circle:after, .circle:before, .circle:after {
  position: absolute;
  content: 'Web Developer';
  width: 8.5em;
  font-size: 1.7em;
  top: 2em;
  right: 6em;
  font-weight: 700;
}
.circle:before, .circle:after {
  font-size: 1.2em;
  top: 1em;
  right: 4em;
}
.circle:after, .home-circle:after {
  content: 'Graphic Designer';
  left: 7.25em;
}
.circle:after {
  left: 5em;
}
/*
.nav {
  margin: -10px auto;
  height: 3em;
  width: 30.3em;
}

.nav div {
  text-align: center;
  text-shadow: 0 0 7px rgba(0,0,0,0.3);
  font-size: 1.2em;
  line-height: 2em;
  height: 2em;
  padding: 0 1em;
  margin: 0 10px;
  background: rgba(0,0,0,0.3);
  border:solid 3px transparent;
  border-radius: 4px;
  opacity: 1;
  transition: all 500ms;
  float: left;
}
.nav div:hover {
  border:solid 3px #fff;
}*/
p.home {
  max-width: 9999em;
  text-align: center;
  margin: 3em 0 0;
  -webkit-animation: none;
  animation: none;
}
p.home:before {
  display: none;
}
p:before {
  content: '';
  display: block;
  max-width: 49em;
  width: 80%;
  height: 1px;
  background: rgba(0,0,0,0.3);
  border-bottom: solid 1px rgba(255,255,255,0.3);
  margin: 2.5em auto 10px;
}
p {
  background: transparent;
  line-height: 1.5;
  margin: 1.4em auto;
  max-width: 49em;
  font-size: 1.3em;
  font-weight: 300;
  animation: slide-in 1s ease-out;
  -webkit-animation: slide-in 1s ease-out;
}
dfn {
  border-bottom: dotted 1px rgba(0,0,0,0.4);
  cursor: help;
  font-style: normal;
}
 a {
  color: #fff;
  border-bottom: solid 1px rgba(0,0,0,0.4);
  text-decoration: none;
} 
h2.hidden {
  display: none;
  font-weight: 400;

  font-size: 1.8em;
  text-align: center;
}
span.hidden {
  display: none;
  font-size: 1em;
  margin: -1.75em auto 0;
  text-align: center;
}


.links {
  max-width: 50em;
  height: 10em;
  margin: 30px auto;
  /** margin-top: -3em; **/

}
a {text-decoration: none;}
.links a {
  width: 10em;
  float: left;
  margin: 0 1.58em;
  color: #fff;
  text-align: center;
}
.links a span {
  line-height: 3em;
  font-size: 1.2em;
  display: block;
  font-weight: 700;
}
a:nth-child(1) {margin-left: 0;}
a:nth-child(4) {margin-right: 0;}
a i {
  display: block;
  padding: 0.7em;
  border-radius: 50%;
  background: rgba(0,0,0,0.5);
  min-width: 1em;
  text-align: center;
  font-size: 3em;
  transition: box-shadow 300ms, font-size 200ms;
}
a:hover i {box-shadow: inset 0 0 3em rgba(0,0,0,0.6);}
footer, footer a {
  color: rgba(255,255,255,0.3);
}
footer {
  width: 100%;
  height: 1em;
  font-size: 0.8em;
  text-align: center;
  margin: 0;
  padding: 0;
}/*
.question {
  width: 80%;
  max-width: 49em;
  margin: 2em auto 0;
}
.question:last-child span{
  margin: 2em auto 200em;
}
.question span {
  display: block;
  padding: 0 1em 0.1em;
  background: rgba(0,0,0,0.4);
  width: calc(100% - 2.5em);
  transition: all 200ms;
  font-size: 2em;
  font-weight: 400;
  color: #fff;
    cursor: pointer;
}
  
.question span:hover {background: rgba(0,0,0,0.6);}
.question:nth-child(9n+1) span {border-left: solid 0.5em #F6BB42;}
.question:nth-child(9n+2) span {border-left: solid 0.5em #3BAFDA;}
.question:nth-child(9n+3) span {border-left: solid 0.5em #4A89DC;}
.question:nth-child(9n+4) span {border-left: solid 0.5em #37BC9B;}
.question:nth-child(9n+5) span {border-left: solid 0.5em #D770AD;}
.question:nth-child(9n+6) span {border-left: solid 0.5em #8CC152;}
.question:nth-child(9n+7) span {border-left: solid 0.5em #DA4453;}
.question:nth-child(9n+8) span {border-left: solid 0.5em #E9573F;}
.question:nth-child(9n+9) span {border-left: solid 0.5em #967ADC;}

.question li {
  width: calc(100% - 2em);
  background: rgba(0,0,0,0.3);
  padding: 1em;
  margin: 0;
  transition: all 200ms;
    list-style-type: none;
}
.question ul {
  width: 100%;
  padding: 0;
  margin: 0;
}
.question ul {display:none;}
.question.active ul {display: block;}

img.left {
  float: left;
  margin: 0 1em 1em 0;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

img.right {
  float: right;
  margin: 0 0 1em 1em;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
}
p a {
  color: #fff;
  border-bottom: dotted 1px #000;
}
label {
  font-size: 32px;
  line-height: 70px;
  padding: 50px 0 0;
  vertical-align: middle;
}*/
input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: none;

}

input[type="text"]:nth-child(2) {
  margin-left: 53px;
}
input[type="text"]:nth-child(4) {
  margin-left: 61px;
}
textarea {
  margin: 20px 0 0 10px;
  height: 300px;
  padding: 14px;
  width: 586px;
  max-width: 592px;
  max-height: 500px;
}
label:nth-child(5) {
  vertical-align: top;
}

form {
  width: 600px;
  position: relative;
  margin: -30px auto 40;
  padding: 0 10px 20px;
}
input:focus, textarea:focus {
    border: solid 3px rgba(0,0,0,0.2);
}
input:active, textarea:active {
    border: dashed 3px rgba(0,0,0,0.5);
}
.dev-head {
  margin-top: 1em;
}
@media (max-width: 1200px) {
    p {
    font-size: 1.1em;
    animation: fade-in 1s ease-out;
    -webkit-animation: fade-in 1s ease-out;
  }
}/*
@media (max-width: 950px) {
  .links a {font-size: 0.8em;}
  .links {max-width: 40.1em;}
  textarea {margin-left: 0;}
  form {width: 600px;}
  input[type="text"]:nth-child(2) {margin-left: 0;}
  input[type="text"]:nth-child(4) {margin-left: 0;}  
  input[type="submit"] {
    width: 620px;
    border-radius: 3px;
    height: 50px;
    left: 10px;
  }
  input[type="submit"]:focus {
   /** -webkit-animation: load 1s;
    animation: load 1s; **/
   /* border-top: 0;
    border-left: 0;
    background: rgba(100,255,120,1);
  }*/
}
@media (max-width: 800px) {
  h2.hidden, span.hidden {display: block;}
  .home-circle {
    margin: -2em auto 2em;
    height: 7em;
    width: 7em;
    border-radius: 50%;
    background: #999 url(https:///avatars3.githubusercontent.com/u/18211098?v=4&u=19f756c2f4d3947b1f567a5008584a37c3df5042&s=400) 70% 0%;
    background-size: 8.2em 8.2em;
    box-shadow: 0 0 0 0.6em rgba(255,255,255,0.3);
  }
  .home-circle:before, .home-circle:after {content: '';}
  .links a {margin: 0;}
  .links a:nth-child(1) {float: left;}
  .links a:nth-child(2) {float: right;}
  .links a:nth-child(3) {float: left;}
  .links a:nth-child(4) {float: right;}
  .links {
    max-width: 20em;
    height: 16em;
  }
  footer a {display: none;}
  .question span {font-size: 1.5em;}
  input[type="text"], textarea {width: 100%;}
  input[type="submit"] {width: calc(100% + 14px);}
  form {width: 90%;}
}
@media (max-width: 500px) {
  .circle {display: none;}
  .question span {font-size: 1em;}
}
/
}
.fa {
    display: inline-block;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
a i {
    display: block;
    padding: 0.7em;
    border-radius: 50%;
    background: rgba(0,0,0,0.5);
    min-width: 1em;
    text-align: center;
    font-size: 3em;
    transition: box-shadow 300ms, font-size 200ms;
}
</style>
</head>
 <body>
<p class="home">Hello! My name is</p>
<h1>David umoren</h1>

<div class="home-circle"></div>


<h2 class="hidden">Web Developer</h2>
<span class="hidden">&amp;</span>
<h2 class="hidden">Graphic Designer</h2>

<p>I'm <dfn title="from akwa ibom state, nigeria.">akwa ibom state, nigeria</dfn> with a passion for perfection. I am a tireless seeker of knowledge . I always strive to write elegant and efficient code, whether it be HTML, CSS or php.  When I'm not writing codes, I'm reading cool books or playing football.</p>

<!--links-->
<div class="links">
  <a href="https://github.com/davidumoren"><i class="fa fa-github"></i><span>davidumoren</span></a>
  <a href="slack.com/dxelpraise"><i class="fa fa-slack"></i><span>Dxelpraise</span></a>
  <a href="https://github.com/davidumoren/hng"><i class="fa fa-code"></i><span> #stage1</span></a>
  <a href="#contact"><i class="fa fa-briefcase"></i><span> Contact me</span></a>
</div>
<!--contact form-->
<div class="container">
  <form  id="contact" action="" method="get">
  <fieldset>
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>
    </fieldset>
    <fieldset>
    <label for="email">Email</label>
    <input type="text" id="email" name="lastname" placeholder="Your Email" required>
     </fieldset>
     <fieldset>
    <label for="phone">Phone number</label>
    <input type="text" id="tel" name="phone" placeholder="Your telephone" required>
     </fieldset>
     <fieldset>
    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
</fieldset>
    <input type="submit" name="sendmail"  value="Submit">
  </form>
</div>

<footer>&copy;2017 davidumoren <a href="mailto:dxelpraise@gmail.com">| dxelpraise@gmail.com</a></footer>

</body>
</html>

