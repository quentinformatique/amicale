<?php

namespace MvcLite\Models;

use MvcliteCore\Models\Model;

class User extends Model
{


    public static function newAgent(mixed $agentCode, mixed $phone, mixed $email): Model
    {
        return User::create([
            'code_agent' => $agentCode,
            'phone' => $phone,
            'mail' => $email
        ]);
    }

    public static function getUserByCode(mixed $agentCode): \MvcliteCore\Models\ModelCollection
    {
        return User::select()
            ->where('code_agent',  $agentCode)
            ->execute();
    }

    public static function getUser(string $agentCode, string $phone, string $email): \MvcliteCore\Models\ModelCollection
    {
        return User::select('id')
            ->where('code_agent',  $agentCode)
            ->where('phone',  $phone)
            ->where('mail',  $email)
            ->execute();
    }

    public function getUserById(int $publisherId): \MvcliteCore\Models\ModelCollection
    {

        return User::select('users')
            ->where('id', '=', $publisherId)
            ->execute();
    }


}