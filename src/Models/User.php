<?php

namespace MvcLite\Models;

use MvcLite\Models\Engine\Model;
use PDO;

class User extends Model
{

    public function __construct()
    {
        parent::__construct();
    }



    public function getUserById(int $publisherId): Engine\ModelCollection
    {

        return Model::select('users')
            ->where('id', '=', $publisherId)
            ->execute();
    }


}