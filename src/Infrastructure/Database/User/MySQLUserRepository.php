<?php

declare(strict_types=1);

namespace App\Infrastructure\Database\User;

use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserRepository;
use PDO;

class MySQLUserRepository implements UserRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values([]); // Cần implement nếu cần
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): User
    {
        if (!$id) {
            throw new UserNotFoundException();
        }

        return new User(1, 'bill.gates', 'Bill', 'Gates'); // Cần implement nếu cần
    }

    public function findUserByUsername(string $username): ?User
    {
        // Truy vấn theo cột username
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) return null;

        return new User(
            (int)$data['id'], 
            $data['username'], 
            $data['email'], 
            $data['password_hash']
        );
    }
}