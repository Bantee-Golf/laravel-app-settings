<?php

namespace EMedia\AppSettings\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use EMedia\Api\Docs\APICall;
use EMedia\Api\Docs\Param;
use EMedia\AppSettings\Entities\Setting;
use EMedia\AppSettings\Entities\SettingsRepository;
use EMedia\AppSettings\Entities\Api\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * @var SettingsRepository
     */
    private $settingsRepo;

    public function __construct(SettingsRepository $settingsRepo)
    {
        $this->settingsRepo = $settingsRepo;
    }

    /**
     * Returns the list of app settings
     */
    public function index()
    {
        document(function () {
            return (new APICall)->setName('Get Settings')
                ->setDescription('Returns all app settings. Each setting value is identified by the respective key.')
                ->setConsumes([APICall::CONSUME_JSON])
                ->noDefaultHeaders()
                ->setHeaders([
                    (new Param('Accept', 'String', '`application/json`'))->setDefaultValue('application/json'),
                    (new Param('x-api-key', 'String', 'API Key'))->setDefaultValue('123-123-123-123'),
                ])
                ->setSuccessObject(Settings::class)
                ->setSuccessExample('{
				"payload": {
					"ABOUT_US": "... content for the about us ...",
					"PRIVACY_POLICY": "... content for the privacy policy ...",
					"TERMS_AND_CONDITIONS": "... content for the terms and conditions ..."
				},
				"message": "",
				"result": true
			}');
        });

        $params = $this->settingsRepo->all();

        $settings = [];
        if($params) {
            foreach ($params as $setting) {
                $settings[$setting->setting_key] = $setting->setting_value;
            }
        }

        return response()->apiSuccess($settings);
    }

    /**
     * Returns the app setting of the requested key
     */
    public function show($key)
    {
        document(function () {
            return (new APICall)->setName('Get Setting')
                ->setDescription('Returns the value of a single app setting requested by key.')
                ->setConsumes([APICall::CONSUME_JSON])
                ->setSuccessExample('{
				"payload": "... value of the requested setting ...",
				"message": "",
				"result": true
			}');
        });

        $setting = Setting::where('setting_key', $key)->first();

        if ($setting) {
            return response()->apiSuccess($setting->setting_value);
        }

        return response()->apiError('Requested setting could not be found.');
    }
}
