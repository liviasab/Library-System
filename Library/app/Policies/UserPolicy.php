<?php
namespace App\Policies;
use App\Models\User;
class UserPolicy
{
public function isCliente(User $user): bool
{
return $user->role == 3;
}
public function isBibliotecario(User $user): bool
{
return $user->role == 2;
}
public function isAdmin(User $user): bool
{
return $user->role == 1;
}
/**
* Create a new policy instance.
*/
public function __construct()
{
// Código aqui, se necessário
}
}