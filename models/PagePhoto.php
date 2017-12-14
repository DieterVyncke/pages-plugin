<?php namespace Dieter\Pages\Models;

use Model;
use Cms\Classes\MediaLibraryItem;
use Cms\Classes\MediaLibrary;

/**
 * PagePhoto Model
 */
class PagePhoto extends Model
{
	use \October\Rain\Database\Traits\SimpleTree;
	use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dieter_pages_page_photos';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

	public function getPhotoThumbAttribute()
	{
		return MediaLibrary::url( $this->photo );
	}

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
		'page'
	];

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
