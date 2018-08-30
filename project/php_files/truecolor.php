<?php
$score=0;
echo $score;
?>
<style>
h1 {color:red;}
input[type="submit"]
{
background-color:red;
}
</style>
<body>
<h1>RED</h1>
</body>
<button type="button" id="true"></button>
<button type="button" id="false"></button>
<button onclick="getElementById('true').innerHTML=Date()"></button>
<button onclick="getElementById('false').innerHTML=Date()"></button>


