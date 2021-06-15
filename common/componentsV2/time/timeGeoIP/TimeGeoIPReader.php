<?php

namespace common\componentsV2\time\timeGeoIP;

use GeoIp2\Database\Reader;


class TimeGeoIPReader
{

    /**
     * @var Reader
     */
    public $record = [];
    public $session;

    /**
     * TimeGeoIPReader constructor.
     * @param $session \common\componentsV2\time\timeGeoIP\TimeGeoIPSession
     */
    public function __construct($session)
    {

        $this->session = $session;
        if ($session->session->offsetExists($session->name)) {
            $this->record[$session->ip] = $session->session->get($session->name);
        } else {
            try {
                $this->record[$session->ip] = (new Reader(
                    '/usr/local/share/GeoIP/GeoLite2-City.mmdb')
                )->city($session->ip);
                $session->session->set($session->name, $this->record[$session->ip]);
            } catch (\Exception $e) {
                $this->record[$session->ip] = 0;
                $session->session->set($session->name, $this->record[$session->ip]);
            }
        }

    }
}

