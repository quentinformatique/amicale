<?php

namespace MvcLite\Models;

use MvcLite\Database\Engine\Database;
use MvcLite\Models\Engine\Model;

class User extends Model
{


    public static function newAgent(mixed $agentCode, mixed $phone, mixed $email): \MvcLite\Database\Engine\DatabaseQuery
    {
        return Database::query("INSERT INTO users (code_agent, phone, mail) VALUES (?, ?, ?)", [$agentCode, $phone, $email]);
    }

    public static function getUserByCode(mixed $agentCode): Engine\ModelCollection
    {
        return User::select()
            ->where('code_agent', '=', $agentCode)
            ->execute();
    }

    public function getUserById(int $publisherId): Engine\ModelCollection
    {

        return User::select('users')
            ->where('id', '=', $publisherId)
            ->execute();
    }


}