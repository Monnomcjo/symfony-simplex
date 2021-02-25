<?php declare(strict_types=1);

namespace Infrastructure\Persistence\Eloquent\Client;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'client';

    /**
    * The id key associated with the table.
    *
    * @var string
    */
    protected string $id;
    protected string $name;
    protected string $email;

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

}
