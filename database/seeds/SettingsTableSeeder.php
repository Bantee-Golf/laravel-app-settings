<?php

use EMedia\AppSettings\Entities\Setting;
use EMedia\QuickData\Database\Seeds\Traits\SeedsWithoutDuplicates;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SettingsTableSeeder extends Seeder
{

	use SeedsWithoutDuplicates;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// $faker = \Faker\Factory::create('en_AU');

		// seed the settings, without creating any duplicates

		$data = [
			//[
			//	'setting_key' 		=> 'setting_1',
			//	'setting_value' 	=> 10
			// ],
			// [
			// 'setting_key' 		=> 'setting_3_non_editable_value',
			// 'setting_value' 	=> 'false',
			// 'setting_data_type' => 'boolean',
			// 'is_value_editable' => false,
			// ],
			[
				'setting_key' => 'ABOUT_US',
				'setting_data_type' => 'text',
				'description' => 'Content for the about us screen.',
				'setting_value' => $this->getLocalSeedData('ABOUT_US'),
				'is_key_editable' => false,
			],
			[
				'setting_key' => 'PRIVACY_POLICY',
				'setting_data_type' => 'text',
				'description' => 'Content for application privacy policy.',
				'setting_value' => $this->getLocalSeedData('PRIVACY_POLICY'),
				'is_key_editable' => false,
			],
			[
				'setting_key' => 'TERMS_AND_CONDITIONS',
				'setting_data_type' => 'text',
				'description' => 'Content for application terms and conditions.',
				'setting_value' => $this->getLocalSeedData('TERMS_AND_CONDITIONS'),
				'is_key_editable' => false,
			],
			[
				'setting_key' => 'WEBSITE_URL',
				'setting_data_type' => 'string',
				'setting_value' => 'http://www.elegantmedia.com.au',
				'description' => 'Official Website URL',
				'is_key_editable' => false,
			],
			[
				'setting_key' => 'INSTAGRAM_URL',
				'setting_data_type' => 'string',
				'setting_value' => 'http://www.instagram.com/' . Str::kebab(config('app.name')),
				'description' => 'Official Instagram URL',
				'is_key_editable' => false,
			],
			[
				'setting_key' => 'FACEBOOK_URL',
				'setting_data_type' => 'string',
				'setting_value' => 'http://www.facebook.com/' . Str::kebab(config('app.name')),
				'description' => 'Official Facebook URL',
				'is_key_editable' => false,
			],
			[
				'setting_key' => 'TWITTER_URL',
				'setting_data_type' => 'string',
				'setting_value' => 'http://www.twitter.com/' . Str::kebab(config('app.name')),
				'description' => 'Official Twitter URL',
				'is_key_editable' => false,
			],
			[
				'setting_key' => 'SNAPCHAT_URL',
				'setting_data_type' => 'string',
				'setting_value' => 'http://www.snap.com/' . Str::kebab(config('app.name')),
				'description' => 'Official Snapchat URL',
				'is_key_editable' => false,
			],
		];

		$this->seedButDontCreateDuplicates($data, Setting::class, 'setting_key', 'setting_key');
	}

	/**
	 *
	 * Fetch seed data from a local file
	 *
	 * @param $seedKey
	 * @param null $filename
	 * @return false|string
	 */
	protected function getLocalSeedData($seedKey, $filename = null)
	{
		// by default, look for a .txt file with the same name
		if (empty($filename))
		{
			$filename = Str::snake(strtolower($seedKey)) . '.txt';
		}

		$relPath = 'seeds' . DIRECTORY_SEPARATOR . 'SeedData' . DIRECTORY_SEPARATOR . $filename;
		if (file_exists(database_path($relPath)))
		{
			return file_get_contents(database_path($relPath));
		}

		return "~ADD YOUR {$seedKey} CONTENT. Or create a file at {$relPath} to auto-seed.~";
	}
}
