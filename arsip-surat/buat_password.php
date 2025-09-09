<?php
// GANTI baris ini
$passwordAsli = 'operator123';

// Biarkan sisanya sama
$hashPassword = password_hash($passwordAsli, PASSWORD_DEFAULT);

echo "Password Asli: " . $passwordAsli;
echo "<br><br>";
echo "Password Hash (untuk di-copy ke database):";
echo "<br>";
echo '<input type="text" value="' . $hashPassword . '" size="100">';
