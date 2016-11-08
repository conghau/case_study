<?php

/**
 * Created by PhpStorm.
 * User: HAUTRUONG
 * Date: 11/8/2016
 * Time: 8:52 PM
 */
namespace Ob;
interface Observer {
    public function update($sms);
}

interface Subject {
    public function notify();

    public function attach(Observer $observer);

    public function detach(Observer $observer);
}

class Customer implements Observer {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function update($sms) {
        // TODO: Implement update() method.
        echo "Hello {$this->name}, you have sms promotion: {$sms}";
        echo "<br>";
    }
}

class Event implements Subject {

    private $eventName;
    private $obs = [];

    public function __construct($eventName) {
        $this->eventName = $eventName;
    }

    public function notify() {
        // TODO: Implement notify() method.
        foreach ($this->obs as $observer) {
            $observer->update($this->eventName);
        }
    }

    public function attach(Observer $observer) {
        // TODO: Implement attach() method.
        array_push($this->obs, $observer);
    }

    public function detach(Observer $observer) {
        // TODO: Implement detach() method.
        foreach ($this->obs as $key => $val) {
            if ($val == $observer) {
                unset($this->obs[$key]);
            }
        }
    }
}

$customer1 = new Customer('Truong Cong Hau');
$customer2 = new Customer('Hau Hau');
$customer3 = new Customer('Hau Truong');

$event1 = new Event("x2 price");
$event1->attach($customer1);
$event1->attach($customer2);
$event1->attach($customer3);

$event1->notify();