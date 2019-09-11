<?php
namespace Photology;
use Illuminate\Database\Eloquent\Model;
class Like extends Model
{
    
    protected   $table          = 'likes';
    public      $timestamps     = false;
    protected   $fillable       = array('like_id','user_id','post_id','likes');
    protected   $primaryKey = 'like_id';
    protected   $guarded        = ['like_id', 'user_id', 'post_id'];
    
}