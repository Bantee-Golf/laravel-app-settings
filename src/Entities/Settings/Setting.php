<?php


namespace EMedia\AppSettings\Entities\Settings;


use EMedia\Formation\Entities\GeneratesFields;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Setting extends Model
{

	public const DATA_TYPE_JSON    = 'json';
	public const DATA_TYPE_TEXT    = 'text';
	public const DATA_TYPE_STRING  = 'string';
	public const DATA_TYPE_BOOLEAN = 'bool';

	use GeneratesFields;
	use Searchable;

	public function getSearchableFields(): array
	{
		return [
			'setting_key',
			'setting_value',
			'description',
		];
	}

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
