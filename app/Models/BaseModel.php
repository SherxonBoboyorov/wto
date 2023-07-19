<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BaseModel extends Model
{
    public static function boot()
    {
        parent::boot();
        self::creating(function($model){
            if(request('status')&&!empty(request('status'))){
                $model->status = request('status') =='on'?1:0;
            }
            if(request()->file('image_file')){
                $path = request()->file('image_file')->store('public/front/uploads');
                $model->image_url = $path;
            }
            if(request()->file('main_image_file')){
                $path = request()->file('main_image_file')->store('public/front/uploads');
                $model->image_main_url	 = $path;
            }
            if(request()->file('video_file')){
                $path = request()->file('video_file')->store('public/front/uploads');
                $model->video_url = $path;
            }
        });

        self::updating(function($model){
            if(request('status')&&!empty(request('status'))){
                $model->status = request('status') == 'on'?1:0;
            }
            if(request()->file('image_file')){
                Storage::delete($model->image_url);
                $path = request()->file('image_file')->store('public/front/uploads');
                $model->image_url = $path;
            }
            if(request()->file('main_image_file')){
                Storage::delete($model->image_main_url);
                $path = request()->file('main_image_file')->store('public/front/uploads');
                $model->image_main_url	 = $path;
            }
            if(request()->file('video_file')){
                Storage::delete($model->video_url);
                $path = request()->file('video_file')->store('public/front/uploads');
                $model->video_url = $path;
            }
        });

        self::saving(function($model){

      
           
            if(request('status')&&!empty(request('status'))){
                $model->status = request('status') == 'on'?1:0;
            }
            if(request()->file('image_file')){
                if(isset($model->image_url)){
                    Storage::delete($model->image_url);
                }
                $path = request()->file('image_file')->store('public/front/uploads');
                $model->image_url = $path;
            }
            if(request()->file('main_image_file')){
                if(isset($model->image_main_url)){
                    Storage::delete($model->image_main_url);
                  
                }
                $path = request()->file('main_image_file')->store('public/front/uploads');
                $model->image_main_url	 = $path;
            }
            if(request()->file('video_file')){
                if(isset($model->video_url)){
                    Storage::delete($model->video_url);
                }
                $path = request()->file('video_file')->store('public/front/uploads');
                $model->video_url = $path;
            }
        });

        
        self::deleting(function($model){
            if(isset($model->image_url)){
                Storage::delete($model->image_url);
            }
            if(isset($model->image_main_url)){
                Storage::delete($model->image_main_url);
              
            }
            if(isset($model->video_url)){
                Storage::delete($model->video_url);
            }
        });
            
    
    }
    public function title(){
        return $this->{"title_".app()->getLocale()};
    }
}
