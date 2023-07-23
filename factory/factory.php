<?php

interface PostInterface {
    public function display();
}

class Article implements PostInterface {
    public function display() {
        echo "Displaying an article post.\n";
    }
}

class Video implements PostInterface {
    public function display() {
        echo "Displaying a video post.\n";
    }
}

class Image implements PostInterface {
    public function display() {
        echo "Displaying an image post.\n";
    }
}

class PostFactory {
    public function createPost(string $postType): PostInterface {
        // TODO: Implement the factory logic to create the appropriate post instance based on the postType.
        // You can use a switch statement or if-else conditions to handle different post types.

        // Placeholder implementation for demonstration purposes
        if ($postType === 'article') {
            return new Article();
        } elseif ($postType === 'video') {
            return new Video();
        } elseif ($postType === 'image') {
            return new Image();
        } else {
            throw new Exception("Invalid post type: {$postType}");
        }
    }
}

// Usage example
$factory = new PostFactory();

$article = $factory->createPost('article');
$article->display();

$video = $factory->createPost('video');
$video->display();

$image = $factory->createPost('image');
$image->display();









// example 2 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


interface calculatorOperation {
    public function calculate(float $floatOne , float $floatTwo): float;
}

class addition {
    public function calculate(float $floatOne , float $floatTwo){
        return $floatOne + $floatTwo;
    }
}
class Subtraction  {
    public function calculate(float $floatOne , float $floatTwo){
        return $floatOne - $floatTwo;
    }
}
class Multiplication {
    public function calculate(float $floatOne , float $floatTwo){
        return $floatOne * $floatTwo;
    }
}
class Division  {
    public function calculate(float $floatOne , float $floatTwo){
        if ($floatTwo === 0) {
            throw new InvalidArgumentException("Division by zero is not allowed.");
        }
        return $floatOne / $floatTwo;
        }
}




class calculationFactory {
    public function createOperation (string $operationType): calculatorOperation{

        if($operationType == "addition"){
            return new addition();
            }
            elseif($operationType == "Subtraction") {
                return new Subtraction();
            }
            elseif($operationType == "Multiplication") {
                return new Multiplication();
            }
            elseif($operationType == "Subtraction") {
                return new Subtraction();
            }
            elseif($operationType == "Division") {
                return new Division();
            } else {
                throw new InvalidArgumentException("Invalid operation type: {$operationType}");
            }
    }
}

$calculationFactory = new calculationFactory();

$multiply = $calculationFactory->createOperation('Multiplication');
$multiplyFinal = $multiply->calculate(2 , 2);

var_dump($multiplyFinal);