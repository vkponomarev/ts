
<h1>Доки</h1>
<h2 align="left">Введение </h2>


<h2 align="left">Структура приложения</h2>

<h2 align="left">Контроллеры</h2> <br>

\fronted\controllers\ArtistsController<br>
Отвечает за страницы артистов<br>
'/artists/' => 'artists/index',<br>
'/artists/\<url\>/' => 'artists/artist-page',<br>
<br>
\fronted\controllers\AlbumsController<br>

Отвечает за страницы альбомов<br>
'/albums/' => 'albums/index',<br>
'/albums/<url>/' => 'albums/album-page',<br>

<br>

\fronted\controllers\SongsController<br>
Отвечает за страницы песен<br>
'/songs/' => 'songs/index',<br>
/songs/<url>/' => 'songs/song-page',<br>

<br>

\fronted\controllers\IndexController<br>
Отвечает за страницы Индекса по первой букве.<br>
'/artists/index/' => 'index/index',<br>
'/artists/index/<url>' => 'index/index-page',<br>


<h2 align="left">Компоненты</h2><br>

<b>\common\components\artist\Artist</b><br>
Основной класс одного артиста<br>

методы:<br>
\common\components\artist\ArtistData->data() - Все данные этого артиста из таблицы m_artists<br>



<b>\common\components\artists\Artists</b><br>
Основной класс нескольких артистов<br>

методы:<br>
\common\components\artists\ArtistsByRandom->byRandom($count)<br>
Список из определнного количеств($count) артистов начиная с слуайного ID<br>
$count - Количество артистов<br>

 
<b>\common\components\album\Album</b><br>
Основной класс одного альбома<br>

методы:<br>
\common\components\album\AlbumData->data()<br>
Все данные конкретного альбома из таблицы m_albums<br>


<b>\common\components\albums\Albums</b><br>
Основной класс одного альбома<br>

методы:<br>
\common\components\albums\AlbumsByArtist->byArtist($id)<br>
Все данные альбомов конкретного артиста($id) из таблицы m_albums<br>

\common\components\albums\AlbumsByRandom->byRandom($count)<br>
Список из определнного количеств($count) альбомов начиная с слуайного ID<br>
$count - Количество альбомов<br>


<b>\common\components\song\Song</b><br>
Основной класс одной песни<br>

методы:<br>
\common\components\song\SongData->data()<br>
Все данные конкретной песни из таблицы m_songs<br>


<b>\common\components\songs\Songs</b><br>
Основной класс одной песни<br>

методы:<br>
\common\components\songs\SongsByArtist->byArtist($id)<br>
Все данные песен конкретного артиста($id) из таблицы m_songs<br>

\common\components\songs\SongsByRandom->byRandom($count)<br>
Список из определнного количеств($count) песен начиная с слуайного ID<br>
$count - Количество песен<br>

<h2 align="left">Базы данных </h2>

m_songs->no_text<br>
0 - Текст есть 1784234<br>
1 - Текста нет 389330<br>
2 - Текста нет / не найдена ссылка в базе песен  13836<br>

m_albums->m_artists_id_2<br>
Это поле дополнительные артисты для этого альбома, так как есть некоторые альбомы, которые созданы 2мя 3мя артистами


m_albums->soundtrack<br>
0 - это не альбом саундтрак
1 - это альбом саундтрак к чему нибудь

m_albums->album_as<br>
Другое имя исполнителя которое он использовал для этого альбома