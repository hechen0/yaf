<?php
$data = array(0=>1, 1=>2, 2=>3);
$msg = msgpack_pack($data);
var_dump($msg);
?>
