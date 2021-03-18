<?php


namespace EMedia\AppSettings\Entities\SettingGroups;


use Cviebrock\EloquentSluggable\Sluggable;
use ElegantMedia\SimpleRepository\Search\Eloquent\SearchableLike;
use EMedia\AppSettings\Entities\Settings\Setting;
use EMedia\Formation\Entities\GeneratesFields;
use Illuminate\Database\Eloquent\Model;

class SettingGroup extends Model
{

	use GeneratesFields;
	use SearchableLike;
	use Sluggable;

	protected $searchable = [
		'name',
	];

	protected $fillable = [
		'name',
		'description',
		'sort_order',
	];

	protected $editable = [
		'name',
		'sort_order',
	];

	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => 'name',
			]
		];
	}

	public function getCreateRules()
	{
		return [
			'name' => 'required|min:2',
		];
	}

	public function getUpdateRules()
	{
		return [
			'name' => 'required|min:2',
		];
	}

	public function settings()
	{
		return $this->hasMany(Setting::class);
	}
}
