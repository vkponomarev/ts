<?php


namespace lysenkobv\GeoIP;

/**
 * Class Result
 * @package lysenkobv\GeoIP
 *
 * @property string|null city
 * @property string|null country
 * @property Location location
 */
class Result extends ResultBase {
    protected function getCity($data) {
        $name = null;
        $geoname_id = null;
        if (isset($data['city']['names']['en'])) {
            $name = $data['city']['names']['en'];
        }

        if (isset($data['city']['geoname_id'])) {
            $geoname_id = $data['city']['geoname_id'];
        }
        return [
            'name' => $name,
            'geoname_id' => $geoname_id,
        ];

    }

    protected function getCountry($data) {
        $value = null;

        if (isset($data['country']['names']['en'])) {
            $value = $data['country']['names']['en'];
        }

        return $value;
    }

    protected function getLocation($data) {
        $value = new Location();

        if (isset($data['location'])) {
            $lat = $data['location']['latitude'];
            $lng = $data['location']['longitude'];
            $value = new Location($lat, $lng);
        }

        return $value;
    }

    protected function getIsoCode($data) {
        $value = null;

        if (isset($data['country']['iso_code'])) {
            $value = $data['country']['iso_code'];
        }

        return $value;
    }

    public function isDetected() {
        return ($this->location->lat !== null && $this->location->lng !== null);
    }
}