<?php
namespace LaravelFillableRelations\Tests\Models\ThreeLevelFill;

use Illuminate\Database\Eloquent\Model;
use LaravelFillableRelations\Eloquent\Concerns\HasFillableRelations;

class Tool extends Model
{
    use HasFillableRelations;
    protected $table = 'threelevelfill_tools';
    protected $fillable = ['name'];
    protected $fillableRelations = ['fields'];

    public function fields()
    {
        return $this->hasMany(ToolField::class, 'tool_id');
    }
}
