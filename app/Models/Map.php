<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    private $name;
    /**
     * @var mixed
     */
    private $num;
    /**
     * @var mixed
     */
    private $coordinates;
    /**
     * @var mixed
     */
    private $coverage;
    /**
     * @var mixed
     */
    private $type;
    /**
     * @var mixed
     */
    private $net;
    /**
     * @var mixed
     */
    private $light;
    /**
     * @var mixed
     */
    private $pay;
    /**
     * @var mixed
     */
    private $website;
    /**
     * @var mixed
     */
    private $comment;
    /**
     * @var false|mixed
     */
    private $moderated;
}
