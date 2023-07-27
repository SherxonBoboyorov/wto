<?php

namespace App\Models\Admin;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'activities';

    protected $fillable = [
        'title_uz',
        'title_en',
        'title_ru',
        'content_uz',
        'content_en',
        'content_ru',
        'date_mask',
        'category_id',
        'image_url',
        'status',
        'order',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_mask' => 'timestamp',
        'category_id' => 'integer',
        'status' => 'boolean',
    ];

    public function activitycategory()
    {
        return $this->belongsTo(ActivityCategory::class,  'category_id', 'id');
    }
}
