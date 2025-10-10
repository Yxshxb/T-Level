<?php

echo '
<p>register</p> 
<a href="index.php"><button type="login">login</button></a>

<form action="process-register.php" method="post">
  <label>Email: <input type="email" name="email" required></label><br>
  <label>Password: <input type="password" name="password" required></label><br>
  <button type="submit">Sign Up</button>
</form>';

