<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'content', 'menu_title', 'display_in_menu', 'order_in_menu'];
}
