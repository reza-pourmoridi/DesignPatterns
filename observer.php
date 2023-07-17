<?php
// Define the subject (the chat room)
class ChatRoom {
    private $observers = array();

    public function registerObserver($observer) {
        $this->observers[] = $observer;
    }

    public function removeObserver($observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers($message) {
        foreach ($this->observers as $observer) {
            $observer->receiveMessage($message);
        }
    }

    public function sendMessage($message) {
        $this->notifyObservers($message);
    }
}

// Define the observers (the users in the chat room)
interface Observer {
    public function receiveMessage($message);
}

class User implements Observer {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function receiveMessage($message) {
        echo $this->name . " received message: " . $message . "<br>";
    }
}



class Admins implements Observer {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function receiveMessage($message) {
        echo " admin ". $this->name . " you received message: " . $message . "<br>";
    }
}


// Create the subject and observers
$chatRoom = new ChatRoom();
$user1 = new User("Alice");
$user2 = new User("Bob");

$admin1 = new Admins("fred");


// Register the observers with the subject
$chatRoom->registerObserver($user1);
$chatRoom->registerObserver($user2);
$chatRoom->registerObserver($$admin1);


// User 1 sends a message
$chatRoom->sendMessage("Hello, everyone!");






//Example 2
///////////////////////////////////////////////////////
// Suppose you are building a simple weather application that receives temperature updates from a weather station and displays the
//  temperature to the user. You want to use the Observer pattern to ensure that when the temperature changes, the application automatically
//   updates the temperature display.

class weatherStation {
    public $observer = array();
    public $tempeature;

    public function registerObserver($observer) {
            $this->observer[] = $observer;
    }

    public function removeObserver ($observer) {
        $key = array_search($observer, $this->observer);
        if ($key == false) {
            unset($this->observer[$key]);
        }
    }

    public function setTempeature ($thempeature) {
        $this->tempeature = $thempeature;
        notifyObserverrs($tempeature);
    }

    public function notifyObserverrs ($tempeature) {
        foreach($this->observer as $item){
            $item->update($this->tempeature);
        }
    }

}


class Observer {
    public function update($tempeature) {
        echo "The current temperature is: " . $temperature . " degrees Celsius.<br>";
    }
}



$weatherstation = new weatherStation();
$observer  = new Observer();
$observer2  = new Observer();

$weatherstation->registerObserver($observer);
$weatherstation->registerObserver($observer2);

$weatherstation->setTempeature('37');