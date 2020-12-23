<?php

namespace common\components\breadcrumbs;

class Breadcrumbs
{

    public function album($albumData, $artistData, $firstLetterByArtist)
    {

        return (new BreadcrumbsAlbum())->breadcrumbs($albumData, $artistData, $firstLetterByArtist);

    }

    public function artist($artistData, $firstLetterData)
    {

        return (new BreadcrumbsArtist())->breadcrumbs($artistData, $firstLetterData);

    }


    public function artistsByFirstLetter($firstLetterByArtist, $getParamsByLinksPrevNext)
    {

        return (new BreadcrumbsArtistsByFirstLetter())->breadcrumbs($firstLetterByArtist, $getParamsByLinksPrevNext);

    }

    public function indexesByArtistsFirstLetters()
    {

        return (new BreadcrumbsIndexesByArtistsFirstLetters())->breadcrumbs();

    }


    public function song($artistData, $albumData, $songData, $firstLetterByArtist)
    {

        return (new BreadcrumbsSong())->breadcrumbs($artistData, $albumData, $songData, $firstLetterByArtist);

    }

    public function genre($genreData)
    {

        return (new BreadcrumbsGenre())->breadcrumbs($genreData);

    }

    public function year($yearData)
    {

        return (new BreadcrumbsYear())->breadcrumbs($yearData);

    }

    public function language($languageData)
    {

        return (new BreadcrumbsLanguage())->breadcrumbs($languageData);

    }


}

