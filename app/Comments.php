<?php

namespace Photology;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{   
    protected   $table          = 'comment';
    public      $timestamps     = false;
    protected   $fillable       = array('comment_id','user_id','post_id', 'text');
    protected   $primaryKey = 'comment_id';
    protected   $guarded        = ['comment_id', 'user_id', 'post_id', 'text'];
    
}
