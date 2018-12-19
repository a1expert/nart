<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<div class="container">
    <div class="address">
        <ul class="address__list">
            <li class="address__item"><small class="address__label">Наш адрес:</small>
                <p class="address__text"><strong><?=$contacts["address"];?></strong></p>
                <p class="address__text"><?=$contacts["addressComment"];?></p>
            </li>
            <li class="address__item"><small class="address__label">Телефоны:</small>
                <div class="address__phones">
                    <div>
                        <p class="address__text"><strong><?=$contacts["mainPhone"];?></strong></p>
                        <p class="address__text">основной</p>
                    </div>
                    <div>
                        <p class="address__text"><strong><?=$contacts["chiefPhone"];?></strong></p>
                        <p class="address__text">директор</p>
                    </div>
                </div>
            </li>
            <li class="address__item"><small class="address__label">График работы:</small>
                <p class="address__text"><strong><?=$contacts["workTime"];?></strong></p>
                <p class="address__text"><?=$contacts["workDays"];?></p>
            </li>
            <li class="address__item"><small class="address__label">Реквизиты:</small><a href="<?=$contacts["requisites"];?>" class="link link_icon" download><span>Скачать
                        реквизиты</span></a></li>
        </ul>
    </div>
</div>
<div style="height: 400px" class="map"></div>
<script>
    function initMap()
    {
        var uluru = {
            lat: 61.266573,
            lng: 73.421185
        };
        var map = new google.maps.Map(document.querySelector('.map'),
        {
            zoom: 4,
            center: uluru
        });
        var marker = new google.maps.Marker(
        {
            position: uluru,
            map: map
        });
    };
    
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVXMX_-tYvAtIAIU4GdVX6w3hhIh3DUNU&amp;callback=initMap"
    type="text/javascript"></script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>