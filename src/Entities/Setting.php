<?php


namespace EMedia\AppSettings\Entities;


use EMedia\Formation\Entities\GeneratesFields;
use EMedia\QuickData\Entities\Search\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

	const DATA_TYPE_JSON = 'json';
	const DATA_TYPE_TEXT = 'text';
	const DATA_TYPE_STRING = 'string';
	const DATA_TYPE_BOOLEAN = 'bool';

	use GeneratesFields;
	use SearchableTrait;

	protected $fillable = [
		'setting_key',
		'setting_value',
		'setting_data_type',
		'description',
	];

	protected $hidden = [
		'setting_key',
		'setting_value',
		'setting_data_type',
		'description',
		'is_key_editable',
		'is_value_editable',
	];

	protected $appends = [
		'key',
		'value',
	];

	protected $visible = [
		'id',
		'key',
		'value',
		'created_at',
		'updated_at',
	];

	protected $searchable = [
		'setting_key',
		'setting_value',
		'description',
	];

	protected $editable = [
		[
			'name' => 'setting_key',
			'display_name' => 'Key',
		],
		[
			'name' => 'setting_value',
			'display_name' => 'Value',
		],
		[
			'name' => 'description',
		],
		[
			'name' => 'setting_data_type',
			'display_name' => 'Data Type',
			'type' => 'select',
			'options' => [
				self::DATA_TYPE_STRING => 'String',
				self::DATA_TYPE_TEXT => 'Text',
				self::DATA_TYPE_BOOLEAN => 'True/False',
			]
		],
	];

	public function getExtraApiFields()
    {
        return [
            'key',
            'value',
        ];
    }

	/**
	 * Returns the setting key
	 */
	public function getKeyAttribute()
	{
		return $this->setting_key;
	}

	/**
	 * Returns the setting value
	 */
	public function getValueAttribute()
	{
		return $this->setting_value;
	}
}
