<?php
require_once("../autoloader.php");

use Hillel\User;

$user = User::find(1);
echo($user); // SELECT * FROM user WHERE id = :id


$user->name = 'John';
$result = $user->save();
echo($result); // UPDATE user SET name = :name, email = 'email' WHERE id = :id

$result = $user->delete();
echo($result); // DELETE FROM user WHERE id = :id

$user = new User;
$user->name = 'John';
$user->email = 'some@gmail.com';
$result = $user->save();
echo ($result); // INSERT INTO user (id, name, email) VALUES (:id, :name, :email)

