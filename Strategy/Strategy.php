<?php

interface PaymentMethod {
    public function processPayment(float $amount);
}

class CreditCardPayment implements PaymentMethod {
    public function processPayment(float $amount) {
        echo "Processing credit card payment for $ {$amount}\n";
        // Implement credit card payment processing logic here
    }
}

class PayPalPayment implements PaymentMethod {
    public function processPayment(float $amount) {
        echo "Processing PayPal payment for $ {$amount}\n";
        // Implement PayPal payment processing logic here
    }
}

class BitcoinPayment implements PaymentMethod {
    public function processPayment(float $amount) {
        echo "Processing Bitcoin payment for $ {$amount}\n";
        // Implement Bitcoin payment processing logic here
    }
}

class PaymentProcessor {
    private $paymentMethod;

    public function setPaymentMethod(PaymentMethod $paymentMethod) {
        $this->paymentMethod = $paymentMethod;
    }

    public function processPayment(float $amount) {
        if ($this->paymentMethod === null) {
            throw new Exception("Payment method not set.");
        }
        $this->paymentMethod->processPayment($amount);
    }
}

// Usage example
$paymentProcessor = new PaymentProcessor();

$creditCardPayment = new CreditCardPayment();
$paymentProcessor->setPaymentMethod($creditCardPayment);
$paymentProcessor->processPayment(100);

$payPalPayment = new PayPalPayment();
$paymentProcessor->setPaymentMethod($payPalPayment);
$paymentProcessor->processPayment(50);

$bitcoinPayment = new BitcoinPayment();
$paymentProcessor->setPaymentMethod($bitcoinPayment);
$paymentProcessor->processPayment(200);
