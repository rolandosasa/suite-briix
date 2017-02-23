<?php

namespace App\Models\Briix\Access\Packet;

use Illuminate\Database\Eloquent\Model;
use App\Models\Briix\Access\Packet\Traits\PacketAccess;
use App\Models\Briix\Access\Packet\Traits\Attribute\PacketAttribute;
use App\Models\Briix\Access\Packet\Traits\Relationship\PacketRelationship;

/**
 * Class Packet
 * @package App\Models\Briix\Access\Packet
 */
class Packet extends Model
{
    use PacketAccess, PacketAttribute, PacketRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'all', 'sort'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.packets_table');
    }
}
