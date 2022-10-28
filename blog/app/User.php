<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    
    protected $fillable = [
        'name', 'email', 'password','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function uploadAvatar($image)
    {
         $filename =$image->getClientOriginalName();
         auth()->user()->deleteOldImage();
         $image->storeAs('images', $filename, 'public');

         $img = Image::make($image->getRealPath());
         $img->insert('images/watermark.png');
         $img->save('images/avatars/wk'.$filename);
     
         auth()->user()->update(['avatar' => 'wk'.$filename]);
        
    }

    protected function deleteOldImage()
    {
      if (auth()->user()->avatar)
      {
        Storage::delete('/public/images/'.auth()->user()->avatar);
      }
    }


    // public function setPasswordAttribute($password){
    //     $this->attributes['password'] = bcrypt($password);
    // }
}
