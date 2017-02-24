<?php

namespace App\Models\Cmovil\Access\Line;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cmovil\Access\Line\Traits\LineAccess;
use App\Models\Cmovil\Access\Line\Traits\Attribute\LineAttribute;
use App\Models\Cmovil\Access\Line\Traits\Relationship\LineRelationship;

/**
 * Class Enterprise
 * @package App\Models\Cmovil\Access\Enterprise
 */
class Line extends Model
{
    use SoftDeletes, LineAccess, LineAttribute, LineRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;
    protected $connection = 'cmovil';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'phone'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('accessCM.lines_table');
    }
}
