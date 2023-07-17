<?php
// Let's say you are building a text processing application that applies various formatting options to a
//  given text. You want to implement a text decorator that adds specific decorations, such as bold, italic, or underline, to the text dynamically.


// Interface defining the Text interface and basic implementation
interface TextInterface {
    public function format(): string;
}

class Text implements TextInterface {
    private $text;

    public function __construct(string $text) {
        $this->text = $text;
    }

    public function format(): string {
        return $this->text;
    }
}

// Abstract decorator class
abstract class TextDecorator implements TextInterface {
    protected $text;

    public function __construct(TextInterface $text) {
        $this->text = $text;
    }

    public function format(): string {
        return $this->text->format();
    }
}

// Concrete decorators
class BoldTextDecorator extends TextDecorator {
    public function format(): string {
        return '<b>' . parent::format() . '</b>';
    }
}

class ItalicTextDecorator extends TextDecorator {
    public function format(): string {
        return '<i>' . parent::format() . '</i>';
    }
}

class UnderlineTextDecorator extends TextDecorator {
    public function format(): string {
        return '<u>' . parent::format() . '</u>';
    }
}

// Usage example
$text = new Text('Hello, World!');

$boldText = new BoldTextDecorator($text);
$italicText = new ItalicTextDecorator($boldText);
$finalText = new UnderlineTextDecorator($italicText);

echo $finalText->format();

















/// second example 
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////

interface NotifierInterface {
    public function sendNotification(string $message);
}

class Notifier implements NotifierInterface {
    public function sendNotification(string $message) {
        echo "Sending notification: {$message}\n";
    }
}

abstract class TimestampDecorator implements NotifierInterface {
    
    protected $notifier;
    public function __construct(NotifierInterface  $Notifier){
        $this->notifier = $notifier;
    }

    public function sendNotification(string $massage) {
        $timestamp = date('Y-m-d H:i:s');
        $massage = " $timestamp  $massage";
        $this->sendNotification(massage);
    }


}


class EncryptionDecorator implements NotifierInterface {
    private $notifier;

    public function __construct(NotifierInterface $notifier) {
        $this->notifier = $notifier;
    }

    public function sendNotification(string $message) {
        $encryptedMessage = encrypt($message);
        $this->notifier->sendNotification($encryptedMessage);
    }
}


// Usage example
$notifier = new Notifier();
$notifierWithTimestamp = new TimestampDecorator($notifier);
$notifierWithTimestampAndEncryption = new EncryptionDecorator($notifierWithTimestamp);

$notifierWithTimestampAndEncryption->sendNotification("Hello, World!");