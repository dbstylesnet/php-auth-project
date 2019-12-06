<?php
namespace App\Authentication\Repository;

use App\Authentication\UserInterface;
use App\Core\Db\ConnectionFactory;
use \Doctrine\DBAL\Connection; 
use \Doctrine\DBAL\ConnectionException;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\DBAL\FetchMode;
use App\Authentication\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Connection factory object
     * @param ConnectionFactory $connectionFactory
     */
    private $connectionFactory;

    public function __construct(ConnectionFactory $conn)
    {
        $this->connectionFactory = $conn;
    }

    public function findById(int $id): ?UserInterface
    {
        $connection = $this->connectionFactory->getConnection();
        $sqlBuilder = $connection->createQueryBuilder();
        $sqlBuilder
            ->select('*')
            ->from('user')
            ->where('id = :id')
            ->setParameter(':id', $id);

        $stmt = $sqlBuilder->execute();
        $data = $stmt->fetch(FetchMode::ASSOCIATIVE);

        if (empty($data)) {
            return null;
        }
      
        return new User(
            $data['login'],
            $data['hash'],
            $data['salt'],
            $data['id']
        );
    }

	/**
	 * Method finds a user by this given login and returns it
	 *
	 * @param string $login
	 * @return UserInterface|null
	 */
    public function findByLogin(string $login): ?UserInterface
    {
        $connection = $this->connectionFactory->getConnection();
        $sqlBuilder = $connection->createQueryBuilder();
        $sqlBuilder
            ->select('*')
            ->from('user')
            ->where('login = :login')
            ->setParameter(':login', $login);

        $stmt = $sqlBuilder->execute();
        $data = $stmt->fetch(FetchMode::ASSOCIATIVE);
        
        if (empty($data)) {
            return null;
        }
      
        return new User(
            $data['login'],
            $data['hash'],
            $data['salt'],
            $data['id']
        );
    }

	/**
	 * Method saves the given user into storage
	 *
	 * @param UserInterface $user
	 */
    public function save(UserInterface $user): UserInterface
    {
        $connection = $this->connectionFactory->getConnection();
        $sqlBuilder = $connection->createQueryBuilder();

        if ($user->getId()) {
            $sqlBuilder
                ->update('user')
                ->set('login', ':login')
                ->set('hash', ':password')
                ->set('salt', ':salt')
                ->where('id = :id')
                ->setParameter(':id', $user->getId())
                ->setParameter(':login', $user->getLogin())
                ->setParameter(':salt', $user->getSalt())
                ->setParameter(':password', $user->getPassword());

            try {
                $rowsAffected = $sqlBuilder->execute();
                $updated = $this->findById($user->getId());
            
                if ($rowsAffected === 0) {
                    if (empty($updated)) {
                        throw new NoUserException('User does not exist');
                    }
                }

                return $updated;
            } catch(UniqueConstraintViolationException $e) {
                throw new DuplicateUserException('User with this login already exists');
            }
        } else {
            $sqlBuilder
                ->insert('user')
                ->values(
                    array(
                        'login' => ':login',
                        'hash' => ':password',
                        'salt' => ':salt'
                    )
                )
                ->setParameter(':login', $user->getLogin())
                ->setParameter(':salt', $user->getSalt())
                ->setParameter(':password', $user->getPassword());

            try {
                $sqlBuilder->execute();
            } catch(UniqueConstraintViolationException $e) {
                throw new DuplicateUserException('User with this login already exists');
            }

            return $this->findById($connection->lastInsertId());
        }
    }
}
