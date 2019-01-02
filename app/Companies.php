<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'companies';
    protected $fillable = ['name', 'email', 'website'];

    public function save_logo($image_path, $mime_type)
    {
        $this->logo = json_encode(
            [
                'content' => base64_encode(file_get_contents($image_path)), 
                'mime' => $mime_type
            ]
        );
    }

    public function get_logo()
    {
        return json_decode($this->logo)->content;
    }

    public function get_logo_mime()
    {
        return json_decode($this->logo)->mime;
    }

    public function logo_as_base_64_css()
    {
        return 'data:'.$this->get_logo_mime().';base64,'.$this->get_logo();
    }

    public function employees()
    {
        return $this->hasMany('App\Employees', 'company_id');
    }
}
