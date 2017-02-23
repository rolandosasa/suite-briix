<?php

namespace App\Models\Briix\Access\Enterprise;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Briix\Access\Enterprise\Traits\EnterpriseAccess;
use App\Models\Briix\Access\Enterprise\Traits\Attribute\EnterpriseAttribute;
use App\Models\Briix\Access\Enterprise\Traits\Relationship\EnterpriseRelationship;

/**
 * Class Enterprise
 * @package App\Models\Briix\Access\Enterprise
 */
class Enterprise extends Model
{
    use SoftDeletes, EnterpriseAccess, EnterpriseAttribute, EnterpriseRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;
    protected $connection = 'briix';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'contact', 'email', 'phone', 'phone2', 'address', 'image', 'rfc'];

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
        $this->table = config('access.enterprises_table');
    }
}
