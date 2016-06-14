<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property integer $id
 * @property string $title
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $city
 * @property string $zip
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 * @property boolean $active
 * @property integer $manager
 * @property integer $site_id
 * @property integer $image
 * @property string $shift_start
 * @property string $shift_end
 * @property-read \App\Models\Site $site
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereZip($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereManager($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereSiteId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereShiftStart($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereShiftEnd($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'site_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = ['password', 'remember_token']; // 'password'

    public $timestamps = true;
}
