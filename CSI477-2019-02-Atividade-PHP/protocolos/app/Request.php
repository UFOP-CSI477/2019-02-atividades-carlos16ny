<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{

   protected $primaryKey = 'id';
   
   protected $fillable = [
      'subject_id', 'user_id', 'description', 'date'
   ];
}
