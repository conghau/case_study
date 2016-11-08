<?php

interface UserInterface {
  function getName();

  function setName($name);
}

interface CustomerInterface {
  function getLName();

  function setLName($lname);

  function getFName();

  function setFName($fname);
}

class User implements UserInterface {
  private $name;

  public function __construct($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }
}

class Customer implements CustomerInterface {
  private $lname;
  private $fname;

  public function getLName() {
    return $this->lnamename;
  }

  public function setLName($lname) {
    $this->lname = $lname;
  }

  public function getFName() {
    return $this->fname;
  }

  public function setFName($fname) {
    $this->fname = $fname;
  }

}

class UserToCustomer implements CustomerInterface {
  private $lname;
  private $fname;
  private $name;

  public function __construct(User $user) {
//    $this->user = $user;
    $this->name = $user->getName();
    $tmp = explode(" ", $this->name);
    $this->setFName($tmp[0]);
    $this->setLName($tmp[1]);
  }

  public function getLName() {
    return $this->lname;
  }

  public function setLName($lname) {
    $this->lname = $lname;
  }

  public function getFName() {
    return $this->fname;
  }

  public function setFName($fname) {
    $this->fname = $fname;
  }
}

$user = new User("Cong Hau");
$adapter = new UserToCustomer($user);
echo "User -> Name: {$user->getName()}";
echo "<br>";
echo "Customer-> FirstName: {" . $adapter->getFName()."} LastName: {" . $adapter->getLName(). '}';