<?php namespace Dieter\Pages\Models;

use Model;

/**
 * Page Model
 */
class Page extends Model
{
	use \October\Rain\Database\Traits\SimpleTree;
	use \October\Rain\Database\Traits\Sortable;
	use \October\Rain\Database\Traits\Validation;

	/**
	 * @var page types
	 * Add types when necessary
	 */
	 private $types = [
		 'home' => 'Home',
		 'contact' => 'Contact',
		 'default' => 'Default',
	 ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dieter_pages_page';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

	/**
	 * @var array Auto generated slug
	 */
	protected $slugs = ['slug' => 'title'];

	/**
	 * @var array Validation rules
	 */
	public $rules = [
		'title' => 'required',
		'slug' => 'required',
	];

	/**
	 * @var page type dropdown
	 */
	public function getTypeOptions() {
	    return $this->types;
	}

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
	public $hasMany = [
		'pageblocks' => [ 'Dieter\Pages\Models\PageBlock', 'delete' => true ],
		'pagephotos' => [ 'Dieter\Pages\Models\PagePhoto', 'delete' => true ],
	];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
