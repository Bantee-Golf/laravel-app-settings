<?php

namespace EMedia\AppSettings\Entities\Api;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = '';

    public function getExtraApiFields()
    {
        return [
            'settings' => ['type' => 'array', 'items' => 'Setting']
        ];
    }
}
