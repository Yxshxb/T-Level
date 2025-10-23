
<?php

echo '
<p>login</p>
<a href="register.php"><button type="submit">register</button></a>

<form action="process-login.php" method="post">
  <label>Email: <input type="email" name="email" required></label><br>
  <label>Password: <input type="password" name="password" required></label><br>
  <button type="submit">Sign Up</button>
</form>';

