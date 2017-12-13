<?php namespace Dieter\Pages\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Dieter\Pages\Models\Page;
use Dieter\Pages\Models\PageBlock;
use Flash;

/**
 * Pages Back-end Controller
 */
class Pages extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
		'Backend.Behaviors.RelationController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
	public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Dieter.Pages', 'pages', 'pages');

		$this->addCss('/plugins/dieter/pages/assets/css/sortable.css');
		$this->addCss('/plugins/dieter/pages/assets/css/thumbnail.css');
        $this->addJs('/plugins/dieter/pages/assets/js/html5sortable.js');
        $this->addJs('/plugins/dieter/pages/assets/js/sortable.js');
    }

	public function index_onUpdatePagePosition()
	{
		$this->reorder( Page::class );
        return $this->listRefresh();
	}

	public function update_onUpdateBlockPosition()
	{
		$this->reorder( PageBlock::class );

	    $model = Page::find(post('page_id'));
	    $this->initForm($model);
	    $this->initRelation($model, 'pageblocks');

	    return $this->relationRefresh('pageblocks');
	}

	protected function reorder( $model )
	{
		$moved = [];
        $position = 0;
        if (($reorderIds = post('checked')) && is_array($reorderIds) && count($reorderIds)) {
            foreach ($reorderIds as $id) {
                if (in_array($id, $moved) || !$record = $model::find($id))
                    continue;
                $record->sort_order = $position;
                $record->save();
                $moved[] = $id;
                $position++;
            }
            Flash::success('Successfully re-ordered records.');
        }
	}
}
