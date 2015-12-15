<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileEntry extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'file_entries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'filename', 'mime', 'original_filename', 'professor_name', 'course_name', 'submitting_user_email', 'created_at', 'updated_at' ];

}


