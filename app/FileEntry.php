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
    protected $fillable = [ 'filename', 'mime', 'original_filename', 'professor_name', 'course_name', 'submitting_user_id', 'submitting_user_email', 'submitting_user_first_name', 'submitting_user_last_name', 'submitting_user_projected_graduation_year', 'submitting_user_reveal_id', 'academic_term', 'year', 'created_at', 'updated_at' ];

}


