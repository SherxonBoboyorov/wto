<?php

namespace App\Models\Admin;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaders extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_url',
        'name_uz',
        'name_en',
        'name_ru',
        'position_uz',
        'position_en',
        'position_ru',
        'phone',
        'reception_days_uz',
        'reception_days_en',
        'reception_days_ru',
        'email',
        'content_uz',
        'content_en',
        'content_ru',
        'order',
        'status',
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

    public function getNameAttribute(){
        return $this->{"name_".config('app.locale')};
    }
    public function getPositionAttribute(){
        return $this->{"position_".config('app.locale')};
    }
    public function getReceptionDaysAttribute(){
        return $this->{"reception_days_".config('app.locale')};
    }

    public function getContentAttribute(){
        return $this->{"content_".config('app.locale')};
    }
}
