<?php

namespace App\Models\Admin;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_uz',
        'title_en',
        'title_ru',
        'content_uz',
        'content_en',
        'content_ru',
        'biography_uz',
        'biography_en',
        'biography_ru',
        'publication_uz',
        'publication_en',
        'publication_ru',
        'date_mask',
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
        'status' => 'boolean',
    ];
}
