<?php

namespace MvcLite\Models;

use MvcLite\Models\Engine\Model;

class User extends Model
{


    public function getUserById(int $publisherId): Engine\ModelCollection
    {

        return Model::select('users')
            ->where('id', '=', $publisherId)
            ->execute();
    }


}