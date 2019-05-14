<?php
$nextWeek = time() + (7 * 24 * 60 * 60);
// 7 jours; 24 heures; 60 minutes; 60 secondes
echo 'Aujourd\'hui :       '. date('Y-m-d') ."\n";
echo 'Semaine prochaine : '. date('Y-m-d', $nextWeek) ."\n";
echo time();
?>
