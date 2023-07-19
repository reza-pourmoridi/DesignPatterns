<?php
// UserRepository.php

class UserRepository
{
    // Simulated data source (you can replace this with a real database connection)
    private $users = [];

    public function __construct()
    {
        // Adding some sample users to the repository
        $this->users[] = new User(1, 'John Doe', 'john@example.com');
        $this->users[] = new User(2, 'Jane Smith', 'jane@example.com');
    }

    public function getById($id)
    {
        foreach ($this->users as $user) {
            if ($user->getId() === $id) {
                return $user;
            }
        }

        return null;
    }

    public function getAll()
    {
        return $this->users;
    }

    public function save(User $user)
    {
        // In a real implementation, this method would persist the user to the database.
        // For this example, we'll just add the user to our simulated data source.
        $this->users[] = $user;
    }
}



// index.php

// Assuming you have already included the User and UserRepository classes.

// Create a new UserRepository instance
$userRepository = new UserRepository();

// Get a user by ID
$user = $userRepository->getById(1);
if ($user) {
    echo "User found: {$user->getName()} ({$user->getEmail()})";
} else {
    echo "User not found.";
}

// Get all users
$users = $userRepository->getAll();
echo "\n\nAll users:\n";
foreach ($users as $user) {
    echo "{$user->getName()} ({$user->getEmail()})\n";
}

// Save a new user
$newUser = new User(3, 'New User', 'newuser@example.com');
$userRepository->save($newUser);
