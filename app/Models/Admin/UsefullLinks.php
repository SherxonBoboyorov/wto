<?php

namespace App\Models\Admin;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsefullLinks extends BaseModel
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
        'image_url',
        'redirect_url',
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
        'status' => 'boolean',
    ];
    public function getTitleAttribute(){
        return $this->{"title_".config('app.locale')};
    }

    public function getSubContentAttribute(){
        return $this->{"sub_content_".config('app.locale')};
    }

    public function getContentAttribute(){
        return $this->{"content_".config('app.locale')};
    }
}
