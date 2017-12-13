<?php namespace Dieter\Pages\Models;

use Model;

/**
 * PageBlock Model
 */
class PageBlock extends Model
{
	use \October\Rain\Database\Traits\SimpleTree;
	use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dieter_pages_page_blocks';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
	public $belongsTo = [
   		'page' => [ 'Dieter\Pages\Models\Page' ],
   	];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
	public $attachOne = [];
    public $attachMany = [];
}
