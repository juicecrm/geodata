<?php

namespace JuiceCRM\GeoData\Concerns\Actions\Store;

use JuiceCRM\GeoData\Models\AreaCode;
use JuiceCRM\GeoData\Models\Country;
use JuiceCRM\GeoData\Models\E164CountryCode;

trait InternationalDirectDialing
{
    public function storeCallingCodes(Country $country, array $jsonCountry)
    {
        if($jsonCountry && $jsonCountry['idd']) {
            $directDialingData = $jsonCountry['idd'];
            if(is_string($directDialingData)) {
                dd([
                    $jsonCountry,
                    $directDialingData
                ]);
            }
            if(count($directDialingData['suffixes']) === 1) {
                E164CountryCode::create([
                    'country_id' => $country->id,
                    'country_code' => substr($directDialingData['root'], 1).$directDialingData['suffixes'][0],
                ]);
            } elseif(count($directDialingData['suffixes']) > 1) {
                $e164CountryCode = E164CountryCode::create([
                    'country_id' => $country->id,
                    'country_code' => substr($directDialingData['root'], 1),
                ]);
                $e164CountryCodeId = $e164CountryCode->id;
                foreach($directDialingData['suffixes'] as $suffix) {
                    AreaCode::create([
                        'e164_country_code_id' => $e164CountryCodeId,
                        'area_code' => $suffix,
                    ]);
                }
            }
        }
    }
}
