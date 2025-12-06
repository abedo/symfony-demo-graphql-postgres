<?php

namespace App\Resolver;

use App\Repository\UserRepository;
use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Definition\Resolver\QueryInterface;

class UserResolver implements QueryInterface
{
    public function __construct(private UserRepository $userRepository)
    {

    }

    public function __invoke(ResolveInfo $info, mixed $value): mixed
    {
        $method = $info->fieldName;

        return $this->$method($value);
    }

    public function resolveUsers(): array
    {
        return $this->userRepository->findAll();
    }

    public function resolveUser(array $args): ?User
    {
        // Pobieramy ID z argumentów zapytania GraphQL
        return $this->userRepository->find($args['id']);
    }
}
